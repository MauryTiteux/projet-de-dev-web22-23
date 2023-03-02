<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

// No authorization required.

// Include models
// ===========================================================================

// No models required.

// Manage Logic
// ===========================================================================

// No Logic required.

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "ERREUR 404";

// Load view
$actionView = "pages/error.php";

// Load layout
include_once 'views/layouts/default.php';
