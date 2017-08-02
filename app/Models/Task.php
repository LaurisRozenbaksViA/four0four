<?php

namespace ToDoProject\Models;

use ToDoProject\Repositories\TaskRepository;

class Task
{
    private $task;

    public function __construct(TaskRepository $task)
    {
        $this->task = $task;
    }

    public function getTaskContent($taskID)
    {
        $taskContent = $this->task->getTaskContent($taskID);
        return $taskContent;
    }

}