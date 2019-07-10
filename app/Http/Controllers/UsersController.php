<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;

use App\User;


class UsersController extends Controller
{
    protected $model;

    public function index(User $user)
    {
        $this->model = new Repository($user);

        dd($this->model->findAllWhereIn('is_admin', [0]));

        d('--> users index');
    }
}
