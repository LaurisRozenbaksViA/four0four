<?php

namespace ToDoProject\Controllers;


class TaskController extends AbstractController
{

    public function taskAction($taskID=null)
    {
        /** @var \Task $task */
        $task = $this->container->get('model.task');
        $taskContent = $task->getTaskContent($taskID);

        $templateVariables = ['taskContent' => $taskContent];
        $template = 'taskTemplate.html.twig';

        return $this->render($template, $templateVariables);
    }

}