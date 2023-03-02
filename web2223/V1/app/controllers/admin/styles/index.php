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

$view['beer_styles'] = BeerStyle::all();

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Liste des styles";

// Load view
$actionView = "admin/styles/index.php";

// Load layout
include_once 'views/layouts/default.php';
