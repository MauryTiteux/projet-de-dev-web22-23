<h2>Les activités</h2>
<table class="table">

  <tbody>
    <?php foreach ($view['users_activity'] as $users_activity) : ?>
      <tr>
        <td><?= $users_activity->getBeer()->name ?></td>
        <td><?= $users_activity->comment ?></td>
        <td><?= $users_activity->consumed ?></td>
        <td><a class="btn btn-<?= $users_activity->is_favorite ?"error" : "success" ?>" href="/users_activity/favorite.php?id=<?= $users_activity->id ?>"><?= $users_activity->is_favorite ? "retirer des favoris" : "Ajouter au favori" ?></a></td>
        <td><a class="btn" href="/users_activity/boire.php?id=<?= $users_activity->id ?>">Boire</a></td>
        <td><a class="btn" href="/users_activity/show.php?id=<?= $users_activity->id ?>">Modifier</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</ul>
