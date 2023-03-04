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

$users = Database::all('users');
foreach ($users as $user) {
  $obj = new User($user);
  $view['users'][] = $obj;
}

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Liste des utilisateurs";

// Load view
$actionView = "admin/list_users.php";

// Load layout
include_once 'views/layouts/default.php';
