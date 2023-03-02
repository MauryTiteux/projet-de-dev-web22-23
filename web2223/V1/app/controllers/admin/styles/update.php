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
$beer_style = BeerStyle::find($id);

if ($beer_style == null) {
  header('Location: /admin/glasses/index.php');
  die;
}

$view['form_fields'] = ["name"];

foreach ($view['form_fields'] as $f) {
  $beer_style->$f = $_POST["beer_style_{$f}"];
}

if ($beer_style->isValid()) {
  $beer_style->save();
  flashAdd('success', "Le format a été modifié.");
} else {
  foreach ($beer_style->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/styles/index.php');
die;
