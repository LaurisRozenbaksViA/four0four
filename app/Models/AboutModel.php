<?php

namespace ToDoProject\Models;

use ToDoProject\Repositories\AboutRepository;

class AboutModel {


    private $about;

    public function __construct(AboutRepository $about){

        $this->about = $about;

    }

    public function getAboutInfor()
    {
        return $this->about->getAboutInfo();

    }


}