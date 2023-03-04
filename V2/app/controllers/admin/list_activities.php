<?php
// Dependencies
// ===========================================================================

require_once 'database/connect.php';
require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireAdmin();

// Manage Logic
// ===========================================================================

$activities = Database::all('activities');

foreach($activities as $activity) {
  $list = Database::allWhere('users_activities', 'activity_id', $activity->id);
  $view['datas'][$activity->id]['name'] = $activity->name;
  foreach($list as $item) {
    $user = new User(Database::where('users', 'id', $item->user_id));
    $view['datas'][$activity->id]['users'][] = $user;
  }
}

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Liste des activités";

// Load view
$actionView = "admin/list_activities.php";

// Load layout
include_once 'views/layouts/default.php';
