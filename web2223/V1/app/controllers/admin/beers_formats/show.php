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

if ($beer_format == null) {
  header('Location: /admin/beers_formats/index.php');
  die;
}

$view['beer_format'] = $beer_format;
$view['form_fields'] = ["beer_id", "format_id"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Modifier association";

// Load view
$actionView = "admin/beers_formats/show.php";

// Load layout
include_once 'views/layouts/default.php';
