<?php

namespace ToDoProject\Models;

use ToDoProject\Repositories\CommentSetRepository;

class Comment
{
    private $comment;

    public function __construct(CommentSetRepository $comment)
    {
        $this->comment = $comment;
    }

    public function setCommentContent()
    {
        $commentContent = $this->comment->sendComment($_POST['comment'],$_POST['name'],$_POST['todo_id']);
        return $commentContent;
    }

}