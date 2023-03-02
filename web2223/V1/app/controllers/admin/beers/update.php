<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodPost();
actionRequireAdmin();

// Manage Logic
// ===========================================================================

$id = $_GET['id'];
$beer = Beer::find($id);

echo $_POST["beer_type_verre_id"];
if ($beer == null) {
  header('Location: /admin/beers/index.php');
  die;
}

$view['form_fields'] = ["name", "description", "alcool", "ibu", "ebc", "style_id", "type_verre_id", "fermentation_id", "created_at"];

foreach ($view['form_fields'] as $f) {
  $beer->$f = $_POST["beer_{$f}"];
}

if ($beer->isValid()) {
  $beer->save();
  flashAdd('success', "La bière a été modifiée.");
} else {
  foreach ($beer->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/beers/index.php');
die;
