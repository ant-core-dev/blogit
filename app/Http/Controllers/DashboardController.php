<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
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
    public function index()
    {
        $user_id = auth()->user()->id;  // Get id of the logged in user
        $user = User::find($user_id)->posts()->paginate(10);   // Get the user collection for the id
        return view('dashboard')->with('posts', $user);  // Display the posts for the user
        //return view('dashboard')->with('posts', $user->posts);  // Display the posts for the user
    }
}
