<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of BD_Controllers.php extending core class KT_Controllers.php
/* * ************************************************************************ */
class BD_Controllers extends KT_Controllers {

    public $viewData = array();

    public function __construct() {
        parent::__construct();

            // $this->input->setCookie('langs', null, time()+3600*24);
        if(!$this->session->get('langs')) {
            $this->session->set('langs', 'bg');
        }
        // echo $this->session->get('langs');
        $this->viewData = array(
            'lang' => $this->session->get('langs')
            );

        $menu = array(
            'project' => array(
                'en' => 'Project',
                'bg' => 'Проект'
                ),
            'partners' => array(
                'en' => 'Partners',
                'bg' => 'Партньори'
                ),
            'news' => array(
                'en' => 'News',
                'bg' => 'Новини'
                ),
            'method' => array(
                'en' => 'Method',
                'bg' => 'Метод'
                ),
            'goodpractices' => array(
                'en' => 'Good Practices',
                'bg' => 'Добри Практики'
                ),
            'documents' => array(
                'en' => 'Documents',
                'bg' => 'Документи'
                ),
            'gallery' => array(
                'en' => 'Gallery',
                'bg' => 'Галерия'
                ),
            'contact' => array(
                'en' => 'Contact',
                'bg' => 'Контакти'
                )
            );

        $overheader = array(
            'bg' => 'ПОРИВ (подкрепа за равни възможности) Договор BG 051PO001-7.0.07-0247-C0001 Схема BG 051PO001-7.0.07 <br>Без граници – Компонент 1 – Фаза 2',
            'en' => 'PORIV Project (Support for Equal Opportunities) Contract BG051PO001-7.0.07-0247-C0001 Grant Scheme BG051PO001-7.0.07 Without Borders – Component 1 – Phase 2');

        $pageTitle = array(
            'bg' => 'ПОРИВ',
            'en' => 'PORIV');

        $gallery = array(
            'bg' => 'Галерия',
            'en' => 'Gallery');

        $footerTexts = array(
            'bg' => 'Този сайт е изготвен с финансовата помощ на Европейският социален фонд. Фондация „Гражданска инициатива за местно развитие” носи цялата отговорност за съдържанието на настоящият сайт и при никакви обстоятелства не моце да се проеме като официална позиция на Еврпейския съюз или МТСП и главна дирекция „Европейски фондове, международни програми и проекти”. ',
            'en' => 'This document has been produced with the financial assistance of the European Social Fund. Sole responsibility for the contents of this document lies with the Civil Initiative for Local Development Foundation. The views expressed herein can in no way be taken to reflect the official opinion of the European Union or of the Ministry of Labour and Social Policy and its European Funds International Programmes and Projects General Directorate.');


        $news = array(
            'project-launched' => array(
                'title' => array(
                    'en' => 'The PORIV project is launched',
                    'bg' => 'Стартира изпълнението на проект ПОРИВ'
                    ),
                'content'  => array(
                    'en' => 'Coming soon',
                    'bg' => 'Очаквайте скоро'
                    ),
                'date' => '07.05'
                ),
            'open-community' => array(
                'title' => array(
                    'en' => 'Open community agreement',
                    'bg' => 'Договор Отворено общество'
                    ),
                'content'  => array(
                    'en' => 'Coming soon',
                    'bg' => 'Очаквайте скоро'
                    ),
                'date' => '04.11'
                ),
            'pressconference' => array(
                'title' => array(
                    'en' => 'At a press conference in the town of Kyustendil was presented project PORIV',
                    'bg' => 'На пресконференция в гр. Кюстендил беше представен проект ПОРИВ'
                    ),
                'content'  => array(
                    'en' => 'Coming soon',
                    'bg' => 'Очаквайте скоро'
                    ),
                'date' => '15.01'
                ),
            // 'new-routes' => array(
            //     'title' => array(
            //         'en' => 'The creation of new routes started on Tuesday at 12.00 p.m.',
            //         'bg' => 'Създаването на нови маршрути започна във вторник в 12.00 ч.'
            //         ),
            //     'content'  => array(
            //         'en' => 'Coming soon',
            //         'bg' => 'Очаквайте скоро'
            //         ),
            //     'date' => '31.12'
            //     ),
            );


$this->viewData['menu'] = $menu;
$this->viewData['pageTitle'] = $pageTitle;
$this->viewData['webTitle'] = $pageTitle;
$this->viewData['footerTexts'] = $footerTexts;
$this->viewData['overheader'] = $overheader;
$this->viewData['gallery'] = $gallery;
$this->viewData['news'] = $news;
}

}

// End of the file BD_Controllers.php
