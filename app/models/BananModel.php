<?php

Class BananModel extends KT_Models {

    public function __construct() {
        parent::__construct();
    }

    public function sayBanan() {
        $this->load->model('ceko');
        echo '<br>banan';
        echo '<br>';
        $this->ceko->leko();
    }

}
