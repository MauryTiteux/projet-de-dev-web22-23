<?php

class UserActivity {

  // Attributes
  // ===========================================================================

  public ?int $id          = null;
  public ?int $user_id     = null;
  public ?int $activity_id = null;
  public ?int $dinner       = null;
  public array $errors     = [];

  // Construct
  // ===========================================================================

  public function __construct($obj = null) {
    if(!empty($obj)) {
      foreach((array) $obj as $k => $v) {
        if(in_array($k, array_keys(get_class_vars(__CLASS__)))) { $this->$k = $v; }
      }
    }
  }

  // Validations
  // ===========================================================================

  public function validate() {
    $this->errors = [];
    $this->validate_user_id();
    $this->validate_activity_id();
    $this->validate_users_max();
    return empty($this->errors) ? true : false;
  }

  public function validate_update() {
    $this->errors = [];
    $this->validate_users_max();
    return empty($this->errors) ? true : false;
  }

  private function validate_user_id() {
    if (!preg_match("/^[1-9]{1}[0-9]{0,9}$/", $this->user_id)) {
      $this->errors['user_id'] = ['format' => "Format de l'utilisateur invalide."];
    }
    if (!empty(Database::where('users_activities', 'user_id', $this->user_id))) {
      $this->errors['user_id'] = ['unique' => "L'utilisateur est déjà inscrit."];
    }
    if (empty(Database::where('users', 'id', (int) $this->user_id))) {
      $this->errors['user_id'] = ['inclusion' => "L'utilisateur est invalide"];
    }
  }

  private function validate_activity_id() {
    if (!preg_match("/^[1-9]{1}[0-9]{0,9}$/", $this->activity_id)) {
      $this->errors['activity_id'] = ['format' => "Format de l'activité invalide."];
    }
    if (empty(Database::where('activities', 'id', (int) $this->activity_id))) {
      $this->errors['activity_id'] = ['inclusion' => "L'activité est invalide"];
    }
  }

  private function validate_users_max() {
    $activity = Database::where('activities', 'id', $this->activity_id);
    $users = Database::allWhere('users_activities', 'activity_id', (int) $this->activity_id);
    if (sizeof($users) >= $activity->max) {
      $this->errors['activity'] = ['max' => "Le nombre max d'utilisateur est déjà atteint pour cette activité."];
    }
  }

  // Persistent state
  // ===========================================================================

  public function save() {
    if($this->validate()) {
      $datas = (array) $this;
      unset($datas['id'], $datas['errors']);
      Database::insert('users_activities', $datas);
    }
  }

  public function update($id) {
    if($this->validate_update()) {
      $datas = (array) $this;
      unset($datas['id'], $datas['errors'], $datas['dinner']);
      Database::update('users_activities', $id, $datas);
    }
  }
}
