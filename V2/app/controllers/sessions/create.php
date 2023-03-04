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

$user = new User;
$user->email = $_POST['email'];
$user->password = $_POST['password'];
$user = $user->auth_by_email();
if ($user) {
  $_SESSION['user']['user_id'] = $user->id;
  $_SESSION['user']['user_token'] = $user->session_token;
  flashAdd('success', "Bravo, vous êtes connecté.");
  header('Location: /activities/index.php');
  die;
}

flashAdd('error', "Identifiants incorects !");
header('Location: /sessions/new.php');
die;

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "";

// Load view
$actionView = "sessions/new.php";

// Load layout
include_once 'views/layouts/default.php';
