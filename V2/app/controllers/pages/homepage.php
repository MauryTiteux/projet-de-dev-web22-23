<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();

// Manage Logic
// ===========================================================================

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Page d'accueil";

// Load view
$actionView = "pages/homepage.php";

// Load layout
include_once 'views/layouts/default.php';
