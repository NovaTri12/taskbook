<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
  <a class="navbar-brand" href="<?= BASEURL; ?>">TASK BOOK</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php
        if (!empty($_SESSION)) {
          echo '<a class="nav-link" href="'.BASEURL.'/Login/logout">Logout</a>';
        } else {
          echo '<a class="nav-link" href="'.BASEURL.'/Login/index">Login</a>';
        }
        ?>
      </li>
    </ul>
  </div>
  </div>
</nav>