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

$format = new Format();

$view['format'] = $format;
$view['form_fields'] = ["name"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Ajouter un format";

// Load view
$actionView = "admin/formats/new.php";

// Load layout
include_once 'views/layouts/default.php';
