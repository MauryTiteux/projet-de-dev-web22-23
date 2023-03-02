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

$id = $_GET['id'];
$user_beer = new UsersBeers();
$user_beer->user_id = currentUser()->id;
$user_beer->beer_id = $id;


if($user_beer->create()) {
  flashAdd('success', "La bière a été rajoutée a la liste.");
} else {
  foreach ($user_beer->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /index.php');
