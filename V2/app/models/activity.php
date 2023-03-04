<?php

class Activity {

  // Attributes
  // ===========================================================================

  public ?int $id      = null;
  public ?string $name = null;
  public ?string $description = null;
  public ?int $max = null;
  public array $errors = [];

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
    $this->validate_name();
    $this->validate_max();
    return empty($this->errors) ? true : false;
  }

  private function validate_name() {
    if (!preg_match("/^.{1,255}$/", $this->name)) {
      $this->errors['name'] = ['format' => "Le format du nom est invalide."];
    }
    if (!empty(Database::where('activities', 'name', $this->name))) {
      $this->errors['name'] = ['unique' => "Le nom est déjà utilisé."];
    }
  }

  private function validate_max() {
    if (!preg_match("/^[1-9]{1}[0-9]{0,2}$/", $this->max)) {
      $this->errors['max'] = ['format' => "Le format du nombre max de participants est invalide."];
    }
  }

  // Persistent state
  // ===========================================================================

  public function save() {
    if($this->validate()) {
      $datas = (array) $this;
      unset($datas['id'], $datas['errors']);
      Database::insert('departments', $datas);
    }
  }

  // Magic methods
  // ===========================================================================

  public function countUsers() {
    $users = Database::allWhere('users_activities', 'activity_id', (int) $this->id);
    return sizeof($users);
  }

  public function remainingUsers() {
    return $this->max - $this->countUsers();
  }
}
