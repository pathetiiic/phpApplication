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
<main class="d-flex">
	<div class="container h-50 m-4 d-block" style="display: flex; justify-content: space-between">
		<div class="card mt-4" style="width: 18rem;">
			<img src="<?= $_SESSION['user']['avatar'] ?>" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">hello, <?= $_SESSION['user']['username'] ?></h5>
			</div>
		</div>
	</div>
	
	
	<div class="d-flex flex-wrap">
		<h1 class="d-block w-100 mt-5 mb-5">Избранное</h1>
		<?php foreach ($_SESSION['favorite'] as $favorite) {?>
			<div class="card m-2" style="width: 18rem;">
				<img src="<?= $favorite['articlePic'] ?>" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?= $favorite['title'] ?></h5>
					<p class="card-text"><?= $favorite['about'] ?></p>
					<form action="#" method="post">
						<button href="#" class="btn btn-primary">Удалить из избранного</button>
					</form>
				</div>
			</div>
		<?php } ?>
	</div>
</main>
</body>
</html>