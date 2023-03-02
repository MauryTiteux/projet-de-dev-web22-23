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
$beer_format = BeersFormats::find($id);

if ($beer_format) {
  $beer_format->delete();
  flashAdd('success', "L'association a été supprimée.");
}

header('Location: /admin/beers_formats/index.php');
die;
