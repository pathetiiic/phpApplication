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
					<div class="card m-2" style="width: 18rem;">
						<img src="<?= $article['articlePic'] ?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title"><?= $article['title'] ?></h5>
							<p class="card-text"><?= $article['about'] ?></p>
							<form action="/editing/addToFavorite" method="post">
								<button class="btn btn-primary">Добавить в избранное</button>
							</form>
						</div>
					</div>
        <?php } ?>
    </div>
  
</body>
</html>