<h2>Les types</h2>
<table class="table">
  <tr>
    <td><strong>Nom</strong></td>
    <td><strong>Modifier</strong></td>
    <td><strong>Supprimer</strong></td>
</tr>
  <tbody>
    <?php foreach ($view['beer_styles'] as $beer_style) : ?>
      <tr>
        <td><?= $beer_style->name ?></td>
        <td><a class="btn" href="/admin/styles/show.php?id=<?= $beer_style->id ?>">Modifier</a></td>
        <td><a class="btn" href="/admin/styles/destroy.php?id=<?= $beer_style->id ?>">Supprimer</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a class="btn" href="/admin/styles/new.php">Ajouter un type.</a>
</ul>
