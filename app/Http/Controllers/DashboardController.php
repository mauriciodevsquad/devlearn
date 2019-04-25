<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if (request()->input('response') !== null) {
            $videos = Video::query()->where('title', request()->input('response'))
                ->paginate(10)->appends('title', request()->input('response'));
        } else {
            $videos = Video::orderBy('title')->paginate(10);
        }

        return view('dashboard')->with('videos', $videos);
    }
}
