<?php
namespace ToDoProject\Repositories;
class CommentRepository extends Repository
{
    public function sendComment($commentTxt, $commentAuthor)
    {
            $taskQuery = $this->db->insert(
                "comments", [
                    "body" => $commentTxt,
                    "author"=> $commentAuthor,
                ]);
            return $taskQuery;
    }
}