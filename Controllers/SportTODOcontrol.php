<?php

namespace four0four\Controllers;

use four0four\Models\Kat1Model;

class SportTODOcontrol {

    protected $toDo;
public function sportcontrol(){

        $toDo = $this->getToDoTask();
        $templateVariables = ['tasks' => $toDo];
        $template = '/Sportview.php';
        return render($template,$templateVariables);

}


}