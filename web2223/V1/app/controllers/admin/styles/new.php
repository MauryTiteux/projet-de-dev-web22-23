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

$beer_style = new BeerStyle();

$view['beer_style'] = $beer_style;
$view['form_fields'] = ["name"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Ajouter un style";

// Load view
$actionView = "admin/styles/new.php";

// Load layout
include_once 'views/layouts/default.php';
