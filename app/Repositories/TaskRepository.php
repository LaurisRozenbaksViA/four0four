<?php

namespace ToDoProject\Repositories;

class TaskRepository extends Repository {

    public function getTaskContent($taskID){
        $task = $this->getTaskByID($taskID);
        $comments = $this->getTaskComments($taskID);
        $commentCount = count($comments);

        $taskContent = [
            'task'=>$task,
            'commentCount'=>$commentCount,
            'comments'=>$comments
        ];

        return $taskContent;
    }

    private function getTaskByID($taskID)
    {
        $taskQuery = $this->db->select(
            'todo',
            [
                'title',
                'body',
                'author',
                'created_at'
            ],
            [
                'todo_id'=>$taskID
            ]);

        return $taskQuery;
    }

    private function getTaskComments($taskID)
    {
        $taskQuery = $this->db->select(
            'comments',
            [
                'author',
                'body',
                'created_at'
            ],
            [
                'todo_id'=>$taskID
            ]);

        return $taskQuery;
    }
}