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

if ($beer_style == null) {
  header('Location: /admin/glasses/index.php');
  die;
}

$view['beer_style'] = $beer_style;
$view['form_fields'] = ["name"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Modifier {$beer_style->name}";

// Load view
$actionView = "admin/styles/show.php";

// Load layout
include_once 'views/layouts/default.php';
