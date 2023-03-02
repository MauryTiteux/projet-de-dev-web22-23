<?php
class BeersFormats
{
  // Variables
  // ===========================================================================

  // Database table.
  const TABLE_NAME = "beer_format";

  // Object properties.
  public $id = null;
  public $beer_id = 1;
  public $format_id = null;

  // Abstract properties.
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

  public static function beers($id, $items = []) {
    $data = self::all();
    foreach($data as $item) {
      $item = self::populate($item);
      if($item->beer_id == $id) {
        array_push($items, $item);
      }
    }
    return $items;
  }

  // Validations & persistence.
  // ===========================================================================

  // Validate if beer exist.
  private function validateBeer()
  {
    $data = Beer::find($this->beer_id);
    if (!$data) {
      array_push($this->errors, ['beer_absent' => "La bière n'existe pas."]);
    }
  }

  // Validate if format exist.
  private function validateFormat()
  {
    $data = Format::find($this->format_id);
    if (!$data) {
      array_push($this->errors, ['beer_absent' => "La bière n'existe pas."]);
    }
  }

  private function validateUnique() {
    $data = BeersFormats::all();
    foreach($data as $item) {
      if($item->beer_id == $this->beer_id && $item->format_id == $this->format_id) {
        array_push($this->errors, ['beer_unique' => "l'association existe déjà."]);
      }
    }
  }

  // Check if model is valid.
  public function isValid()
  {
    $this->errors = [];
    $this->validateBeer();
    $this->validateFormat();
    $this->validateUnique();
    return empty($this->errors) ? true : false;
  }

  // Save model.
  public function create()
  {
    if ($this->isValid()) {
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

  // Delete item.
  public function delete()
  {
    Database::delete(self::TABLE_NAME, $this->id);
  }

  // Functions
  // ===========================================================================

  public function getFormat() {
    return Format::find($this->format_id);
  }

  public function getBeer() {
    return Beer::find($this->beer_id);
  }
}
