<h1>Liste des activités.</h1>

<?php if (currentUser()->has_activity()) : ?>
  <h2>Inscrit à: <?= currentUser()->activity()->name ?> - <?= currentUser()->activity()->dinner ? "Avec souper" : "Sans souper" ?></h2>
<?php else : ?>
  <h2>Vous devez vous inscrire à une activité.</h2>
<?php endif ?>

<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Max</th>
      <th>Current</th>
      <th>Remaining</th>
      <?php if (!currentUser()->has_activity()) : ?>
        <th>Inscription</th>
      <?php endif ?>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($view['activities'] as $activity) : ?>
      <tr>
        <td><?= $activity->name ?></td>
        <td><?= $activity->max ?></td>
        <td><?= $activity->countUsers() ?></td>
        <td><?= $activity->remainingUsers() ?></td>
        <?php if (!currentUser()->has_activity()) : ?>
          <td>
            <a href="/activities/create.php?activity=<?= $activity->id ?>&dinner=1" class="btn">Avec souper</a>
            <a href="/activities/create.php?activity=<?= $activity->id ?>&dinner=0" class="btn">Sans souper</a>
          </td>
        <?php endif ?>
      </tr>
    <?php endforeach ?>
</table>
