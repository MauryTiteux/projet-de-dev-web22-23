<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireUser();

// Manage Logic
// ===========================================================================

$_SESSION['user'] = null;
flashAdd('success', "Bravo, vous êtes déconnecté.");
header('Location: /');
die;

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "";

// Load view
$actionView = "sessions/new.php";

// Load layout
include_once 'views/layouts/default.php';
