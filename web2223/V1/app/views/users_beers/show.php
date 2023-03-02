<h1>Modifier commentaire</h1>
<form method="post" action="/users_beers/update.php?id=<?= $view['user_beer']->id ?>">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div class="form-group">
      <label class="form-label" for="user_beer_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <textarea rows="3" class="form-input" id="user_beer_<?= $f ?>" name="user_beer_<?= $f ?>"><?= $view['user_beer']->$f ?></textarea>
    </div>
  <?php endforeach ?>
  <input type="submit" value="Modifier" />
</form>
