<h1>Créer une bière</h1>
<form method="post" action="/admin/beers/create.php" enctype="multipart/form-data">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <?php if ($f == "type_verre_id") : ?>
      <div>
        <label for="beer_type_verre_id">
          <p>Type de verre:</p>
        </label>
        <select id="beer_type_verre_id" name="beer_type_verre_id">
          <?php foreach (BeerGlass::all() as $glass) : ?>
            <option value="<?= $glass->id ?>" <?= ($glass->id == $view['beer']->type_verre_id) ? "selected" : "" ?>><?= $glass->name ?></option>
          <?php endforeach ?>
        </select>
      </div>
    <?php elseif ($f == "style_id") : ?>
      <div>
        <label for="beer_style_id">
          <p>Style:</p>
        </label>
        <select id="beer_style_id" name="beer_style_id">
          <?php foreach (BeerStyle::all() as $style) : ?>
            <option value="<?= $style->id ?>" <?= ($style->id == $view['beer']->style_id) ? "selected" : "" ?>><?= $style->name ?></option>
          <?php endforeach ?>
        </select>
      </div>
    <?php elseif ($f == "fermentation_id") : ?>
      <div>
        <label for="beer_fermentation_id">
          <p>Fermentation de la bière:</p>
        </label>
        <select id="beer_fermentation_id" name="beer_fermentation_id">
          <?php foreach (BeerFermentation::all() as $fermentation) : ?>
            <option value="<?= $fermentation->id ?>" <?= ($fermentation->id == $view['beer']->fermentation_id) ? "selected" : "" ?>><?= $fermentation->name ?></option>
          <?php endforeach ?>
        </select>
      </div>
    <?php else : ?>
      <div>
        <label for="beer_<?= $f ?>">
          <p><?= $f ?>:</p>
        </label>
        <input type="text" id="beer_<?= $f ?>" name="beer_<?= $f ?>" value="<?= $view['beer']->$f ?>">
      </div>
    <?php endif ?>
  <?php endforeach ?>
  <input type="submit" value="Créer" />
</form>
