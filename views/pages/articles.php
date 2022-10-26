<?php
  use App\Services\Page;
  
  if ($_SESSION['user'] && $_SESSION['user']['group'] != 2) {
    \App\Services\Router::redirect('/profile');
  }
?>
  
  <!doctype html>
  <html lang="en">
<?php
  Page::part('head');
?>
  <body>

<?php
  Page::part('navbar');
?>
    <div class="d-flex flex-wrap">
  <div class="container border-1 p-2 d-block mt-4">
    <img src="<?= $_SESSION['articles']['articlePic'] ?>" class="img-fluid" alt="...">
    <h1><?= $_SESSION['articles']['title'] ?></h1>
    <p><?= $_SESSION['articles']['about'] ?></p>
    <p><?= var_dump($_SESSION['articles']) ?></p>
  </div>
    </div>
</body>
</html>