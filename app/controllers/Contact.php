<?php

class Contact extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'contact'
      ));

  }

  public function index($news = null) {

    $pageTitle = array(
      'bg' => 'ПОРИВ - Контакти',
      'en' => 'PORIV - Contact');

    $title = array(
      'bg' => 'Контакти',
      'en' => 'Contact');

    $temptext  = array(
      'bg' => 'Водещи организацията',
      'en' => 'Leading organization:');

    $content = array(
      'bg' => '
      <h5>Гражданска инициатива за местно развитие</h5>

      Тинтява 12<br>

      Кюстендил 2500<br>

      България<br>

      E-mail: gimr2011@abv.bg<br>

      www.gimrf.ngobg.info<br><br><br><br>

      <h4> Партньори</h4>

      <h5 class="mmb1">Образование за демокрация</h5>

      9/11 Nowolipie str.<br>

      00-1500 Варшава<br>

      Полша<br>

      E-mail: biurno@edudemo.org.pl<br>

      www.edudemo.org.pl<br>
      <br>
      <h5 class="mmb1">LARGO</h5>

      Буревесник 4<br>

      Кюстендил 2500<br>

      България<br>

      E-mail: largo_2007@abv.bg<br>

      www.largo-kn.com<br>
      <br>
      <h5 class="mmb1">Читалище "Братство 1869"</h5>

      Отец Паисий 11<br>

      Кюстендил 2500<br>

      България<br>

      E-mail: chitalishte@bratstvokn.org<br>

      www.bratstvo.org',



      'en' => '
      <h5>Civil Initiative for Local Development Foundation</h5>

      12 Tintyava Str.<br>

      Kyustendil 2500<br>

      Bulgaria<br>

      E-mail: gimr2011@abv.bg<br>

      www.gimrf.ngobg.info<br><br><br>

      <h4> Partners</h4>

      <h5 class="mmb1">Education for Democracy Foundation</h5>

      9/11 Nowolipie str.<br>

      00-1500 Warsaw<br>

      Poland<br>

      E-mail: biurno@edudemo.org.pl<br>

      www.edudemo.org.pl<br>
      <br>
      <h5 class="mmb1">LARGO association</h5>

      4 Burevestnik Str.<br>

      Kyustendil 2500<br>

      Bulgaria<br>

      E-mail: largo_2007@abv.bg<br>

      www.largo-kn.com<br>
      <br>
      <h5 class="mmb1">Bratstvo 1869 Community Centre</h5>

      11 Otets Paicii Str.<br>

      Kyustendil 2500<br>

      Bulgaria<br>

      E-mail: chitalishte@bratstvokn.org<br>

      www.bratstvo.org');

$contacts = array(
  array(
    'name' => array(
      'en' => 'Civil Initiative for Local Development Foundation',
      'bg' => 'Фондация Гражданска инициатива за местно развитие'
      ),
    'address' => array(
      'en' => 'Kyustendil, 12 Tintyava Str. Bulgaria',
      'bg' => 'гр Кюстендил, ул. Тинтява № 12 <br>България'
      ),
    'phone' => '+359 0893 522 519',
    'email' => 'gimr211@abv.bg',
    'type' => array(
      'en' => 'Leading organization',
      'bg' => 'Водеща организация'
      )
    ),
  array(
    'name' => array(
      'en' => 'Education for Democracy Foundation',
      'bg' => 'Фондация Образование за демокрация'
      ),
    'address' => array(
      'en' => 'Warsaw, 9/11 Nowolipie str. Poland',
      'bg' => 'гр Варшава, ул. Новолипие № 9/11 Полша'
      ),
    'phone' => '0893 522 519',
    'email' => 'biuro@edudemo.org.pl',
    'website' => 'www.edudemo.org.pl',
    'type' => array(
      'en' => 'Partner',
      'bg' => 'Партньор'
      )
    ),
  array(
    'name' => array(
      'en' => 'LARGO association',
      'bg' => 'Сдружение ЛАРГО'
      ),
    'address' => array(
      'en' => 'Kyustendil, 4 Burevestnik Str. Bulgaria',
      'bg' => 'гр Кюстендил, ул. Буревестник № 4 България'
      ),
    'phone' => '+359 78 55 06 68',
    'email' => 'largo_2007@abv.bg',
    'website' => 'www.largo-kn.com',
    'type' => array(
      'en' => 'Partner',
      'bg' => 'Партньор'
      )
    ),
  array(
    'name' => array(
      'en' => 'Bratstvo 1869 Community Centre',
      'bg' => 'Народно читалище "Братство 1869"'
      ),
    'address' => array(
      'en' => 'Kyustendil, 11 Otets Paicii Str. Bulgaria',
      'bg' => 'гр Kюстендил, ул. Отец Паисий №11 България'
      ),
    'phone' => '+359 78 52 63 95',
    'email' => 'bratstvo_kn@abv.bg',
    'website' => 'www.bratstvokn.org',
    'type' => array(
      'en' => 'Partner',
      'bg' => 'Партньор'
      )
    )
  );

$addressName = array(
      'en' => 'Address',
      'bg' => 'Адрес'
      );

$websiteName = array(
      'en' => 'Website',
      'bg' => 'Сайт'
      );

$this->viewData['addressName'] = $addressName;
$this->viewData['websiteName'] = $websiteName;
$this->viewData['pageTitle'] = $pageTitle;
$this->viewData['temptext'] = $temptext;
$this->viewData['title'] = $title;
$this->viewData['content'] = $content;
$this->viewData['contacts'] = $contacts;
$this->view->show('main', $this->viewData);

}

}
