<h1>Modifier le type <?= $view['beer_style']->name ?></h1>
<form method="post" action="/admin/styles/update.php?id=<?= $view['beer_style']->id ?>">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div>
      <label for="beer_style_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <input type="text" id="beer_style_<?= $f ?>" name="beer_style_<?= $f ?>" value="<?= $view['beer_style']->$f ?>">
    </div>
  <?php endforeach ?>
  <input type="submit" value="Modifier" />
</form>
