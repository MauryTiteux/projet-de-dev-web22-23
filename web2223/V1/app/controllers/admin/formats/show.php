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

if ($format == null) {
  header('Location: /admin/formats/index.php');
  die;
}

$view['format'] = $format;
$view['form_fields'] = ["name"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Modifier {$format->name}";

// Load view
$actionView = "admin/formats/show.php";

// Load layout
include_once 'views/layouts/default.php';
