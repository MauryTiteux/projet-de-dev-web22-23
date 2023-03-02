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

$format = new Format();
$view['form_fields'] = ["name"];

foreach ($view['form_fields'] as $f) {
  $format->$f = $_POST["format_{$f}"];
}

if ($format->isValid()) {
  $format->create();
  flashAdd('success', "Le format a été ajouté.");
} else {
  foreach ($format->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/formats/index.php');
die;
