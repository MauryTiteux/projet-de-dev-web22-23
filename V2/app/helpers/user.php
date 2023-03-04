<?php
function currentUser()
{
  if (isset($_SESSION['user']['user_id']) && isset($_SESSION['user']['user_token'])) {
    $user = Database::where('users', 'session_token', $_SESSION['user']['user_token']);
    return new User($user);
  }
}

function isAdmin()
{
  return (currentUser() && currentUser()->is_admin == 1) ? true : false;
}

function actionRequireUser()
{
  if (!currentUser()) {
    flashAdd('error', "Vous devez être connecté pour accéder à cette page.");
    header('Location: /error404.php');
    die;
  }
}

function actionRequireGuest()
{
  if (currentUser()) {
    flashAdd('error', "Vous ne pouvez pas être connecté pour accéder à cette page.");
    header('Location: /error404.php');
    die;
  }
}

function actionRequireAdmin()
{
  if (!isAdmin()) {
    flashAdd('error', "Vous devez être admin pour accéder à cette page.");
    header('Location: /error404.php');
    die;
  }
}
