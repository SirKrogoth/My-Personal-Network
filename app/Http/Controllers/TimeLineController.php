<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TimeLineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('timeline.index');
    }

    public function store(TweetRequest $request)
    {
        Tweet::create($request->all());

        return redirect()->route('timeline');
    }
}
