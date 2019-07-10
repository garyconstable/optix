<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class IndexController extends Controller
{
    public function index()
    {
        if($user = Auth::user())
        {
            if( $user->is_admin ){
                return redirect('admin');
            }

            return redirect('home');
        }

        return view('auth.register', []);

    }
}
