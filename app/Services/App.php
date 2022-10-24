<?php
  
  namespace App\Services;
  
  class App
  {
    public static function start(): void
    {
      self::libs();
      self::db();
    }
    
    public static function libs(): void
    {
      $config = require_once 'config/app.php';
      foreach ($config["libs"] as $lib)
      {
        require_once "lib/" . $lib . ".php";
      }
    }
    
    public static function db(): void
    {
      $config = require_once 'config/db.php';
      
      if ($config['enable'])
      {
        \R::setup( 'mysql:host=' . $config['host'] . ';port='. $config['port'] . ';dbname='. $config['db'],
          $config['username'], $config['password']);
        
        if (!\R::testConnection()) {
          die('Error database connect');
        }
      }
    }
    
  }