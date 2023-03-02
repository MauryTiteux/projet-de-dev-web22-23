<h1>Créer un type de verre</h1>
<form method="post" action="/admin/glasses/create.php">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div>
      <label for="beer_glass_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <input type="text" id="beer_glass_<?= $f ?>" name="beer_glass_<?= $f ?>" value="<?= $view['beer_glass']->$f ?>">
    </div>
  <?php endforeach ?>
  <input type="submit" value="Créer" />
</form>
