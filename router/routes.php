<?php

  use App\Services\Router;
  use App\Controllers\Auth;
  use App\Controllers\Editing;
  
  Router::page('/', 'home');
  Router::page('/login', 'login');
  Router::page('/register', 'register');
  Router::page('/profile', 'profile');
  Router::page('/admin', 'admin');
  Router::page('/articles', 'articles');
  Router::page('/table', 'table');
  
  Router::post('/auth/register', Auth::class, 'register', true, true);
  Router::post('/editing/admin', Editing::class, 'admin', true, true);
  Router::post('/auth/login', Auth::class, 'login', true);
  Router::post('/editing/delete', Editing::class, 'delete');
  Router::post('/editing/addToFavorite', Editing::class, 'addToFavorite');
  Router::post('/auth/logout', Auth::class, 'logout');
  
  Router::enable();