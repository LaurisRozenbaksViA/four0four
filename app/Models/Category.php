<?php

namespace ToDoProject\Models;

use ToDoProject\Repositories\CategoryRepository;

class Category
{
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function getCategoryContent($categoryID)
    {
        $categoryContent = $this->category->getCategoryContent($categoryID);
        return $categoryContent;
    }
}