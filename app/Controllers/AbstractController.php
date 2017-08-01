<?php

namespace ToDoProject\Controllers;

use ToDoProject\ContainerInterface;

abstract class AbstractController implements ControllerInterface
{
    /** @var ContainerInterface */
    protected $container;
    protected $twig;

    public function __construct(ContainerInterface $dependencyContainer)
    {
        $this->container = $dependencyContainer;
        $this->twig = $this->container->get('twig.enviroment');
    }

    public function render(string $template, array $content = [])
    {
        return $this->twig->render($template, $content);
    }
}