<?php

namespace App\Http\Controllers;

use App\Models\video;
use App\Models\Course;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $course = Course::all()->where('id', '=', $id);

        return view('superadmin.add_video', ['course' => $course]);
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

    /**
     * Store a newly created resource in storage.
     *@param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $video = new video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->course_id = $id;
        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
            $video->path = $path;
        }
        $video->save();
        return redirect()->route('superadmin.video', $id);
    }

    /**
     * Display the specified resource.
     *@param int $id
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(video $video, $id)
    {
        $course = Course::all()->where('id', '=', $id);
        $videos = video::select('*')->where('course_id', '=', $id)->orderBy('id', 'desc')->get();

        return view('superadmin.show_videos', ['course' => $course, 'videos' => $videos]);
    }

    /**
     * Show the form for editing the specified resource.
     *@param int $id
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = video::all()->where('id', '=', $id);
        $course_id = video::all()->where('id', '=', $id)->value('course_id');
        $course = course::all()->where('id', '=', $course_id);

        return view('superadmin.edit_video', ['video' => $video, 'course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *@param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = video::where('id', '=', $id)->update([
            'title' => $request->title, 'description' => $request->description
        ]);
        $course_id = video::where('id', '=', $id)->value('course_id');
        return redirect()->route('superadmin.video.show', $course_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        //
    }
}
