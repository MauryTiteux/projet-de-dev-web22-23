<h2>Les type de fermentations</h2>
<table class="table">
  <tr>
    <td><strong>Nom</strong></td>
    <td><strong>Modifier</strong></td>
    <td><strong>Supprimer</strong></td>
</tr>
  <tbody>
    <?php foreach ($view['beer_fermentation'] as $beer_fermentation) : ?>
      <tr>
        <td><?= $beer_fermentation->name ?></td>
        <td><a class="btn" href="/admin/fermentation/show.php?id=<?= $beer_fermentation->id ?>">Modifier</a></td>
        <td><a class="btn" href="/admin/fermentation/destroy.php?id=<?= $beer_fermentation->id ?>">Supprimer</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a class="btn" href="/admin/fermentation/new.php">Ajouter un type.</a>
</ul>
