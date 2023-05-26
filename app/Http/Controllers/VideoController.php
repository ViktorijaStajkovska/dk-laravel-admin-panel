<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::paginate(8);
        
        return view('videos.videos', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create-videos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        
        $videos= new Video;
        $videos->link = $request->link;

        if ($request->hasFile('image')) {

            $videos->image = $request->file('image')->store('videos-img', 'public');
            
        }
        $videos->save();

        return to_route('videos.create')->with('success', 'Video successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('videos.edit-videos', compact( 'video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        
        $video->link = $request->link;
        if ($request->hasFile('image')) {

            $video->image = $request->file('image')->store('videos-img', 'public');
            
        }
        $video->save();

        return to_route('videos.index')->with('success', 'Video successfully edited!');
    }

   

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        if(Storage::disk('public')->delete($video->image)) {
        $video->delete();
        }
        
        return redirect()->back()->with('success', 'Video deleted!!');
    }
}
