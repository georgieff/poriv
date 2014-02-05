<?php

class Chefo extends KT_Controllers {

    public function index() {
        echo 'chefo home';
    }

    public function pi4($page=1) {
        $this->load->library('benchmark');
        $this->benchmark->setMark('pe6o');

        $this->load->library('pagination');
        //$this->pagination->generate();
        $this->pagination->setConfig(array('total_rows' => 170, 'url' => 'chefo/pi4/'));
        $this->view->show('leroy');
        $asd = 0;
        while (1) {
            $asd++;
            if ($asd == 10000000)
                break;
        }
        $this->benchmark->setMark('go6o');
        echo $this->benchmark->getElapsedTime('pe6o', 'go6o');
    }

}