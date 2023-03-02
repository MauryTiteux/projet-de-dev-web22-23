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

if ($beer == null) {
  header('Location: /admin/beers/index.php');
  die;
}

$view['beer'] = $beer;
$view['form_fields'] = ["name", "description", "alcool", "ibu", "ebc", "style_id", "type_verre_id", "fermentation_id", "created_at"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Modifier {$beer->name}";

// Load view
$actionView = "admin/beers/show.php";

// Load layout
include_once 'views/layouts/default.php';
