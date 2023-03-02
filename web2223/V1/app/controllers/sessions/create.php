<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodPost();
actionRequireGuest();

// Manage Logic
// ===========================================================================

$form['login'] = $_POST['user_pseudo'];
$form['password'] = $_POST['user_password'];

// Try to find user by data posted
$user = User::findWithCredentials($form['login'], $form['password']);

if ($user) {
  $_SESSION['user']['user_id'] = $user->id;
  $_SESSION['user']['user_token'] = $user->session_token;
  flashAdd('success', "Bravo, vous êtes connecté.");
  header('Location: /');
  die;
}

flashAdd('error', "Identifiants incorects !");

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Connexion";

// Load view
$actionView = "sessions/new.php";

// Load layout
include_once 'views/layouts/default.php';
