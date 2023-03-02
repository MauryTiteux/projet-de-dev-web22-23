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
$beer_format = BeersFormats::find($id);

if ($beer_format == null) {
  header('Location: /admin/beers_formats/index.php');
  die;
}

$view['form_fields'] = ["beer_id", "format_id"];

foreach ($view['form_fields'] as $f) {
  $beer_format->$f = $_POST["beer_format_{$f}"];
}

if ($beer_format->isValid()) {
  $beer_format->save();
  flashAdd('success', "L'association a été modifié.");
} else {
  foreach ($beer_format->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/beers_formats/index.php');
die;
