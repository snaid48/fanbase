<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\News;
use App\Historical;
use App\Team;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $event = Event::orderBy('created_at', 'desc')->take(4)->get();
        $news = News::orderBy('created_at', 'desc')->take(4)->get();
        $historical = Historical::orderBy('created_at', 'desc')->take(4)->get();
        $team = Team::paginate(10);
        
        return view('home', compact('event','news','historical','team'));
    }
}
