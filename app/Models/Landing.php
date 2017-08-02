<?php

namespace ToDoProject\Models;

use ToDoProject\Repositories\LandingRepository;

class Landing
{
    private $landing;

    public function __construct(LandingRepository $landing)
    {
        $this->landing = $landing;
    }

    public function getLandingContent()
    {
        $landingContent = $this->landing->getLandingContent();
        return $landingContent;
    }

}