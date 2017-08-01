<?php

namespace ToDoProject\Models;

use ToDoProject\Repositories\DummyTaskRepository;

class Task
{
    private $task;

    public function __construct(DummyTaskRepository $task)
    {
        $this->task = $task;
    }

    public function getTaskContent() : array
    {
        $taskContent = $this->task->getTask();
        return $taskContent;
    }

}