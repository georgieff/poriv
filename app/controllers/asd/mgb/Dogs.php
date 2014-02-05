<?php

class Dogs extends KT_Controllers {

    public function index() {
        echo 'win Уин';
/*
        if (!preg_match("/[^A-Za-z 0-9~%.:_\-\/]/", "/asd/mgb/dogs/&*")) {
            echo "A match was found.";
        } else {
            echo "A match was not found.";
        }*/
    }

    public function bark($bark = 'bark') {
        echo $bark;
    }

}