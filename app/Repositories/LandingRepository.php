<?php
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
namespace ToDoProject\Repositories;

class LandingRepository{

    public function getDummy()
    {
        return [
            'title'=>'ToDo List',
            'listOfDummy'=> [
                'go to work',
                'dinner with girlfriends parents',
                'meeting with the Boss',
                'yoga',
                'buy tickets',
                'meet Marco'
            ],

        ];
    }
}