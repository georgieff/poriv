<?php

class Project extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'project'
      ));

  }

  public function index($news = null) {

    if($news === 'null')
    {
      echo 'asd';
    }
    $pageTitle = array(
      'bg' => 'ПОРИВ - Проект',
      'en' => 'PORIV - Project');

    $title = array(
      'bg' => 'За Проекта',
      'en' => 'The Project');

    $subTitle  = array(
      'bg' => 'Проектът се осъществява с финансовата подкрепа на Оперативна програма „Развитие на човешките ресурси”, съфинансирана от Европейския социален фонд на Европейския съюз',
      'en' => 'The project is implemented through the financial support of Human Resources co-financed by the European Social Fund of the European Union Development Operational Programme Investing In Your Future!');

    $content  = array(
      'bg' => '<h5>Водеща организация</h5>
      <p>Фондация „Гражданска инициатива за местно развитие” – гр. Кюстендил</p>

      <h5>Партньори</h5>
      <p>Фондация „Образование за демокрация”- Полша; Сдружение ЛАРГО - гр. Кюстендил и НЧ „Братство1869” - гр. Кюстендил.
      </p>
      <h5>Общите цели на проекта са: </h5>
      <p>Да стимулира процесите на превенция на дискриминацията и осигуряване на равен достъп на всички до ресурсите на обществото чрез проучване и въвеждане на добри европейски практики и изграждане на партньорства между неправителствени организации от Полша и България
      Да повиши чувствителността на обществото към проявите на дискриминация и да предложи механизми и модели за превенция на дискриминацията.
      </p>
      <h5>Специфичната цел на проекта</h5>
      <p>Проучване и въвеждане на метода "Развитие на културни маршрути" за изграждане на устойчиви местни партньортва чрез включване на хора от различни социални среди, с фокус върху уязвимите групи и етническите малцинства.
      </p>
      <h5>Целава група на проекта</h5>
      Представители на неправителствените организации от община Кюстендил.
      </p>
      <h5>Основни дейности по проекта са:</h5>
      <ul>
      <li>Посещение на група от 11 представители на организациите партньори по проекта в Полша за проучване опита на Фондация „Образование за демокрация” (ФОД) – м. Март 2014 г.
      </li><li>Популяризиране на идентифицираните добри практики чрез издаване на брошура, описваща културни маршрути и провеждане на кръгла маса, на която представителите на ФОД ще представят техния опит и програми за развитие на гражданското общество и примери за културни маршрути – м. Април и м. Май 2014 г.
      </li><li>Разработване на анализ на състоянието на третия сектор в област Кюстендил – от Януари до Март 2014 г.
      </li><li>Работна среща на представители на НПО за обсъждане на разработения анализ на състоянието на третия сектор в област Кюстендил – Март 2014 г.
      </li><li>Обучение по права на човека и обучение за внедряване на метода „Развитие на културни маршрути” – лектори ще са експерти от Полша, а участници ще са предствители на НПО от община Кюстендил – м. Април и м. Май 2014 г.
      </li><li>Разработване на програма и план за адаптиране на метода „Развитие на културни маршрути” - от м. Юни до м. Август 2014 г.
      </li><li>Разработване и реализиране на културен маршрут - от м. Септември до Ноември2014 г.
      </li><li>Заключителна конференция за представяне на резултатите от проекта –Ноември 2014 г.
      </li>
      </ul>
      ',
      'en' => '
      <h5>Leading organizacion:</h5><p>
      Civil Initiative for Local Development Foundation
      <h5>Partners:</h5><p>
      Education for Democracy Foundation - Poland
      LARGO association - Bulgaria
      Bratstvo 1869 Community Centre - Bulgaria
      </p><h5>General objectives of the Project:</h5><p>
      1. To encourage the process of preventing discrimination and ensuring equal
      access for all to the resources of society through research and implementation of
      best European practices and building partnerships between NGOs from Poland and
      Bulgaria.
      2. To increase public awareness of discrimination and to propose mechanisms and
      models for the prevention of discrimination.
      </p><h5>Specific objective:</h5><p>
      Research and introduction of the method of Development of Cultural Routes to
      build sustainable local partnerships by inclusion of people from different social
      backgrounds, with a focus on vulnerable groups and ethnic minorities.
      </p><h5>Target group: </h5><p>
      An NGO in Kyustendil Municipality
      </p><h5>Key Project Activities:</h5><ul>
      <li>Visit of a group of 11 representatives of the partner organizations in the project in
      Poland for the purpose of exploring the experience of the Education for Democracy
      Foundation (known as FED): March 2014;
      </li><li>Promotion of the good practices identified through the issuance of a brochure
      describing cultural routes and roundtable discussions where FED representatives will
      present their experiences and programs for the development of civil society, as well
      as examples of cultural routes: April and May 2014;
      </li><li>Development of an analysis of the third sector in Kyustendil Municipality: January
      through March 2014;
      </li><li>Workshop of NGO representatives to discuss the developed analysis of the third
      sector: March 2014;
      </li><li>Carry out Human Rights training and training on how to implement the method of
      Development of Cultural Routes: Polish experts will be the trainers, and NGO
      representatives from Kyustendil Municipality will be attendees: April and May 2014;
      </li><li>Development of a programme and a schedule for adaptation of the method of
      Development of Cultural Routes: June through August 2014;
      </li><li>Development and implementation of a cultural route: From September till November 2014;
      </li><li>Final conference to present the project results: November 2014; </li></ul>
      <p>The PORIV Project (Support for Equal Opportunities) is scheduled to last 16 months and
      will be completed in November 2014.</p>
      <p>The total value of the Project is BGN 105,711.16</p>

      ');

$this->viewData['pageTitle'] = $pageTitle;
$this->viewData['content'] = $content;
$this->viewData['title'] = $title;
$this->viewData['subTitle'] = $subTitle;
$this->view->show('main', $this->viewData);

}

}
