<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireAdmin();

// Manage Logic
// ===========================================================================

$id = $_GET['id'];
$format = Format::find($id);

if ($format) {
  $format->delete();
  flashAdd('success', "Le format a été supprimé.");
}

header('Location: /admin/formats/index.php');
die;
