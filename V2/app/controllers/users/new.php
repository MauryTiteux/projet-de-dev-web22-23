<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireGuest();

// Manage Logic
// ===========================================================================

$view['departments'] = Database::all('departments');
$view['postal_codes'] = Database::all('postal_codes');

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Inscription";

// Load view
$actionView = "users/new.php";

// Load layout
include_once 'views/layouts/default.php';
