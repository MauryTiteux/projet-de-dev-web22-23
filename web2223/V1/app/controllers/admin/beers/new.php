<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireAdmin();

// Manage Logic
// ===========================================================================

$beer = new Beer();

$view['beer'] = $beer;
$view['form_fields'] = ["name", "description", "alcool", "ibu", "ebc", "style_id", "type_verre_id", "fermentation_id","created_at"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Ajouter une bière";

// Load view
$actionView = "admin/beers/new.php";

// Load layout
include_once 'views/layouts/default.php';
