<?php

class Method extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'news'
      ));

  }

  public function index($news = null) {

    $pageTitle = array(
      'bg' => 'ПОРИВ - Метод',
      'en' => 'PORIV - Method');

    $title = array(
      'bg' => 'Метод',
      'en' => 'Method');

    $temptext  = array(
      'bg' => 'Очаквайте скоро',
      'en' => 'Coming soon');

    $this->viewData['pageTitle'] = $pageTitle;
    $this->viewData['temptext'] = $temptext;
    $this->viewData['title'] = $title;
    $this->view->show('main', $this->viewData);

  }

}
