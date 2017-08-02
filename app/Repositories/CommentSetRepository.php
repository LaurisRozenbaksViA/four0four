<?php

namespace ToDoProject\Repositories;

class CommentSetRepository extends Repository
{
    public function sendComment($commentTxt, $commentAuthor, $commentTaskId)
    {
        $taskQuery = $this->db->insert(
            "comments", [
            "todo_id"=>$commentTaskId,
            "body" => $commentTxt,
            "author"=> $commentAuthor,
            "created_at"=>date('Y-m-d H:i:s')
        ]);
        return $commentTaskId;
    }
}