<h2>Les associations bières et formats</h2>
<table class="table">
  <tr>
    <td><strong>Bière</strong></td>
    <td><strong>Format</strong></td>
    <td><strong>Modifier</strong></td>
    <td><strong>Supprimer</strong></td>
  </tr>
  <tbody>
    <?php foreach ($view['beers_formats'] as $beer_format) : ?>
      <tr>
        <td><?= $beer_format->getBeer()->name ?></td>
        <td><?= $beer_format->getFormat()->name ?></td>
        <td><a class="btn" href="/admin/beers_formats/show.php?id=<?= $beer_format->id ?>">Modifier</a></td>
        <td><a class="btn" href="/admin/beers_formats/destroy.php?id=<?= $beer_format->id ?>">Supprimer</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a class="btn" href="/admin/beers_formats/new.php">Ajouter une association.</a>
</ul>
