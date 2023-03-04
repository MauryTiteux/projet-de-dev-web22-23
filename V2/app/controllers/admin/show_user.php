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

$view['departments'] = Database::all('departments');
$view['postal_codes'] = Database::all('postal_codes');
$view['user'] = new User(Database::where('users', 'id', $_GET['id']));
foreach(Database::all('activities') as $activity) {
  $view['activities'][] = new Activity($activity);
}
$view['user_activity'] = Database::where('users_activities', 'user_id', $view['user']->id);


// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Modification d'utilisateur";

// Load view
$actionView = "admin/show_user.php";

// Load layout
include_once 'views/layouts/default.php';
