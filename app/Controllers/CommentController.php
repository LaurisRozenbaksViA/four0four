<?php

namespace ToDoProject\Controllers;

class CommentController extends AbstractController
{
    public function commentAction()
    {
        /** @var \Comment $comment */
        $comment = $this->container->get('model.comment');
        $commentContent = $comment->setCommentContent();

        $templateVariables = ['commentContent' => $commentContent];
        $template = 'commentTemplate.twig';
        return $this->render($template, $templateVariables);
    }
}