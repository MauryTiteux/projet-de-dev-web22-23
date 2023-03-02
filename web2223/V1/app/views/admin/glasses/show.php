<h1>Modifier le type <?= $view['beer_glass']->name ?></h1>
<form method="post" action="/admin/glasses/update.php?id=<?= $view['beer_glass']->id ?>">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div>
      <label for="beer_glass_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <input type="text" id="beer_glass_<?= $f ?>" name="beer_glass_<?= $f ?>" value="<?= $view['beer_glass']->$f ?>">
    </div>
  <?php endforeach ?>
  <input type="submit" value="Modifier" />
</form>
