<?php

namespace ToDoProject\Controllers;



class SportTODOcontrol extends AbstractController{

    protected $toDo;
public function sportcontrol(){

        $toDo = $this->container->get('model.todo');
        $toDotask= $toDo -> getToDoTask();


        $templateVariables = ['tasks' => $toDotask];
        $template = '/Sportview.html.twig';
        return $this->render($template,$templateVariables);

}


}