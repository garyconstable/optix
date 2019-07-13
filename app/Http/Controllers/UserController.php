<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\User;
use App\Comment;
use App\Services\CommentService;

class UserController extends Controller
{
    /**
     * @var
     */
    protected $model;

    /**
     * @var CommentService
     */
    protected $commentService;

    /**
     * UserController constructor.
     *
     * @param CommentService $comService
     */
    public function __construct(CommentService $comService)
    {
        $this->commentService = $comService;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        return $this->returnView($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request, $id)
    {
        $user_by = Auth()->user();
        $user_for = intval($id);
        $comment = $request->input('comment');

        if (empty($comment)) {
            //--> todo handle the no comment
            return $this->returnView($id);
        }

        try {
            $com = new Comment();
            $com->comment = $comment;
            $com->id_for = $user_for;
            $com->id_by = $user_by->id;
            $com->save();
            return redirect()->back();
        } catch (\Exception $ex) {
        }

        return $this->returnView($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function returnView($id = 0)
    {
        $this->model = new Repository(new  User());
        $user = $this->model->findAllWhereIn('id', [$id]);

        if ($user->isEmpty()) {
            abort(404);
        }

        return view('user.index', [
            'data' => [
                'comments' => $this->commentService->getUserComments($id),
                'user' => $user,
                'is_admin' => \App\Services\AdminService::isAdminUser()
            ]
        ]);
    }
}
