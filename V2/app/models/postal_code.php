<?php

class PostalCode {

  // Attributes
  // ===========================================================================

  public ?int $id      = null;
  public ?string $name = null;
  public ?int  $code   = null;
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
    $this->validate_code();
    return empty($this->errors) ? true : false;
  }

  private function validate_name() {
    if (!preg_match("/^.{1,255}$/", $this->name)) {
      $this->errors['name'] = ['format' => "Le format du nom est invalide."];
    }
    if (!empty(Database::where('postal_codes', 'name', $this->name))) {
      $this->errors['name'] = ['unique' => "Le nom est déjà utilisé."];
    }
  }

  private function validate_code() {
    if (!preg_match("/^[1-9]{1}[1-9]{3}$/", $this->code)) {
      $this->errors['code'] = ['format' => "Le format du code est invalide."];
    }
    if (!empty(Database::where('postal_codes', 'code', $this->code))) {
      $this->errors['code'] = ['unique' => "Le code est déjà utilisé."];
    }
  }

  // Persistent state
  // ===========================================================================

  public function save() {
    if($this->validate()) {
      $datas = (array) $this;
      unset($datas['id'], $datas['errors']);
      Database::insert('postal_codes', $datas);
    }
  }
}
