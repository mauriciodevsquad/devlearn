<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::query()->orderBy('created_at')->paginate(10)->appends('filter','abc');

        return view('/videos', [
            'videos' => $videos
        ])->with('filter','abc');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store()
    {
        $attributes = request()->validate([
            'title'       => 'required',
            'url'         => 'required',
            'description' => 'required',
        ]);

        Video::query()->create($attributes);


        return redirect('/dashboard');

    }

    public function show($id)
    {
        $video = Video::query()->find($id);
        return view('videos.show')->with('video', $video);
    }


    public function edit($id)
    {
        //
    }

    public function update(Video $video)
    {
        $attributes = request()->validate([
            'title'       => 'required',
            'url'         => 'required',
            'description' => 'required',
        ]);

        $video->update($attributes);

        return back();
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return back();

    }
}
