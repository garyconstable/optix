<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\User;
use App\Services\AdminService;
use Auth;

class UsersController extends Controller
{
    /**
     * Model - Repository Pattern being used with the Users Obj
     *
     * @var
     */
    protected $model;

    /**
     * Pagination - how many per page
     *
     * @var int
     */
    private $perPage = 80;

    /**
     * @var User
     */
    private $user;

    /**
     * Access the URI Request Params
     *
     * @var Request
     */
    private $request;

    /**
     * UsersController constructor.
     * Use to Assign values to our properties
     *
     * @param User $user
     * @param Request $request
     */
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Default Action / Method
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        AdminService::isUserBanned($user->id);

        $this->model = new Repository($this->user);

        $all = $this->model->findAllWhereIn('is_admin', [0]);

        $users = $this->model->findSomeWhereIn('is_admin', [0], $this->perPage, $this->getCurrentPage());

        return view('users.index', ['data' => [
            'users' => $users,
            'perPage' => $this->getPerPage(),
            'currentPage' => $this->getCurrentPage(),
            'totalPages' => ceil($all->count() / $this->getPerPage()),
            'is_admin' => \App\Services\AdminService::isAdminUser()
        ]]);
    }

    /**
     * Access the private property - per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * Get access to the Private property User.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get access to the Private property Request.
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the Current page, 1 unless the page param is present in the url.
     *
     * @return int
     */
    public function getCurrentPage()
    {
        if ($page = $this->getRequest()->input('page')) {
            return intval($page);
        }

        return 1;
    }
}
