<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();

// Manage Logic
// ===========================================================================

//$view['beers'] = Beer::all();

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Accueil";

// Load view
$actionView = "pages/home.php";

// Load layout
include_once 'views/layouts/default.php';
