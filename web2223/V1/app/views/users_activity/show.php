<h1>Modifier commentaire</h1>
<form method="post" action="/users_activity/update.php?id=<?= $view['users_activity']->id ?>">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div class="form-group">
      <label class="form-label" for="users_activity_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <textarea rows="3" class="form-input" id="users_activity_<?= $f ?>" name="users_activity_<?= $f ?>"><?= $view['users_activity']->$f ?></textarea>
    </div>
  <?php endforeach ?>
  <input type="submit" value="Modifier" />
</form>
