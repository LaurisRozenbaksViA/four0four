<?php
namespace ToDoProject\Repositories;


class DummyCategoriesRepository{


    public function getCategories(){

        return $arrayofCateg=[

            'sport'=>'Sport',
            'todo1'=>'Todo1',
            'todo2'=>'Todo2',
            'todo3'=>'Todo3',
            'todo4'=>'Todo4'

    ];

    }


}