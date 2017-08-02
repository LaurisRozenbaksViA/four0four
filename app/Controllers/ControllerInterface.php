<?php

namespace ToDoProject\Controllers;

interface ControllerInterface
{
    public function render(string $template, array $content = []);
}