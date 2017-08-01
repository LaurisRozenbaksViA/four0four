<?php
namespace ToDoProject\Models;
//class Landing
//{
//    public function getListOfDummy() : array
//    {
//        $listOfDummy = [
//            'go to work',
//            'dinner with girlfriends parents',
//            'meeting with the Boss',
//            'yoga',
//            'buy tickets',
//            'meet Marco'
//        ];
//       return $listOfDummy;
//    }
//}

use ToDoProject\Repositories\LandingRepository;
class Landing
{
    private $landing;

    public function __construct(LandingRepository $landing)
    {
        $this->landing = $landing;
    }

    public function getDummyContent() : array
    {
        $landingContent = $this->landing->getDummy();
        return $landingContent;
    }

}