<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">pathetic</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php
          if (!$_SESSION['user']) {
        ?>
        <a class="nav-link active" aria-current="page" href="/">Home</a>
        <a class="nav-link" href="/login">Login</a>
        <a class="nav-link" href="/register">Register</a>
        <?php
          } else { ?>
              <a class="nav-link" href="/profile">Profile</a>
              <?php if ($_SESSION['user'] && $_SESSION['user']['group'] == 2) {?>
              <a class="nav-link" href="/admin">Admin</a>
              <a class="nav-link" href="/table">Table</a> <?php } ?>
              <a class="nav-link" href="/articles">Articles</a>
              <form  action="/auth/logout" method="post">
                <button class="btn btn-danger" type="submit">Log out</button>
              </form>
          <?php } ?>
      </div>
    </div>
  </div>
</nav>