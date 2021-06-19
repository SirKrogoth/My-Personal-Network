<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class TimeLineController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() : View
    {
        $tweets = Tweet::buscarTodosTweets(Auth::user()->id);

        return view('timeline.index', compact('tweets'));
    }

    public function store(TweetRequest $request)
    {
        Tweet::create($request->all());

        return redirect()->route('timeline');
    }
}
