<?php

namespace App\Services;

use App\Comment;

class CommentService
{
    public function getUserComments($id = 0)
    {
        if (!$id) {
            return [];
        }

        return Comment::where('id_for', $id)->orderBy('created_at', 'DESC')->get();
    }
}
