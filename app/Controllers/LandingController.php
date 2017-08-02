<?php

namespace ToDoProject\Controllers;


class LandingController extends AbstractController
{

    public function landingAction()
    {
        /** @var \Landing $landing */
        $landing = $this->container->get('model.landing');
        $landingContent = $landing->getLandingContent();

        $templateVariables = ['landingContent' => $landingContent];
        $template = 'landingTemplate.html.twig';
        return $this->render($template, $templateVariables);
    }
}