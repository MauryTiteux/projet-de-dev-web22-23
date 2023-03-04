<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodPost();
actionRequireAdmin();

// Manage Logic
// ===========================================================================

$user = new User();
$user->id             = (int) $_POST['id'];
$user->email          = $_POST['email'];
$user->lastname       = $_POST['lastname'];
$user->firstname      = $_POST['firstname'];
$user->postal_code_id = (int) $_POST['postal_code_id'];
$user->department_id  = (int) $_POST['department_id'];
$user->is_admin       = (int) $_POST['is_admin'];

$user_activity = new UserActivity(Database::where('users_activities', 'user_id', $user->id));
$user_activity->activity_id = (int) $_POST['activity_id'];

if (!$user->validate_update() || !$user_activity->validate_update()) {
  foreach ($user->errors as $k => $v) { flashAdd('error', array_values($v)[0]); }
  foreach ($user_activity->errors as $k => $v) { flashAdd('error', array_values($v)[0]); }
} else {
  $user->update($user->id);
  $user_activity->update($user_activity->id);
  flashAdd('sucess', "L'utilisateur a été modifié.");
}

header('Location: /admin/list_users.php');
die;

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "";

// Load view
$actionView = "admin/modify_user.php";

// Load layout
include_once 'views/layouts/default.php';
