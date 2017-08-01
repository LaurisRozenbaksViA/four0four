<?php

namespace ToDoProject\Controllers;

class LandingController extends AbstractController
{
    public function landingAction ()
    {
        $task = $this->container->get('model.landing');
        $taskContent = $task->getDummyContent();

        $templateVariables = ['taskContent' => $taskContent];
        $template = 'landing.html.twig';

        return $this->render($template, $templateVariables);

//        $ListOfDummy = new Dummy();
//        $dummy = $ListOfDummy->getListOfDummy();
    }
}