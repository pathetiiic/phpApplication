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

<div class="container">
    <h2 class="mt-4">Добавить запись</h2>
    <form action="/editing/admin" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">Поробная информация</label>
            <textarea name="about" class="form-control" id="about" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="articlePic" class="form-label">Изображение</label>
            <input name="articlePic" type="file" class="form-control" id="avatar">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>