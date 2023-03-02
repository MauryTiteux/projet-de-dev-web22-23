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

$view['beers'] = Beer::all();

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Liste des bières";

// Load view
$actionView = "admin/beers/index.php";

// Load layout
include_once 'views/layouts/default.php';
