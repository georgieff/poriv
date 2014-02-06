<?php

class Partners extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'partners'
      ));

  }

  public function index($news = null) {

    if($news === 'null')
    {
      echo 'asd';
    }
    $pageTitle = array(
      'bg' => 'ПОРИВ - Партньори',
      'en' => 'PORIV - Partners');

    $title = array(
      'bg' => 'Партньори',
      'en' => 'Partners');


    $content  = array(
      'bg' => '<h5>Образование за демокрация</h5>
<p>Образование за демокрация Foundation ( известен като FED ) е независима организация с нестопанска цел, създадена през 1989 г. по инициатива на активисти на полската опозиция и възпитателите от Американската федерация на учителите.</p>
<p>Нашата цел е да инициира, подкрепя и провеждане на образователна дейност , насочена към посадъчен идеята за демокрация и подготовка на хората да работят в полза на демокрацията и за участие в демократичните институции. Ние подкрепяме местните общности в дейностите си , насочени към изграждането на гражданското общество и ние насърчава високи етични и професионални стандарти в гражданския сектор.</p>
<p>Ние изграждаме нашите програми, основани на местните традиции и култура, в сътрудничество с хора от различни националности, изповеди и политически възгледи . Ние работим както в Полша и в чужбина: в Източна Европа, Централна Азия и Кавказ , в партньорство с местните организации.</p>
<p>В нашата дейност ние се придържат към принципите, които считат от решаващо значение , като например : действително партньорство , устойчивост на резултатите , диверсификация на средства , както и използването на съвременни информационни технологии.</p>
<p>Образование за демокрация Foundation получи престижната награда за демокрация и гражданско общество от Европейския съюз и Съединените американски щати през 1998 година.</p>

<h5>Читалище „Братство 1869”</h5>

<p>Читалище „Братство 1869” е най-старата културна и образователна институция в Кюстендилски регион, създадена през 1869 г. Организира ежегодно няколко национални и международни конкурси – Международен конкурс за класическа китара „Акад. Марин Големинов“, Международен фолклорен конкурс  „Пауталия”, Национален фестивал на старата градска песен „Пей сърце“, Национален танцов фестивал „Танцова феерия под Хисарлъка”, Международна камерна музикална академия, Национален конкурс за поезия „Биньо Иванов“ и Международен клавирен фестивал-конкурс „Велики учители”.</p>
<p>Много от дейностите и мероприятията, извършвани в читалището, са насочени към подкрепа на уязвими групи на национално и трансгранично ниво, както и популяризиране на културата и изкуствата на други страни, възпитаване на уважение към различието и подкрепа на социалното единство в мултикултурна среда.</p>
<p>Читалището е реализирало множество проекти, финансирани от различни европейски и национални програми. От 2006 г. то е част от Европейската информационна мрежа Евродеск, а от 2009 – е част и от Европейската информационна мрежа Europe Direct. От 2012 г. в читалището функционира Младежки информационно-консултантски център, финансиран по Националната програма за младежта. През  2011 г. читалището получи акредитация за посрещаща и изпращаща доброволци организация по Програма „Младежта в действие” на Европейската комисия. </p>
<p>Читалището реализира успешно проекти и по програмата за Трансгранично сътрудничество България – Сърбия и България – Македония.</p>


<h5>LARGO</h5>

<p>„LARGO" е сдружение с нестопанска цел, регистрирано по българското законодателство, чиято цел е да подпомага социалното включване на уязвими групи от ромската общност. Организацията се стреми да работи за преодоляването на проблеми в областта на социалната, здравната и образователната изолация на ромските деца, младежи, жени и възрастни в неравностойно положение. </p>
<p>Ларго е водеща и представителна организация за ромската общност в област Кюстендил. Организацията вече е изпълнила редица инициативи за подобряване на живота на ромите. Ларго разработва и реализира проекти и програми в подкрепа на посочените по-горе целеви групи чрез използване на застъпничество и лобиране за здравеопазване, образование и важни въпроси, свързани със социалнато включване на ромите. </p>
<p>Дългосрочните цели на LARGO са за подпомагане на социалната адаптация на ромската общност като се повиши нивото на включването му във всички области на обществото - здравеопазване, образование, икономика, социални грижи, както и защитата на човешките и гражданските права.</p>

      ',
      'en' => '
      <h5>Education for Democracy Foundation</h5>
<p>
The Education for Democracy Foundation (known as FED) is an independent, non-profit

organization established in 1989 on the initiative of activists of the Polish opposition and

educators from the American Federation of Teachers.</p>
<p>
Our objective is to initiate, support and conduct educational activity aimed at propagating

the idea of democracy and preparing people to work for the benefit of democracy and to

participate in democratic institutions. We support local communities in their activities aimed

at civil society building and we promote high ethical and professional standards in the civic

sector.</p>
<p>
We build our programs based on local tradition and culture, in cooperation with people

of different nationalities, confessions and political opinions. We work both in Poland

and abroad: in Eastern Europe, Central Asia and the Caucasus, in partnership with local

organizations.</p>
<p>
In our activities we abide by principles we deem crucial, such as: actual partnership,

sustainability of results, diversification of means, and use of modern information

technologies.</p>
<p>
The Education for Democracy Foundation received the prestigious Democracy and Civic

Society Award from the European Union and the United States in 1998.</p>

<h5>LARGO ASSOCIATION</h5>
<p>
 LARGO is a non-profit association, registered in accordance with the Bulgarian

laws, which major aim is to support the social integration of vulnerable groups of

the Roma community. The organization strives to overcome the problems of the

existing social, health and educational isolation of Roma children, youngsters, socially

disadvantaged women and adult.</p>
<p>
 Largo is the leading and representative organization of Roma community in

Kyustendil. The organization has already carried out some initiates for improvement of

Roma’s life. Largo drafts and implements projects and programmes concentrated on

the above- mentioned target groups by means of taking advantage of advocacy and

lobbying for health care, education and crucial issues related with social integration of

Roma. </p>
<p>
 Тhe long term aims of Largo are supporting the social integration of Roma

community by enhancing the level of its inclusion in all public spheres – health care,

education, economics, social care as well as protection of basic human and civil rights.</p>

<h5>Bratstvo 1869 Community Centre</h5>
<p>
Bratstvo 1869 Community Centre is the oldest cultural and educational institution in the

Southwest of Bulgaria, created on July 1st 1869.</p>
<p>
Bratstvo 1869 Community Centre annually organizes the Academician Marin Goleminov

International Classic Guitar Competition, Pautalia International Folklore Festival,

International Chamber Music Academy, Binyo Ivanov National Poetry Competition, Sing

Heart National Old Town Song Festival, National Dance Festival Dancing fairy under

Hisarlaka and Great Teacher International Piano Festival-Competition. </p>
<p>
A lot of the activities and events carried out in the Community Centre are oriented

towards supporting vulnerable groups on national and cross-border level as well as promoting

other countries’ culture and arts, cultivating respect for diversity and supporting social

cohesion in multicultural environment.</p>
<p>
The Community Centre implements a lot of projects funded by different institutions.

It has been a Regional Eurodesk point since 2006 and since 2009 has been a part of the

European Network Europe Direct.</p>
<p>
Since 2012 in the Bratstvo 1869 Community Centre function a Youth Information and

Counseling Center, funded by the National Program for youth. In 2011 the Community Centre

received accreditation for meeting and seeing volunteer organization under the Youth in

Action Programme of the European Commission.</p>
<p>
The Bratstvo 1869 Community Centre successfully implemented a projects under the

CBC programme Bulgaria - Serbia and Bulgaria - Macedonia.</p>

      ');

$this->viewData['pageTitle'] = $pageTitle;
$this->viewData['content'] = $content;
$this->viewData['title'] = $title;
$this->view->show('main', $this->viewData);

}

}
