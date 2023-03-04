<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireAdmin();

// Manage Logic
// ===========================================================================

$user_activity = Database::where('users_activities', 'user_id', $_GET['id']);
Database::delete('users_activities', $user_activity->id);
header('Location: /admin/list_activities.php');
die;

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "";

// Load view
$actionView = "admin/modify_user.php";

// Load layout
include_once 'views/layouts/default.php';
