<?php

class Gallery extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'news'
      ));

  }

  public function index($news = null) {

    $pageTitle = array(
      'bg' => 'ПОРИВ - Галерия',
      'en' => 'PORIV - Gallery');

    $title = array(
      'bg' => 'Галерия',
      'en' => 'Gallery');

    $temptext  = array(
      'bg' => 'Очаквайте скоро',
      'en' => 'Coming soon');

    $this->viewData['pageTitle'] = $pageTitle;
    $this->viewData['temptext'] = $temptext;
    $this->viewData['title'] = $title;
    $this->view->show('main', $this->viewData);

  }

}
