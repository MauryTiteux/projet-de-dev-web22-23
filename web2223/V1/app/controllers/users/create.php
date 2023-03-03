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

$form['lastname'] = $_POST['user_lastname'];
$form['firstname'] = $_POST['user_firstname'];
$form['login'] = $_POST['user_login'];
$form['departments_id'] = $_POST['user_departments_id'];
$form['locomotions_id'] = $_POST['user_locomotions_id'];
$form['user_postal_code'] = $_POST['user_postal_code'];
$form['email'] = $_POST['user_email'];
$form['password'] = $_POST['user_password'];

$user = new User();
$user->lastname = (string) $form['lastname'];
$user->firstname = (string) $form['firstname'];
$user->login = (string) $form['login'];
$user->departments_id = (int) $form['departments_id'];
$user->locomotions_id = (int) $form['locomotions_id'];
$user->postal_code = (int) $form['user_postal_code'];
$user->email = (string) $form['email'];
$user->password = (string) $form['password'];
if ($user->isValid()) {
  $user->create();
  flashAdd('success', "Vous vous êtes inscrit, vous pouvez maintenant vous connecter {$user->login}");
  header('Location: /sessions/new.php');
  die;
} else {
  foreach ($user->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Inscription";

// Load view
$actionView = "users/new.php";

// Load layout
include_once 'views/layouts/default.php';
