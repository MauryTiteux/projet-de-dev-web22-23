<h2>Les formats</h2>
<table class="table">
  <tr>
    <td><strong>Nom</strong></td>
    <td><strong>Modifier</strong></td>
    <td><strong>Supprimer</strong></td>
</tr>
  <tbody>
    <?php foreach ($view['formats'] as $format) : ?>
      <tr>
        <td><?= $format->name ?></td>
        <td><a class="btn" href="/admin/formats/show.php?id=<?= $format->id ?>">Modifier</a></td>
        <td><a class="btn" href="/admin/formats/destroy.php?id=<?= $format->id ?>">Supprimer</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a class="btn" href="/admin/formats/new.php">Ajouter un type.</a>
</ul>
