<?php
namespace ToDoProject\Models;

use ToDoProject\Repositories\DummyCategoriesRepository;

class Categories {


    private $Categories;

    public function __construct(DummyCategoriesRepository $Categories){

        $this->Categories = $Categories;

    }

    public function getCategoriesarray():array
    {
        return $this->Categories->getCategories();

    }


}