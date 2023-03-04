<ul class="menu">
<li class="divider" data-content="Pages"></li>
  <li><a href="/">Accueil</a></li>
  <li class="divider" data-content="Account"></li>
  <?php if (!currentUser()) : ?>
    <li><a href="/sessions/new.php">Se connecter</a></li>
    <li><a href="/users/new.php">S'inscrire</a></li>
  <?php else : ?>
    <li><a href="/activities/index.php">Gérer mon acitivité</a></li>
    <li><a href="/sessions/destroy.php">Deconnecter</a></li>
  <?php endif ?>
  <?php if (isAdmin()) : ?>
    <li class="divider" data-content="Administration"></li>
    <li><a href="/admin/list_users.php">Liste des utilisateurs</a></li>
    <li><a href="/admin/list_activities.php">Liste des activités</a></li>
  <?php endif ?>
</ul>
