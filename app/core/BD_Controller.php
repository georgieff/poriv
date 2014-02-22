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
                    'en' => 'Launched a project PORIV',
                    'bg' => 'Стартира изпълнението на проект ПОРИВ'
                    ),
                'content'  => array(
                    'en' => '
                        <p>In May 2013 the  Civil Initiative for Local Development Foundation  launched a project "PORIV (support for equal opportunities )” BG 051PO001-7.0.07- 0247 -C0001. The project is implemented with the financial support of OP " Human Resources Development ", financed by the European Social Fund.</p>
                        <p>The project is implemented in partnership with the " Education for Democracy " Foundation – Poland, LARGO Association - Kyustendil and Bratstvo 1869 Community Centre - Kyustendil.</p>
                        <p>The aim of the project is to explore and implement best European practices to prevent discrimination and ensure equal access for all to the resources of society through research and implementation of the " Development of Cultural Routes " developed by the " Education for Democracy " and successfully is realized in the region of Wroclaw, Poland.</p>
                        <p>Representatives of Bulgarian and Polish partners partner together to develop programs and plan for adaptation of the " Development of Cultural Routes " to Bulgarian conditions. Their work will be completed with the development of the first cultural route of Kyustendil Municipality.</p>
                        <p>Project has a total value of 105 711.16 Levs and lasts 16 months.</p>
                    ',
                    'bg' => '
                        <p>През май 2013 година Фондация „Гражданска инициатива за местно развитие” стартира изпълнението на проект „ПОРИВ (подкрепа за равни възможности) BG 051PO001-7.0.07-0247-C0001. Проектът се реализира с финансовата помощ на ОП «Развитие на човешките ресурси», съфинансирана от Европейския социален фонд на ЕС. </p>
                        <p>Проектът се изпълнява в партньорство с: Фондация „Образование за демокрация”- Полша; Сдружение ЛАРГО - гр. Кюстендил и НЧ „Братство1869” - гр. Кюстендил. </p>
                        <p>Целта на проекта е да се проучат и внедрят добри европейски практики за превенция на дискриминацията и осигуряване на равен достъп на всички до ресурсите на обществото чрез проучване и внедряване на метода „Развитие на културни маршрути”, разработени от Фондация „Образование за демокрация” и успешно се реализира в регион Вроцлав, Полша.</p>
                        <p>Предствителите на българските партньори и полския партньор, заедно да разработят програма и план за адаптиране на метода „Развитие на културни маршрути” към българските условия. Работата им ще приключи с разработване на 1 културен маршрут за община Кюстендил.</p>
                        <p>Проекта е на обща стойност 105 711.16 лева и е с продължителност 16 месеца.</p>
                    '),
                'date' => '07.05'
                ),
            'open-community' => array(
                'title' => array(
                    'en' => 'Concluded was a contract with open society',
                    'bg' => 'Договор Отворено общество'
                    ),
                'content'  => array(
                    'en' => '<p>Between foundation for local development and open society is concluded a contract for financial assistance assistance amounting to 9997 leva. Thanks to this agreement, the leading organization again started the implementation of project activities whose execution was suspended.</p>',
                    'bg' => '<p>Mежду Фондация „Гражданска инициатива за местно развитие” и Отворено общество се сключи договор за финансова помощ на стойност 9 997 лева. Благодарение на този договор, водещата организация отново стартира изпълнението на дейностите по проекта, чието изпълнение беше временно преустановено.</p>'
                    ),
                'date' => '04.11'
                ),
            'pressconference' => array(
                'title' => array(
                    'en' => 'At a press conference in the Kyustendil was presented project PORIV',
                    'bg' => 'На пресконференция в гр. Кюстендил беше представен проект ПОРИВ'
                    ),
                'content'  => array(
                    'en' => '
                     <p>On 15/01/2014 , in the great hall of the Bratstvo 1869 Community Centre in Kyustendil held a press conference for the presentation of the "PORIV (support for equal opportunities )” BG 051PO001-7.0.07- 0247 -C0001, a scheme WITHOUT BORDERS - Component 1 - Phase 2 and with the financial support of Operational Programme " human Resources Development 2007-2013 ."</p>
                     <p>The meeting also invited national and local media , representatives of local authorities and NGOs.</p>
                     <p>The press conference was opened by Mrs. Diana Angelova - Project Manager . She presented the project objectives, planned activities , the target group of the project.</p>
                     <p>Partners were their perceptions of Ivan Andonov - Chairman of the NS " Bratstvo1869 " and Sasho Kovachev - President of Association " Largo" . Each of them explained the role of the organization he represents in joint implementation of the project and how it will achieve the expected results on NGOs from Kyustendil .</p>
                    ',
                    'bg' => '
                    <p>На 15.01.2014 г. в голямата зала на НЧ „Братство 1869” в гр. Кюстендил се проведе пресконференция за представянето на проект „ПОРИВ (подкрепа за равни възможности) BG 051PO001-7.0.07-0247-C0001, по схема БЕЗ ГРАНИЦИ – КОМПОНЕНТ 1 – ФАЗА 2 и с финансовата подкрепа на Оперативна Програма „Развитие на човешките ресурси 2007 – 2013”.</p>
                    <p>На срещата бяха поканени национални и местни медии, представители на местните власти и неправителствени организации. </p>
                    <p>Пресконференцията беше открита от г-жа Диана Ангелова – Ръководител на проекта. Тя запозна присъстващите с целите на проекта, планираните дейности, целевата група по проекта. </p>
                    <p>Партньорите бяха предстваени от: Иван Андонов – председател на НЧ „Братство1869” и Сашо Ковачев - председател на Сдружение „ЛАРГО”. Всеки от тях разясни ролята на представляваната от него организация в съвместните дейности по реализирането на проекта и как ще се постигнат очакваните резултати върху неправителствените организации от област Кюстендил.</p>'
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
