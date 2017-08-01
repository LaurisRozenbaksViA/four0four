<?php

namespace four0four\Models;

class Kat1Model {


    public $ToDoList;

    public function __construct(){

        $this->ToDoList = [

            'title' => 'Sport',
            'text' => 'Text',
            'comment' => 'Comments'


            ];

    }

    public function getToDoTask(){

        return $this->ToDoList;


    }


}