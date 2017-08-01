<?php

namespace ToDoProject\Models;

use ToDoProject\Repositories\DummyTaskRepository;

class Kat1Model {


   private $ToDoTask;

    public function __construct(DummyTaskRepository $ToDoTask){

        $this->ToDoTask = $ToDoTask;

    }

    public function getToDoTask():array
    {
        return $this->ToDoTask->getTodo();

    }


}