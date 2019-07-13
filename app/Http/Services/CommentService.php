<?php

namespace App\Services;

use App\Comment;
use App\Services\AdminService;

class CommentService
{
    /**
     * Get Comments By User ID
     *
     * @param int $id
     * @return array
     */
    public function getUserComments($id = 0)
    {
        if (!$id) {
            return [];
        }

        return Comment::where('id_for', $id)->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Delete a comment by Comment ID
     *
     * @param int $comment_id
     * @return bool
     */
    public static function deleteComment($comment_id = 0)
    {
        if (AdminService::isAdminUser()) {
            try {
                $comment = Comment::findOrFail($comment_id);
                $comment->delete();
                return true;
            } catch (\Exception $ex) {
                abort(404);
            }
        }

        return false;
    }
}
