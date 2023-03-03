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
$user_beer = UsersBeers::find($id);

if ($user_beer == null) {
  header('Location: /users_beer/index.php');
  die;
}

$view['user_beer'] = $user_beer;
$view['form_fields'] = ["comment"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Modifier commentaire";

// Load view
$actionView = "users_beers/show.php";

// Load layout
include_once 'views/layouts/default.php';
