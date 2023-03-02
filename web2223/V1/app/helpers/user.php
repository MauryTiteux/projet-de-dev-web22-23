<?php
// Verify if user is logged.
function currentUser()
{
  if (isset($_SESSION['user']['user_id']) && isset($_SESSION['user']['user_token'])) {
    $user = User::findWithToken($_SESSION['user']['user_id'], $_SESSION['user']['user_token']);
    return $user;
  }
}

// Verify if an user is admin.
function currentUserIsAdmin()
{
  return currentUser()->roles_id == 2 ? true : false;
}

// Ensure user is logged.
function actionRequireUser()
{
  if (!currentUser()) {
    flashAdd('error', "Vous devez être connecté pour accéder à cette page.");
    header('Location: /error404.php');
    die;
  }
}

// Ensure user is guest.
function actionRequireGuest()
{
  if (currentUser()) {
    flashAdd('error', "Vous ne pouvez pas être connecté pour accéder à cette page.");
    header('Location: /error404.php');
    die;
  }
}

// Ensure user is admin.
function actionRequireAdmin()
{
  if (!currentUserIsAdmin()) {
    flashAdd('error', "Vous ne pouvez pas accéder à cette page.");
    header('Location: /error404.php');
    die;
  }
}
