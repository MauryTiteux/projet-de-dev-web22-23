<?php
class Database
{
  // Variables
  // ===========================================================================

  // Global
  // ---------------------------------------------------------------------------

  const DB_SERVER = "localhost";
  const DB_USERNAME = "root";
  const DB_PASSWORD = "root";
  const DB_DATABASE = "db-exam";

  // Connection
  // ===========================================================================

  // Open connection.
  private static function connectionInit()
  {
    $connection = new PDO("mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_DATABASE . ";charset=utf8", self::DB_USERNAME, self::DB_PASSWORD);
    return $connection;
  }

  // Fetch
  // ===========================================================================

  // Fetch all rows.
  public static function all($table, $order = "id", $limit = 1000)
  {
    $query = self::connectionInit()->prepare("SELECT * FROM `" . $table . "` ORDER BY `" . $order . "` ASC LIMIT " . $limit . "");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  // Fetch first row.
  public static function first($table, $column_order = "id")
  {
    $query = self::connectionInit()->prepare("SELECT * FROM `" . $table . "` ORDER BY `" . $column_order . "` ASC LIMIT 1");
    $query->execute();
    return $query->fetch(PDO::FETCH_OBJ);
  }

  // Fetch last row.
  public static function last($table, $column_order = "id")
  {
    $query = self::connectionInit()->prepare("SELECT * FROM `" . $table . "` ORDER BY `" . $column_order . "` DESC LIMIT 1");
    $query->execute();
    return $query->fetch(PDO::FETCH_OBJ);
  }

  // Fetch a row searching by its `id`.
  public static function find($table, $id)
  {
    $query = self::connectionInit()->prepare("SELECT * FROM `" . $table . "` WHERE `id` = " . $id . "");
    $query->execute();
    return $query->fetch(PDO::FETCH_OBJ);
  }

  // Fetch first row searching by its `field` and `value`.
  public static function where($table, $field, $value, $column_order = "id")
  {
    $query = self::connectionInit()->prepare("SELECT * FROM `" . $table . "` WHERE `" . $field . "` = :" . $field . " ORDER BY `" . $column_order . "` DESC LIMIT 1");
    $query->execute([$field => $value]);
    return $query->fetch(PDO::FETCH_OBJ);
  }

  // Insert
  // ===========================================================================

  // Insert a record with associated datas.
  public static function insert($table, $datas)
  {
    $columns = join(', ', array_keys($datas));
    $values = ':' . join(', :', array_keys($datas));
    $query = self::connectionInit()->prepare("INSERT INTO `" . $table . "`(" . $columns . ") VALUES (" . $values . ")");
    $query->execute($datas);
  }

  // Update
  // ===========================================================================

  // Update a record with associated datas.
  public static function update($table, $id, $datas)
  {
    $columns = [];
    foreach ($datas as $k => $v) {
      array_push($columns, "{$k} = :{$k}");
    }
    $columns = join(', ', $columns);
    $query = self::connectionInit()->prepare("UPDATE `" . $table . "` SET " . $columns . " WHERE `id`=" . $id . "");
    $query->execute($datas);
  }

  // Delete
  // ===========================================================================

  // Delete a record by its `id`.
  public static function delete($table, $id)
  {
    $query = self::connectionInit()->prepare("DELETE FROM `" . $table . "` WHERE `id`=" . $id . "");
    $query->execute();
  }
}
