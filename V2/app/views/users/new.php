<h1>Inscription</h1>
<form method="POST" action="/users/create.php">

  <div class="form-group">
    <label class="form-label" for="email">Email</label>
    <input class="form-input" type="text" id="email" name="email" placeholder="Email">
  </div>

  <div class="form-group">
    <label class="form-label" for="firstname">Prénom</label>
    <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Prénom">
  </div>

  <div class="form-group">
    <label class="form-label" for="lastname">Nom de famille</label>
    <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Nom de famille">
  </div>

  <div class="form-group">
    <label class="form-label" for="password">Mot de passe</label>
    <input class="form-input" type="password" id="password" name="password" placeholder="Mot de passe">
  </div>

  <div class="form-group">
    <label class="form-label" for="department_id">Département</label>
    <select name="department_id" class="form-select">
      <option value="0">Veuillez choisir un département.</option>
      <?php foreach ($view['departments'] as $department) : ?>
        <option value="<?= $department->id ?>"><?= $department->name ?></option>
      <?php endforeach ?>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label" for="department_id">Code postal</label>
    <select name="postal_code_id" class="form-select">
      <option value="0">Veuillez choisir un code postal.</option>
      <?php foreach ($view['postal_codes'] as $postal_code) : ?>
        <option value="<?= $postal_code->id ?>"><?= $postal_code->code ?> - <?= $postal_code->name ?></option>
      <?php endforeach ?>
    </select>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="S'inscrire" />
  </div>
</form>
