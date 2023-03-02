<h1>Créer un style</h1>
<form method="post" action="/admin/styles/create.php">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div>
      <label for="beer_style_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <input type="text" id="beer_style_<?= $f ?>" name="beer_style_<?= $f ?>" value="<?= $view['beer_style']->$f ?>">
    </div>
  <?php endforeach ?>
  <input type="submit" value="Créer" />
</form>
