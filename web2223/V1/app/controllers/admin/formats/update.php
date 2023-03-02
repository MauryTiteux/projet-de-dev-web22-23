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
$format = Format::find($id);

if ($format == null) {
  header('Location: /admin/formats/index.php');
  die;
}

$view['form_fields'] = ["name"];

foreach ($view['form_fields'] as $f) {
  $format->$f = $_POST["format_{$f}"];
}

if ($format->isValid()) {
  $format->save();
  flashAdd('success', "Le format a été modifié.");
} else {
  foreach ($format->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/formats/index.php');
die;
