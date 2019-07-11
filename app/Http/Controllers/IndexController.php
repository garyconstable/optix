<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class IndexController extends Controller
{
    /**
     * Default Index action.
     * If the user is logged in and is admin, show admin by default
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->is_admin) {
                return redirect('admin');
            }

            return redirect('home');
        }

        return view('auth.register', []);
    }
}
