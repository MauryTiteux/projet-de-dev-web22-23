<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireUser();

// Manage Logic
// ===========================================================================

$view['users_activity'] = usersActivity::fromUser(currentUser()->id);

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "User - Liste des bières Likées";

// Load view
$actionView = "users_activity/index.php";

// Load layout
include_once 'views/layouts/default.php';
