<?php

namespace four0four\Models;

class Kat1Model {


    public $ToDoList2;

    public function __construct(){

        $this->ToDoList2 = [

            'title' => 'Politic',
            'text' => 'Text',
            'comment' => 'Comments'


        ];

    }

    public function getToDoTask2(){

        return $this->ToDoList2;


    }


}