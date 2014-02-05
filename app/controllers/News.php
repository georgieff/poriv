<?php

class News extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'news'
      ));

  }

  public function index($news = null) {

    if($news === 'null')
    {
      echo 'asd';
    }
    $pageTitle = array(
      'bg' => 'ПОРИВ - Новини',
      'en' => 'PORIV - News');

    $title = array(
      'bg' => 'Новини',
      'en' => 'News');

    $temptext  = array(
      'bg' => 'Очаквайте скоро',
      'en' => 'Coming soon');

    $this->viewData['pageTitle'] = $pageTitle;
    $this->viewData['temptext'] = $temptext;
    $this->viewData['title'] = $title;
    $this->view->show('main', $this->viewData);

  }

}
