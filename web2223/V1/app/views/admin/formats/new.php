<h1>Créer un format</h1>
<form method="post" action="/admin/formats/create.php">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <div>
      <label for="format_<?= $f ?>">
        <p><?= $f ?>:</p>
      </label>
      <input type="text" id="format_<?= $f ?>" name="format_<?= $f ?>" value="<?= $view['format']->$f ?>">
    </div>
  <?php endforeach ?>
  <input type="submit" value="Créer" />
</form>
