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
        $query = Video::query()->orderBy("name");
        $term = request()->input('term');

        if ($term) {
            $query
                ->whereRaw("lower(name) like ?", [strtolower("%$term%")]);
        }

        return view('dashboard')->with('videos', $query->paginate(10)->appends("term", $term));
    }
}
