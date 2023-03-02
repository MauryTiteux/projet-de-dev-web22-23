<?php
class Beer
{
  // Variables
  // ===========================================================================

  // Database table.
  const TABLE_NAME = "beers";

  // Object properties.
  public $id = null;
  public $name = null;
  public $description = null;
  public $alcool = null;
  public $ibu = null;
  public $ebc = null;
  public $style_id = null;
  public $type_verre_id = null;
  public $created_at = null;
  public $fermentation_id = null;

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
    $datas = Database::all(self::TABLE_NAME);
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

  // Validations & persistence.
  // ===========================================================================

  // Check if unique name.
  private function validateUniqueName()
  {
    $data = Database::where(self::TABLE_NAME, 'name', $this->name);
    if ($data && $data->id != $this->id) {
      array_push($this->errors, ['unique_name' => 'Une bière possède déjà ce nom.']);
    }
  }

  // Check if model is valid.


  // Save model.
  // public function create()
  // {
  //   if ($this->isValid()) {
  //     $datas = get_object_vars($this);
  //     unset($datas['errors']);
  //     Database::insert(self::TABLE_NAME, $datas);
  //   }
  // }


  // Delete item.
  public function delete()
  {
    Database::delete(self::TABLE_NAME, $this->id);
  }

  // Relations
  // ===========================================================================


  public function getFormats() {
    $items = [];
    $data = BeersFormats::beers($this->id);
    foreach($data as $item) {
      array_push($items, $item->getFormat());
    }
    return $items;
  }


}
