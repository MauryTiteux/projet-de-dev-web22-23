<h2>Les bières</h2>
<table class="table">
  <tr>
    <td><strong>Nom</strong></td>
    <td><strong>Description</strong></td>
    <td><strong>Alcool</strong></td>
    <td><strong>Type verre</strong></td>
    <td><strong>Modifier</strong></td>
    <td><strong>Supprimer</strong></td>
</tr>
  <tbody>
    <?php foreach ($view['beers'] as $beer) : ?>
      <tr>
        <td><?= $beer->name = str_ireplace("\'", "'",$beer->name); ?></td>
        <td><?= $beer->description = str_ireplace("\'", "'",$beer->description);?></td>
        <td><?= $beer->alcool = str_ireplace(".", ",",$beer->alcool);?></td>
        <td><?= $beer->getGlass() ?></td>
        <td><a class="btn" href="/admin/beers/show.php?id=<?= $beer->id ?>">Modifier</a></td>
        <td><a class="btn" href="/admin/beers/destroy.php?id=<?= $beer->id ?>">Supprimer</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a class="btn" href="/admin/beers/new.php">Ajouter une bière.</a>
</ul>