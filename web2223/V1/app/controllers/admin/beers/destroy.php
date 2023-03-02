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
$beer = Beer::find($id);

if ($beer) {
  $beer->delete();
  flashAdd('success', "La bière a été supprimée.");
}

header('Location: /admin/beers/index.php');
die;
