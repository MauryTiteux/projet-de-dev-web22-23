<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireGuest();

// Manage Logic
// ===========================================================================

// No Logic

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Inscription";

// Load view
$actionView = "users/new.php";

// Load layout
include_once 'views/layouts/default.php';
