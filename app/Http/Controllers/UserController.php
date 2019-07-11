<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\User;

class UserController extends Controller
{
    protected $model;

    /**
     * Action to show a User Profile page.
     * If the User can not be found throw a 404
     *
     * @param User $user
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $user, Request $request, $id)
    {
        $this->model = new Repository($user);

        $user = $this->model->findAllWhereIn('id', [$id]);

        if ($user->isEmpty()) {
            abort(404);
        }

        return view('user.index', [
            'data' => [
                'user' => $user
            ]
        ]);
    }
}
