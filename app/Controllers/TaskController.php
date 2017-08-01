<?php

namespace ToDoProject\Controllers;


class TaskController extends AbstractController
{

    public function taskAction()
    {
        /** @var \Task $task */
        $task = $this->container->get('model.task');
        $taskContent = $task->getTaskContent();

        $templateVariables = ['taskContent' => $taskContent];
        $template = 'taskTemplate.html.twig';

        return $this->render($template, $templateVariables);
    }

}