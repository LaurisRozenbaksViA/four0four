<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 8/1/17
 * Time: 3:54 PM
 */

namespace ToDoProject\Repositories;

use Medoo\Medoo;

abstract class Repository
{
    /** @var \Medoo\Medoo */
    protected $db;

    public function __construct(Medoo $db)
    {
        $this->db = $db;
    }
}
