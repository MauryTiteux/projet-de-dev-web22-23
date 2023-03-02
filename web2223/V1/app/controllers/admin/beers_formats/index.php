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

$view['beers_formats'] = BeersFormats::all();

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Association des formats et des bières";

// Load view
$actionView = "admin/beers_formats/index.php";

// Load layout
include_once 'views/layouts/default.php';
