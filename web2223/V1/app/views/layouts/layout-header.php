<header class="navbar">
  <section class="navbar-section">
    <a href="..." class="navbar-brand mr-2">Journée du personnel</a>
  </section>
  <section class="navbar-section">
  </section>
</header>
<ul>
  <li><a href="/">Accueil</a></li>
  <?php if (!currentUser()) : ?>
    <li><a href="/sessions/new.php">Se connecter</a></li>
    <li><a href="/users/new.php">S'inscire</a></li>
  <?php else : ?>
    <li>Connecté en tant que <?= currentUser()->login ?></li>
    <li><a href="/users_beers/index.php">Gérer ma liste</a></li>
    <?php if (currentUserIsAdmin()) : ?>
      <li><a href="/admin/beers/index.php">Gérer les bières</a></li>
      <li><a href="/admin/styles/index.php">Gérer les styles</a></li>
      <li><a href="/admin/beers_formats/index.php">Gérer les associations</a></li>
    <?php endif ?>
    <li><a href="/sessions/destroy.php">Deconnecter</a></li>
  <?php endif ?>
</ul>
