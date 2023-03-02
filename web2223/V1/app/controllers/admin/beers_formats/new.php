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

$beer_format = new BeersFormats();

$view['beer_format'] = $beer_format;
$view['form_fields'] = ["beer_id", "format_id"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Ajouter un format";

// Load view
$actionView = "admin/beers_formats/new.php";

// Load layout
include_once 'views/layouts/default.php';
