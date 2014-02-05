<?php

class Home extends BD_Controllers {

  public function __construct() {
    parent::__construct();

    $this->viewData = array_merge($this->viewData, array(
      'page' => 'posts',
      'title' => 'ПОРИВ'
      ));

  }

  public function index() {

        /*
          if (!preg_match("/[^A-Za-z 0-9~%.:_\-\/]/", "/asd/mgb/dogs/&*")) {
          echo "A match was found.";
          } else {
          echo "A match was not found.";
        } */
        /*
          $this->view->addData(array('ops' => 'Pesho'));
          $this->view->show(array('let', 'main'), array('var' => 'WIN'));
         */
        /*
          echo '<br>';
          $this->car->drive();
         */
//$asd = $this->view->get(array('let', 'main'), array('var' => 'WIN'));
//$this->banan->sayBanan();
//$this->car->drive();
//$this->negro->vikai();
        /*
          $this->ceko->leko();
          $this->ceko->leko();
          $this->ceko->leko();
          $this->ceko->leko();
         */
        //echo '<pre>';
        //$this->load->library('db');
//$this->db->where('COUNTRY_NAME', 'argentina');
//$this->db->orWhere('COUNTRY_NAME', 'Switzerland');
        //$this->db->connect();
        //$this->db->setTable('users');
        //$this->db->where('id', 13);
        //echo $this->db->delete('users');
        //var_dump($this->db->getError());
        //$this->db->insert('users', array('username' => 'stamat', 'password' => 'strelko'));
        //$this->db->exec('asd');
        //$win = $this->db->exec("INSERT INTO `test`.`countries` (`COUNTRY_ID` ,`COUNTRY_NAME` ,`REGION_ID`) VALUES ('12', 'CIGANIQ', '2');");
        //$win = $this->db->exec('SELECT * FROM `countries`');
//$this->db->select('COUNTRY_ID, COUNTRY_NAME');
//$this->db->order('COUNTRY_ID', true);
//$this->db->limit(2);
//$res = $this->db->get('countries');
          $headerHeading = array(
            'bg' => 'Развитие на културни<br>маршрути',
            'en' => 'Development of cultural<br> routes'
            );

          $headerText = array(
            'bg' => 'Метод за стимулиране на<br> социалната активност и местното<br> развитие',
            'en' => 'A method for stimulating<br> social activities and local<br> development'
            );

          $underHeader = array(
            'bg' => 'Проучване и прилагане опита на Фондация "Образование за демокрация" за разработване на културни маршрути в област Кюстендил',
            'en' => 'Exploration and implementation of the experience of the "Education for Democracy" foundation for the development of cultural routes in Kyustendil'
            );

          $seemore = array(
            'bg' => 'Научи повече',
            'en' => 'Learn more'
            );

          $seeAll = array(
            'bg' => 'Виж всички',
            'en' => 'See all'
            );

          $latestNews = array(
            'bg' => 'Последни новини',
            'en' => 'Latest<br> news'
            );

          $this->viewData['seemore'] = $seemore;
          $this->viewData['headerHeading'] = $headerHeading;
          $this->viewData['headerText'] = $headerText;
          $this->viewData['underHeader'] = $underHeader;
          $this->viewData['seeAll'] = $seeAll;
          $this->viewData['latestNews'] = $latestNews;

          $this->viewData['page'] = 'home';
          $this->view->show('main', $this->viewData);

        }

        public function inenglish() {
          $this->session->set('langs', 'en');
          header( 'Location: ' . baseURL()) ;
          exit;
        }

        public function inbulgarian() {
          $this->session->set('langs', 'bg');
          header( 'Location: ' . baseURL()) ;
          exit;
        }

      }
