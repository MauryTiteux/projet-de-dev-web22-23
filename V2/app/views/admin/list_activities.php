<h1>Liste des activités.</h1>

<?php foreach ($view['datas'] as $activity) : ?>
  <h3><?= $activity['name'] ?></h3>
  <table class="table" style="margin-bottom: 3.5rem">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Dinner</th>
        <th>Supprimer</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($activity['users'] as $user) : ?>
        <tr>
          <td><?= $user->lastname ?></td>
          <td><?= $user->firstname ?></td>
          <td><?= $user->activity()->dinner ? "Oui" : "Non" ?></td>
          <td><a href="/admin/remove_user.php?id=<?= $user->id ?>" class="btn btn-error">Supprimer</a></td>
        </tr>
      <?php endforeach ?>
  </table>
<?php endforeach ?>
