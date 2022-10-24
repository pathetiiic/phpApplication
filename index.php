<?php
  
  use App\Services\App; // подключение класса
  session_start(); // начало сессии
  
  require_once __DIR__ . "/vendor/autoload.php"; // composer
  
  App::start(); // подключение бд
  
  require_once __DIR__ . '/router/routes.php'; // все странички
  