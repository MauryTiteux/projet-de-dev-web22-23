<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodPost();
actionRequireGuest();

// Manage Logic
// ===========================================================================

$user = new User();
$user->email          = $_POST['email'];
$user->lastname       = $_POST['lastname'];
$user->firstname      = $_POST['firstname'];
$user->password       = $_POST['password'];
$user->postal_code_id = $_POST['postal_code_id'];
$user->department_id  = $_POST['department_id'];

if (!$user->validate()) {
  foreach ($user->errors as $k => $v) { flashAdd('error', array_values($v)[0]); }
  $view['departments'] = Database::all('departments');
  $view['postal_codes'] = Database::all('postal_codes');
  header('Location: /users/new.php');
  die;
} else {
  $user->save();
  flashAdd('sucess', "Votre compte a été créé, vous pouvez vous connecté.");
  header('Location: /sessions/new.php');
  die;
}

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "";

// Load view
$actionView = "users/new.php";

// Load layout
include_once 'views/layouts/default.php';
