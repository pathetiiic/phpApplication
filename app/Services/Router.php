<?php
  
  namespace App\Services;
  use App\Controllers\Auth;

  class Router
  {
    private static $list = []; #список всех урлов на сайте
  
    /**
     * Метод регистрирует роут для обычной страницы
     * @param string $uri
     * @param string $page_name
     * @return void
     */
    
    public static function page(string $uri, string $page_name): void
    {
      self::$list[] = [
        "uri" => $uri,
        "page" => $page_name
      ]; #пополняем список урлов на сайте
    }
  
    /**
     * проводит регистрацию пользователя
     *
     * @param string $uri
     * @param $class
     * @param $method
     * @param $formdata
     * @param $files
     * @return void
     */
  
    public static function post(string $uri, $class, $method, $formdata = false, $files = false): void
    {
      self::$list[] = [
        "uri" => $uri,
        "class" => $class,
        'method' => $method,
        'post' => true,
        'formdata' => $formdata,
        'files' => $files
      ];
    }
  
    /**
     * @return void
     */
    
    public static function enable(): void
    {
      $query = $_GET['q']; #uri в котором мы находимся
      
      foreach (self::$list as $route) #перебераем страницы
      {
        if ($route["uri"] === '/' . $query) {
          if ($route['post'] === true && $_SERVER['REQUEST_METHOD']) {
            $action = new $route['class'];
            $method = $route['method'];
            if ($route['formdata'] && $route['files']) {
              $action->$method($_POST, $_FILES);
            } elseif ($route['formdata'] && !$route['files']) {
              $action->$method($_POST);
            } else {
              $action->$method();
            }
          } else {
            require_once 'views/pages/' . $route['page'] . '.php'; #выводим его
            die();
          }
        }
      }
      self::error('404'); #если страница не найдена пишет 'Page not found'
    }
  
    /**
     * Метод выводит ошибку 404
     * @param string $error
     * @return void
     */
    
    public static function error(string $error): void
    {
      require_once 'views/errors/' . $error .'.php'; //сообщение об ошибке
    }
    
    public static function redirect(string $uri): void
    {
      header('Location: ' . $uri);
    }
  }