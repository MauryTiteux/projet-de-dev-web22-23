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

$activities = Database::all('activities');
foreach ($activities as $activity) {
  $obj = new Activity($activity);
  $view['activities'][] = $obj;
}

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Liste des activités";

// Load view
$actionView = "activities/index.php";

// Load layout
include_once 'views/layouts/default.php';
