<?php
class UsersBeers
{
  // Variables
  // ===========================================================================

  // Database table.
  const TABLE_NAME = "users_beers";

  // Object properties
  public $id = null;
  public $beer_id = null;
  public $user_id = null;
  public $comment = null;
  public $rating = null;
  public $consumed = 0;
  public $consumed_first = null;
  public $consumed_last = null;
  public $is_favorite = null;
  public $errors = null;

  // Constructor
  // ===========================================================================

  // Initialize an object item with associated data.
  private static function populate($data)
  {
    $item = new self();
    foreach (get_object_vars($item) as $ik => $iv) {
      $item->$ik = isset($data->$ik) ? $data->$ik : $iv;
    }
    return $item;
  }

  // Retrieve
  // ===========================================================================

  // Return all records.
  public static function all($items = [])
  {
    $datas = Database::all(self::TABLE_NAME, "beer_id");
    foreach ($datas as $data) {
      array_push($items, self::populate($data));
    }
    return $items;
  }

  // Return a record searching by its `id`.
  public static function find($id)
  {
    $data = Database::find(self::TABLE_NAME, $id);
    return $data ? self::populate($data) : null;
  }

  // Return all beers of an user.
  public static function fromUser($id)
  {
    $items = [];
    $data = self::all();
    foreach($data as $item) {
      $item = self::populate($item);
      if($item->user_id == $id) {
        array_push($items, $item);
      }
    }
    return $items;
  }

  // Validations & persistence.
  // ===========================================================================

  // Check if record doesn't exist.
  private function validateUnique()
  {
    $datas = self::all();
    foreach ($datas as $data) {
      if ($data->user_id == $this->user_id &&  $data->beer_id == $this->beer_id) {
        array_push($this->errors, ['unique' => 'Cet enregistrement existe déjà.']);
      }
    }
  }

  // Validate consumed value.
  private function validateConsumedValue()
  {
    if ($this->consumed < 0) {
      array_push($this->errors, ['consumed' => 'La valeur ne peut pas être inférieure à 0.']);
    }
  }

  // Validate presence of data {
    private function validatePresenceData()
    {
      if (!$this->user_id | !$this->beer_id) {
        array_push($this->errors, ['presence-data' => 'Il manque des données.']);
      }
    }

  // Check if model is valid.
  public function isValidCreate()
  {
    $this->errors = [];
    $this->validateUnique();
    $this->validateConsumedValue();
    $this->validatePresenceData();
    return empty($this->errors) ? true : false;
  }

  // Check if model is valid.
  public function isValid()
  {
    $this->errors = [];
    $this->validateConsumedValue();
    $this->validatePresenceData();
    return empty($this->errors) ? true : false;
  }


  // Save model.
  public function create()
  {
    if ($this->isValidCreate()) {
      $this->consumed_first = date('Y-m-d H:i:s');
      $this->consumed_last = date('Y-m-d H:i:s');
      $this->consumed = 1;
      $datas = get_object_vars($this);
      unset($datas['errors']);
      Database::insert(self::TABLE_NAME, $datas);
    }
  }

  // Update model.
  public function save()
  {
    if ($this->isValid()) {
      $datas = get_object_vars($this);
      unset($datas['errors']);
      Database::update(self::TABLE_NAME, $this->id, $datas);
    }
  }

  // Relations
  // ===========================================================================

  public function setUser($user)
  {
    if (gettype($user) == "object" && get_class($user) == "User") {
      $user = User::find($user->id);
      $this->user_id = $user ? $user->id : null;
    }
  }

  public function getUser()
  {
    return $this->user_id ? User::find($this->user_id) : null;
  }

  public function setBeer($beer)
  {
    if (gettype($beer) == "object" && get_class($beer) == "Beer") {
      $beer = User::find($beer->id);
      $this->beer_id = $beer ? $beer->id : null;
    }
  }

  public function getBeer()
  {
    return $this->beer_id ? Beer::find($this->beer_id) : null;
  }

  // Functions
  // ===========================================================================

  public function drink()
  {
    $this->consumed += 1;
    $this->consumed_last = date('Y-m-d H:i:s');
    $this->save();
  }

  public function toggleFavorite()
  {
    $this->is_favorite = $this->is_favorite ? 0 : 1;
    $this->save();
  }
}
