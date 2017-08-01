<?php


$output ='<h1>'. $ToDoList['title'] .'</h1>';

$output .='<p>'. $ToDoList['text'] . '</p>';

$output .='<p>'. $ToDoList['comment'] . '</p>';

return $output;