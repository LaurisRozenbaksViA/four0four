<?php

namespace ToDoProject\Controllers;

class CategoryController extends AbstractController
{
    public function categoryAction($categoryID = null)
    {
        /** @var \Category $category */
        $category = $this->container->get('model.category');
        $categoryContent = $category->getCategoryContent($categoryID);

        $templateVariables = ['categoryContent' => $categoryContent];
        $template = 'categoryTemplate.html.twig';
        return $this->render($template, $templateVariables);
    }
}