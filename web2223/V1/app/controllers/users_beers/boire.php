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

$user_beer = UsersBeers::find($_GET['id']);
if ($user_beer && $user_beer->user_id == currentUser()->id) {
  $user_beer->drink();
}
header('Location: /users_beers/index.php');
die;
