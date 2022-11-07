<?php
  
  namespace App\Controllers;
  use App\Services\Router;
  
  class Editing
  {
    public function admin(array $data, array $files): void
    {
      $title = $data['title'];
      $about = $data['about'];
      $articlePic = $files['articlePic'];
    
      $fileName = time() . '_' . $articlePic['name'];
      $path = 'uploads/articles/' . $fileName;
    
      if (move_uploaded_file($articlePic['tmp_name'], $path)) {
        $article = \R::dispense('articles');
      
        $article->title = $title;
        $article->about = $about;
        $article->articlePic = '/' . $path;
      
        \R::store($article);
      } else {
        Router::error('500');
        die();
      }
    
      $articles = \R::findAll('articles', 'ORDER BY id');
    
      foreach ($articles as $item){
        $_SESSION['articles'][] = [
          'id' => $item->id,
          'title' => $item->title,
          'about' => $item->about,
          'articlePic' => $item->articlePic
        ];
      }
      Router::redirect('/articles');
    }
  
    public function delete(): void
    {
      $del = \R::findOne('articles', $_SESSION['articles']['id']);
      \R::trash($del);
      unset($_SESSION['articles']);
      Router::redirect('/articles');
    }
  
    public function addToFavorite():void
    {
      $adds = \R::findAll('articles', 'ORDER BY id');
      foreach ($adds as $add) {
        $_SESSION['favorite'] = [
          'id' => $add->id,
          'title' => $add->title,
          'about' => $add->about,
          'articlePic' => $add->article_pic
        ];
      }
      
      Router::redirect('/profile');
    }
  }