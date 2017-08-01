<?php

include_once 'app/Models/Dummy.php';

include 'app/views/Dummy.view.php';

require 'vendor/autoload.php';

use ToDoProject\Application;

$app = new Application();

echo $app->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

