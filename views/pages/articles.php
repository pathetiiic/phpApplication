<?php
  use App\Services\Page;
  
  
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
        <?php foreach ($_SESSION['articles'] as $article) {?>
  <div class="container border-1 p-2 d-block mt-4">
    <img src="<?= $article['articlePic'] ?>" class="img-fluid" alt="...">
    <h1><?= $article['title'] ?></h1>
    <p><?= $article['about'] ?></p>
  </div>
        <?php } ?>
    </div>
  
</body>
</html>