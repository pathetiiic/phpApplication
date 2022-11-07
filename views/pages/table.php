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
  <?php foreach ($_SESSION['articles'] as $articles) {?>
  <tr>
    <th scope="row"><?= $articles['id'] ?></th>
    <td><?= $articles['title'] ?></td>
    <td><?= $articles['about'] ?></td>
    <td><?= $articles['id'] ?></td>
    
    <td>
      <form method="post" action="/editing/delete">
        <button class="btn btn-danger" type="submit">Удалить</button>
      </form>
    </td>
  </tr>
  <?php }?>
  </tbody>
</table>

</body>
</html>