<?php
  use App\Services\Page;
  
//  if (!$_SESSION['user']) {
////    \App\Services\Router::redirect('/profile');
//  }
//?>

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
        <h2 class="mt-4">Sign in</h2>
        <form class="mt-4" method="post" action="/auth/login">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>