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
$beer_style = BeerStyle::find($id);

if ($beer_style) {
  $beer_style->delete();
  flashAdd('success', "Le style a été supprimée.");
}

header('Location: /admin/styles/index.php');
die;
