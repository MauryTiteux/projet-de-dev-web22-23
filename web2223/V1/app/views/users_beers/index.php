<h2>Les bières</h2>
<table class="table">
  <tr>
    <td><strong>Nom</strong></td>
    <td><strong>Commentaire</strong></td>
    <td><strong>Consomée</strong></td>
    <td><strong>Favori</strong></td>
    <td><strong>Boire</strong></td>
    <td><strong>Modifier commentaire</strong></td>
  </tr>
  <tbody>
    <?php foreach ($view['user_beers'] as $user_beer) : ?>
      <tr>
        <td><?= $user_beer->getBeer()->name ?></td>
        <td><?= $user_beer->comment ?></td>
        <td><?= $user_beer->consumed ?></td>
        <td><a class="btn btn-<?= $user_beer->is_favorite ?"error" : "success" ?>" href="/users_beers/favorite.php?id=<?= $user_beer->id ?>"><?= $user_beer->is_favorite ? "retirer des favoris" : "Ajouter au favori" ?></a></td>
        <td><a class="btn" href="/users_beers/boire.php?id=<?= $user_beer->id ?>">Boire</a></td>
        <td><a class="btn" href="/users_beers/show.php?id=<?= $user_beer->id ?>">Modifier</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</ul>
