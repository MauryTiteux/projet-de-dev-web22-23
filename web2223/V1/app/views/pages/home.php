<h2>Les bières</h2>
<ul>
  <?php foreach ($view['beers'] as $beer) : ?>
    <div>
      <h4><?= $beer->name ?></h4>
      <p><?= $beer->description ?></p>
      <h5>Les formats</h5>
      <?php if (empty($beer->getFormats())) : ?>
        <p>Aucun formats de trouver</p>
      <?php else : ?>
        <ul>
          <?php foreach ($beer->getFormats() as $format) : ?>
            <li><?= $format->name ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
      <?php if (currentUser()) : ?>
        <div class="actions">
          <?php if (!currentUser()->hasBeerInList($beer->id)): ?>
            <a class="btn btn-success" href="/users_beers/create.php?id=<?= $beer->id ?>">Ajouter a ma liste</a>
          <?php else : ?>

          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
    <hr>
  <?php endforeach ?>
</ul>
