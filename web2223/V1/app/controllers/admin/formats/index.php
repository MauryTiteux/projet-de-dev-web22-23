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

$view['formats'] = Format::all();

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Liste des formats";

// Load view
$actionView = "admin/formats/index.php";

// Load layout
include_once 'views/layouts/default.php';
