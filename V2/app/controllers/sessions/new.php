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

// No logic.

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Connexion";

// Load view
$actionView = "sessions/new.php";

// Load layout
include_once 'views/layouts/default.php';
