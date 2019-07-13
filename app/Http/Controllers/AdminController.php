<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Delete a comment
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteComment(Request $request, $id)
    {
        $result = \App\Services\CommentService::deleteComment($id);
        if ($result) {
            return redirect()->back();
        }
        abort(404);
    }

    public function banUser()
    {
    }
}
