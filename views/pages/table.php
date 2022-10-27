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

<table class="table mt-4">
  <thead>
  <tr>
    <th scope="col">id</th>
    <th scope="col">title</th>
    <th scope="col">about</th>
    <th scope="col">picture</th>
    <th scope="col">delete</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($_SESSION['articles'] as $article) {?>
  <tr>
    <th scope="row"><?= $article['id'] ?></th>
    <td><?= $article['title'] ?></td>
    <td><?= $article['about'] ?></td>
    <td><?= $article['id'] ?></td>
    
    <td>
      <form method="post" action="/auth/delete">
        <button class="btn btn-danger" type="submit">Удалить</button>
      </form>
    </td>
  </tr>
  <?php }?>
  </tbody>
</table>

</body>
</html>