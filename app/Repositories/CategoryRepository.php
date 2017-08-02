<?php

namespace ToDoProject\Repositories;


class CategoryRepository extends Repository
{
    public function getCategoryContent($categoryID){

        $descriptionForCategory = $this->getCategoryDescription($categoryID);
        $tasksForCategory = $this->getTasksByCategory($categoryID);
        $taskCount = count($tasksForCategory);

        $categoryContent = [
            'description'=>$descriptionForCategory,
            'tasks'=>$tasksForCategory,
            'taskCount'=>$taskCount
        ];

        return $categoryContent;
    }

    private function getTasksByCategory($categoryID)
    {
        $taskQuery = $this->db->select(
            'todo',
            [
                'title',
                'author',
                'created_at',
                'todo_id'
            ],
            [
                'category_id'=>$categoryID
            ]);

        return $taskQuery;
    }

    private function getCategoryDescription($categoryID)
    {
        $taskQuery = $this->db->select(
            'categories',
            [
                'title',
                'description',
                'created_at'
            ],
            [
                'category_id'=>$categoryID
            ]);

        return $taskQuery;
    }

}