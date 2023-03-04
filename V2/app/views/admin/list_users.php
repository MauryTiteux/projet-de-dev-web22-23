<h1>Liste des utlisateurs.</h1>

<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Activité</th>
      <th>Postal Code</th>
      <th>Department</th>
      <th>Dinner</th>
      <th>Modifier</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($view['users'] as $user) : ?>
      <tr>
        <td><?= $user->lastname ?></td>
        <td><?= $user->firstname ?></td>
        <td><?= $user->activity()->name ?></td>
        <td><?= $user->postal_code()->code ?> - <?= $user->postal_code()->name ?></td>
        <td><?= $user->department()->name ?></td>
        <td><?= $user->activity()->dinner ? "Oui" : "Non" ?></td>
        <td><a href="/admin/show_user.php?id=<?= $user->id ?>" class="btn btn-primary">Modifier</a></td>
      </tr>
    <?php endforeach ?>
</table>
