<?php
  
  namespace App\Controllers;
  
  use App\Services\Router;

  class Auth
  {
    public function login($data): void
    {
      $email = $data['email'];
      $password = $data['password'];
      
      $user = \R::findOne('users', 'email = ?', [$email]);
      
      if (!$user) {
        die('Пользователь не найден');
      }
      
      if (password_verify($password, $user->password)) {
        session_start();
        $_SESSION['user'] = [
          'id' => $user->id,
          'fullName' => $user->fullName,
          'username' => $user->username,
          'group' => $user->group,
          'email' => $user->email,
          'avatar' => $user->avatar
        ];
        Router::redirect('/profile');
      } else {
        die('Неверный логин или пароль');
      }
    }
    
    public function register($data, $files): void
    {
      $email = $data['email'];
      $username = $data['username'];
      $fullName = $data['fullName'];
      $password = $data['password'];
      $passwordConfirm = $data['passwordConfirm'];
      
      if ($password !== $passwordConfirm) {
        Router::error('500');
        die();
      }
      
      $avatar = $files['avatar'];
      $fileName = time() . '_' . $avatar['name'];
      $path = "uploads/avatars/" . $fileName;
      
      if (move_uploaded_file($avatar['tmp_name'], $path)) {
        $user = \R::dispense('users');
        
        $user->email = $email;
        $user->username = $username;
        $user->fullName = $fullName;
        $user->group = 1;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->avatar = '/' . $path;
        \R::store($user);
        Router::redirect('/login');
      } else {
        Router::error('500');
        die();
      }
    }
    
    public function logout(): void
    {
      unset($_SESSION['user']);
      Router::redirect('/login');
    }
  }