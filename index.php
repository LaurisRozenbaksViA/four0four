<?php

use ToDoProject\Models\Landing;

require 'vendor/autoload.php';

use ToDoProject\Application;

$app = new Application();

echo $app->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
