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

$beer_format = new BeersFormats();
$view['form_fields'] = ["beer_id", "format_id"];

foreach ($view['form_fields'] as $f) {
  $beer_format->$f = $_POST["beer_format_{$f}"];
}

if ($beer_format->isValid()) {
  $beer_format->create();
  flashAdd('success', "L'association a été ajoutée.");
} else {
  foreach ($beer_format->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/beers_formats/index.php');
die;
