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

$beer = new Beer();
$view['form_fields'] = $view['form_fields'] = ["name", "description", "alcool", "ibu", "ebc", "style_id", "type_verre_id", "fermentation_id", "created_at"];

$_POST["beer_alcool"]= str_ireplace(",", ".",$_POST["beer_alcool"]);
$_POST["beer_name"]= str_ireplace("'", "\'",$_POST["beer_name"]);
$_POST["beer_description"]= str_ireplace("'", "\'",$_POST["beer_description"]);

foreach ($view['form_fields'] as $f) {
  $beer->$f = $_POST["beer_{$f}"];
}

if ($beer->isValid()) {
  $beer->create();
  flashAdd('success', "La bière a été ajoutée.");
} else {
  foreach ($beer->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/beers/index.php');
die;
