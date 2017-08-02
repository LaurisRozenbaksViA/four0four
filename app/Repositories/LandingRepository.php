<?php

namespace ToDoProject\Repositories;


class LandingRepository extends Repository
{

    public function getLandingContent(){
       $categoriesList = $this->getCategoriesList();
       $categoryCount = count($categoriesList);
        $latestPosts = $this->getLatestPosts();

        $categoryContent = [
            'category'=>$categoriesList,
            'categotyCount'=>$categoryCount,
            'latestPosts'=>$latestPosts
        ];

        return $categoryContent;
    }

    private function getCategoriesList()
    {
        $taskQuery = $this->db->select(
            'categories',
            [
                'title',
                'category_id'
            ]);

        return $taskQuery;
    }

    private function getLatestPosts()
    {
        $taskQuery = $this->db->query(
            "SELECT title, author, created_at, todo_id
            FROM todo
            ORDER BY created_at DESC
            LIMIT 5")->fetchAll();

        return $taskQuery;
    }
}