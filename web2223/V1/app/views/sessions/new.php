<?php
$value_login = !empty($form['login']) ? $form['login'] : null;
?>

<h1>Connexion</h1>
<form method="post" action="/sessions/create.php">
  <div class="form-group">
    <label class="form-label" for="user_pseudo"><p>login:</p></label>
    <input class="form-input" type="text" id="user_pseudo" name="user_pseudo" value="<?= $value_login ?>">
  </div>
  <div class="form-group">
    <label class="form-label" for="user_password"><p>Password:</p></label>
    <input class="form-input" type="password" id="user_password" name="user_password" value="">
  </div>
  <input class="btn btn-success" type="submit" value="Se conecter" />
</form>
