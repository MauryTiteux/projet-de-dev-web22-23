<?php
// Verify if the request method is 'GET'
function actionRequireMethodGet()
{
  if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    flashAdd('error', "Vous n'avez pas accès à cette page (REQUIRE GET).");
    header('Location: /error404.php');
    die;
  }
}

// Verify if the request method is 'POST'
function actionRequireMethodPost()
{
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    flashAdd('error', "Vous n'avez pas accès à cette page (REQUIRE POST).");
    header('Location: /error404.php');
    die;
  }
}
