<?php

class User {

  // Attributes
  // ===========================================================================

  public ?int $id               = null;
  public ?string $email         = null;
  public ?string $lastname      = null;
  public ?string $firstname     = null;
  public ?string $password      = null;
  public ?int $postal_code_id   = null;
  public ?int $department_id    = null;
  public ?string $password_hash = null;
  public ?string $session_token = null;
  public ?int $is_admin         = 0;
  public array $errors          = [];

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
    $this->validate_email();
    $this->validate_email_unique();
    $this->validate_password();
    $this->validate_firstname();
    $this->validate_lastname();
    $this->validate_postal_code();
    $this->validate_department();
    return empty($this->errors) ? true : false;
  }

  public function validate_update() {
    $this->errors = [];
    $this->validate_email();
    $this->validate_firstname();
    $this->validate_lastname();
    $this->validate_postal_code();
    $this->validate_department();
    return empty($this->errors) ? true : false;
  }

  private function validate_email() {
    if (!preg_match("/^[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+$/", $this->email)) {
      $this->errors['email'] = ['format' => "Format de l'email invalide."];
    }
  }

  private function validate_email_unique() {
    if (!empty(Database::where('users', 'email', $this->email))) {
      $this->errors['email'] = ['unique' => "L'adresse mail est déjà utilisée."];
    }
  }

  private function validate_password() {
    if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $this->password)) {
      $this->errors['password'] = ['format' => 'Le format du mot de passe est invalide.'];
    }
  }

  private function validate_firstname() {
    if (!preg_match('/^[a-z0-9-]{2,15}$/i', $this->firstname)) {
      $this->errors['firstname'] = ['format' => 'Le format de votre prénom est invalide.'];
    }
  }

  private function validate_lastname() {
    if (!preg_match('/^[a-z0-9-]{2,15}$/i', $this->lastname)) {
      $this->errors['lastname'] = ['format' => 'Le format de votre nom est invalide.'];
    }
  }

  private function validate_postal_code() {
    if (empty(Database::where('postal_codes', 'id', (int) $this->postal_code_id))) {
      $this->errors['postal_code'] = ['inclusion' => "Le code postal est invalide"];
    }
  }

  private function validate_department() {
    if (empty(Database::where('departments', 'id', (int) $this->department_id))) {
      $this->errors['department'] = ['inclusion' => "Le département est invalide"];
    }
  }


  // Auto-generated fields
  // ===========================================================================

  private function generate_hashed_password() {
    $this->password_hash = password_hash($this->password, PASSWORD_DEFAULT);
  }

  private function generate_session_token() {
    $this->session_token = hash("sha256", rand());
  }

  // Persistent state
  // ===========================================================================

  public function save() {
    if($this->validate()) {
      $this->generate_hashed_password();
      $this->generate_session_token();
      $datas = (array) $this;
      unset($datas['id'], $datas['errors'], $datas['password'], $datas['dinner']);
      Database::insert('users', $datas);
    }
  }

  public function update($id) {
    if($this->validate_update()) {
      $datas = (array) $this;
      unset($datas['id'], $datas['errors'], $datas['password'], $datas['password_hash'], $datas['session_token'], $datas['dinner']);
      Database::update('users', $id, $datas);
    }
  }

  // Retrieve
  // ===========================================================================

  public function auth_by_email() {
    $user = Database::where('users', 'email', $this->email);
    return password_verify($this->password, $user->password_hash) ? $user : null;
  }

  // Magic method
  // ===========================================================================

  public function has_activity() {
    $user = Database::where('users_activities', 'user_id', (int) $this->id);
    return empty($user) ? false : true;
  }

  public function activity() {
    if($this->has_activity()) {
      $ua = Database::where('users_activities', 'user_id', (int) $this->id);
      $a = new Activity(Database::where('activities', 'id', $ua->activity_id));
      $a->dinner = $ua->dinner;
      return $a;
    }
    return null;
  }

  public function postal_code() {
    $pc = Database::where('postal_codes', 'id', (int) $this->postal_code_id);
    return new PostalCode($pc);
  }

  public function department() {
    $d = Database::where('departments', 'id', (int) $this->department_id);
    return new Department($d);
  }
}
