<?php

namespace ToDoProject\Controllers;



class CategoriesController extends AbstractController{

    protected $Categories;
    public function categoriescontrol(){

        $Categories = $this->container->get('model.categ');
        $CategoriestoDisplay= $Categories -> getCategoriesarray();


        $templateVariables = ['category' => $CategoriestoDisplay];
        $template = '/categoriestemplate.html.twig';
        return $this->render($template,$templateVariables);

    }


}