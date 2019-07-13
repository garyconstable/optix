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

    /**
     * Enable A user
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enableUser(Request $request, $id)
    {
        $result = \App\Services\AdminService::setBanned($id, 0);
        if ($result) {
            return redirect()->back();
        }
        abort(404);
    }

    /**
     * Disable a user
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disableUser(Request $request, $id)
    {
        $result = \App\Services\AdminService::setBanned($id, 1);
        if ($result) {
            return redirect()->back();
        }
        abort(404);
    }
}
