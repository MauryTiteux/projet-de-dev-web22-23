<h1>Créer un type de fermentations</h1>
<form method="post" action="/admin/fermentation/create.php">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div>
      <label for="beer_fermentation_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <input type="text" id="beer_fermentation_<?= $f ?>" name="beer_fermentation_<?= $f ?>" value="<?= $view['beer_fermentation']->$f ?>">
    </div>
  <?php endforeach ?>
  <input type="submit" value="Créer" />
</form>
