<h1>Modificaiton</h1>
<form method="POST" action="/admin/modify_user.php">

  <div class="form-group">
    <label class="form-label" for="email">Email</label>
    <input class="form-input" type="text" id="email" name="email" value="<?= $view['user']->email ?>" placeholder="Email">
  </div>

  <div class="form-group">
    <label class="form-label" for="firstname">Prénom</label>
    <input class="form-input" type="text" id="firstname" name="firstname" value="<?= $view['user']->firstname ?>" placeholder="Prénom">
  </div>

  <div class="form-group">
    <label class="form-label" for="lastname">Nom de famille</label>
    <input class="form-input" type="text" id="lastname" name="lastname" value="<?= $view['user']->lastname ?>" placeholder="Nom de famille">
  </div>

  <div class="form-group">
    <label class="form-label" for="department_id">Département</label>
    <select name="department_id" class="form-select">
      <?php foreach ($view['departments'] as $department) : ?>
        <option value="<?= $department->id ?>" <?= $department->id == $view['user']->department_id ? "selected" : "" ?>><?= $department->name ?></option>
      <?php endforeach ?>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label" for="department_id">Code postal</label>
    <select name="postal_code_id" class="form-select">
      <?php foreach ($view['postal_codes'] as $postal_code) : ?>
        <option value="<?= $postal_code->id ?>" <?= $postal_code->id == $view['user']->postal_code_id ? "selected" : "" ?>><?= $postal_code->code ?> - <?= $postal_code->name ?></option>
      <?php endforeach ?>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label" for="activity_id">Activité</label>
    <select name="activity_id" class="form-select">
      <?php foreach ($view['activities'] as $activity) : ?>
        <option value="<?= $activity->id ?>" <?= $activity->id == $view['user_activity']->activity_id ? "selected" : "" ?>><?= $activity->id == $view['user_activity']->activity_id ? ">>> " : "" ?><?= $activity->name ?> (<?= $activity->remainingUsers() ?>)</option>
      <?php endforeach ?>
    </select>
  </div>


  <div class="form-group">
    <label class="form-label" for="is_admin">Administrateur</label>
    <select name="is_admin" class="form-select">
    <option value="1" <?= $view['user']->is_admin == 1 ? "selected" : "" ?>>Oui</option>
    <option value="0" <?= $view['user']->is_admin == 0 ? "selected" : "" ?>>Non</option>
    </select>
  </div>


  <input name="id" value="<?= $view['user']->id ?>" style="display: none">

  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Modifier" />
  </div>
</form>
