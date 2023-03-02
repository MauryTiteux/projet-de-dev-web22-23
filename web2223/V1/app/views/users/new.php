<?php
$value_login = !empty($form['login']) ? $form['login'] : null;
$value_email = !empty($form['email']) ? $form['email'] : null;
?>

<h1>Inscription</h1>
<form method="post" action="/users/create.php">
  <div>
    <label for="user_lastname">
      <p>Nom:</p>
    </label>
    <input type="text" id="user_lastname" name="user_lastname" value="<?= $value_lastname ?>">
  </div>
  <div>
    <label for="user_firstname">
      <p>Prénom:</p>
    </label>
    <input type="text" id="user_firstname" name="user_firstname" value="<?= $value_firstname ?>">
  </div>
  <div>
    <label for="user_login">
      <p>Login:</p>
    </label>
    <input type="text" id="user_login" name="user_login" value="<?= $value_login ?>">
  </div>

  <div>
    <label for="user_departments_id">
      <p>Departement:</p>
    </label>
    <!--value 1-->
    <input type="radio" id="user_departments_id" name="user_departments_id" value="1" checked="checked">Urbanisme<br>
    <!--value 2-->
    <input type="radio" id="user_departments_id" name="user_departments_id" value="2">Architecte<br>
    <!--value 3-->
    <input type="radio" id="user_departments_id" name="user_departments_id" value="3">Paysagiste<br>
  </div>
  <br>
  <div>
    <label for="user_locomotions_id">
      <p>Moyen de déplacement:</p>
    </label>
    <!--value 1-->
    <input type="radio" id="user_locomotions_id" name="user_locomotions_id" value="1" checked="checked">Voiture<br>
    <!--value 2-->
    <input type="radio" id="user_locomotions_id" name="user_locomotions_id" value="2">Velo<br>
    <!--value 3-->
    <input type="radio" id="user_locomotions_id" name="user_locomotions_id" value="3">Covoiturage<br>
    <!--value 4-->
    <input type="radio" id="user_locomotions_id" name="user_locomotions_id" value="4">Bus<br>
    <!--value 5-->
    <input type="radio" id="user_locomotions_id" name="user_locomotions_id" value="5">Train<br>
    <!--value 6-->
    <input type="radio" id="user_locomotions_id" name="user_locomotions_id" value="6">Metro<br>
  </div>
  <br>
  <div>
    <label for="user_postal_code">
      <p>Code postal:</p>
    </label>
    <input type="text" id="user_postal_code" name="user_postal_code" value="<?= $value_user_postal_code ?>">
  </div>
  <div>
    <label for="user_email">
      <p>Email:</p>
    </label>
    <input type="text" id="user_email" name="user_email" value="<?= $value_email ?>">
  </div>
  <div>
    <label for="user_password">
      <p>Password:</p>
    </label>
    <input type="password" id="user_password" name="user_password" value="">
  </div>
  <input type="submit" value="S'inscrire" />
</form>
