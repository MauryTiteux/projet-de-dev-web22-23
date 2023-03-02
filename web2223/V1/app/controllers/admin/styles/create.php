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

$beer_style = new BeerStyle();
$view['form_fields'] = ["name"];

foreach ($view['form_fields'] as $f) {
  $beer_style->$f = $_POST["beer_style_{$f}"];
}

if ($beer_style->isValid()) {
  $beer_style->create();
  flashAdd('success', "Le style a été ajouté..");
} else {
  foreach ($beer_style->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/styles/index.php');
die;
