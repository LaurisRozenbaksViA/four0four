<?php

namespace ToDoProject\Controllers;

use ToDoProject\Models\AboutModel;

class AboutController extends AbstractController{


    public function aboutcontrol(){


        $templateVariables = ['about' => 'We are 404'];
        $template = '/about.html.twig';
        return $this->render($template,$templateVariables);

    }


}