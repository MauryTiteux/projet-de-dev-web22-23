<h1>Créer une association</h1>
<form method="post" action="/admin/beers_formats/create.php">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <?php if ($f == "beer_id") : ?>
      <div>
        <label for="beer_format_beer_id">
          <p>Bière:</p>
        </label>
        <select id="beer_format_beer_id" name="beer_format_beer_id">
          <?php foreach (Beer::all() as $beer) : ?>
            <option value="<?= $beer->id ?>" <?= ($beer->id == $view['beer_format']->beer_id) ? "selected" : "" ?>><?= $beer->name ?></option>
          <?php endforeach ?>
        </select>
      </div>
    <?php elseif ($f == "format_id") : ?>
      <div>
        <label for="beer_format_format_id">
          <p>Bière:</p>
        </label>
        <select id="beer_format_format_id" name="beer_format_format_id">
          <?php foreach (Format::all() as $format) : ?>
            <option value="<?= $format->id ?>" <?= ($format->id == $view['beer_format']->format_id) ? "selected" : "" ?>><?= $format->name ?></option>
          <?php endforeach ?>
        </select>
      </div>
    <?php endif ?>
  <?php endforeach ?>
  <input type="submit" value="Créer" />
</form>
