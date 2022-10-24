<?php
  use App\Services\Page;
  
  if (!$_SESSION['user']) {
      \App\Services\Router::redirect('/login');
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

<div class="container" style="display: flex; justify-content: space-between">
  <div class="card mt-4" style="width: 18rem;">
    <img src="<?= $_SESSION['user']['avatar'] ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">hello, <?= $_SESSION['user']['username'] ?></h5>
    </div>
  </div>

</body>
</html>