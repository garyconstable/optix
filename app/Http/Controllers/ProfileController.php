<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth()->user();
        $name = $request->input('name');
        $biography = $request->input('biography');

        if (empty($name)) {
            $name = $user->name;
        }

        if (empty($biography)) {
            $biography = $user->biography;
        }

        return view('profile.index', [
            'data' => [
                'name' => $name,
                'biography' => $biography
            ]
        ]);
    }

    /**
     * Validate and store the user details
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'biography' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/home')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = Auth()->user();
            $user->name = $request->input('name');
            $user->biography = $request->input('biography');
            $user->save();
            return view('profile.index', [
                'data' => [
                    'name' => $user->name,
                    'biography' => $user->biography
                ]
            ]);

        } catch (\Exception $ex) {
            return redirect('/home')
                ->withErrors(['Save' => 'Could Not Save'])
                ->withInput();
        }
    }
}
