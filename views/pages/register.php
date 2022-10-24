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

    <div class="container">
        <h2 class="mt-4">Sign Up</h2>
        <form action="/auth/register" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input name="username" type="text" class="form-control" id="username">
            </div>
            <div class="mb-3">
              <label for="full name" class="form-label">Full name</label>
              <input name="fullName" type="text" class="form-control" id="fullName">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">User avatar</label>
                <input name="avatar" type="file" class="form-control" id="avatar">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="passwordConfirm" class="form-label">Password confirmation</label>
                <input name="passwordConfirm" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>