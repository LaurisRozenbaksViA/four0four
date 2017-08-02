<?php

namespace ToDoProject;

interface ContainerInterface
{
    public function get(string $dependencyName);

    public function getParameter(string $paramName);
}