<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireUser();

// Manage Logic
// ===========================================================================

$user_activity = new UserActivity();
$user_activity->user_id = currentUser()->id;
$user_activity->activity_id = $_GET['activity'];
$user_activity->dinner = $_GET['dinner'] == "1" ? 1 : 0;

if (!$user_activity->validate()) {
  foreach ($user_activity->errors as $k => $v) { flashAdd('error', array_values($v)[0]); }
} else {
  $user_activity->save();
  flashAdd('sucess', "Vous êtes bien inscrit.");
}

header('Location: /activities/index.php');
die;

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "";

// Load view
$actionView = "activities/index.php";

// Load layout
include_once 'views/layouts/default.php';
