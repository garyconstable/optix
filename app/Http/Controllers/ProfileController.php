<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $comments = $this->getComments();

        if (empty($name)) {
            $name = $user->name;
        }

        if (empty($biography)) {
            $biography = $user->biography;
        }

        return $this->returnView($name, $biography, $comments);
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
            return $this->returnView($user->name, $user->biography, $this->getComments());
        } catch (\Exception $ex) {
            return redirect('/home')
                ->withErrors(['Save' => 'Could Not Save'])
                ->withInput();
        }
    }

    /**
     * Get Comments for the logged in user
     *
     * @return mixed
     */
    public function getComments()
    {
        return Comment::whereIdFor(Auth()->user()->id)->get();
    }

    /**
     * Return this view.
     *
     * @param string $name
     * @param string $biography
     * @param array $comments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function returnView($name = '', $biography = '', $comments = [])
    {
        return view('profile.index', [
            'data' => [
                'name' => $name,
                'biography' => $biography,
                'comments' => $comments
            ]
        ]);
    }
}
