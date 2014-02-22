<?php

class Method extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'partners'
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

    $content = array(
      'bg' => '
      <p>Културните маршрути са механизъм за междусекторно свързване на представители от различни области, които са съпричастни към развитието и популяризирането на културното наследство. Те са резултат от съвместната работа на неправителствените организации, публична администрация, специалисти, граждани, представители на уязвими групи. Културните маршрути са успешен метод застимулиране на социалната активност и местно развитие.</p>
      <p>Фондация „Образование за демокрация” има богат опит в развитието на културни маршрути в района на Вроцлав, Полша. Тя ще сподели своя опит и ще обучи българските си партньори,  успешно да  приложат метода в рамките на техните местни условия и да разработят един културен маршрут.</p>
      ',
      'en' => '
      <p>The Cultural Routes are cross-sectoral mechanism connecting representatives from various fields who are committed to the development and promotion of cultural heritage. They are the result of joint work of non-governmental organizations, public administration, professionals, citizens, representatives of vulnerable groups. The Cultural Routes are successful method of promoting social activities and local development.</p>
      <p>Education for Democracy Foundation is a highly experienced foundation in development of cultural routes in the area of Wrocław, Poland, and it will share its experience and train its Bulgarian partners in order to enable them to successfully apply the method within their local conditions and develop one cultural route.</p>
      ');

    $this->viewData['pageTitle'] = $pageTitle;
    $this->viewData['temptext'] = $temptext;
    $this->viewData['title'] = $title;
    $this->viewData['content'] = $content;
    $this->view->show('main', $this->viewData);

  }

}
