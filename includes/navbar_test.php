<?php
    $text = [];
    if (isset($_SESSION['LANG_APP']) && $_SESSION['LANG_APP'] == 'ca') {
        include('../language/ca.php');
    }

    if (isset($_SESSION['LANG_APP']) && $_SESSION['LANG_APP'] == 'an') {
        include('../language/an.php');
    }

  $currentPage = basename($_SERVER['PHP_SELF']);
  echo $currentPage;

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?= $text['title_index'] ?? '' ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../views/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Registre</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Idioma
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../controllers/language_controller.php?lang=ca">Catala</a></li>
            <li><a class="dropdown-item" href="../controllers/language_controller.php?lang=an">Anglés</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>