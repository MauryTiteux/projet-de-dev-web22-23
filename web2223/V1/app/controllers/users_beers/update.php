<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodPost();
actionRequireUser();

// Manage Logic
// ===========================================================================

$id = $_GET['id'];
$user_beer = UsersBeers::find($id);

if ($user_beer == null) {
  header('Location: /users_beers/index.php');
  die;
}

$view['form_fields'] = ["comment"];

foreach ($view['form_fields'] as $f) {
  $user_beer->$f = $_POST["user_beer_{$f}"];
}

if ($user_beer->isValid()) {
  $user_beer->save();
  flashAdd('success', "Le commentaire a été modifié.");
} else {
  foreach ($user_beer->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /users_beers/index.php');
die;
