<?php

namespace App\Http\Controllers;

use App\Models\video;
use App\Models\Course;
use App\Models\Videotempo;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


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
     * Display a listing of the resource.
     *@param int $id
     * @return \Illuminate\Http\Response
     */
    public function sub_index($id)
    {

        $course = Course::all()->where('id', '=', $id);
        $videos = video::select('*')->where('course_id', '=', $id)->orderBy('id', 'desc')->paginate(6);
        return view('videocourse', ['course' => $course, 'videos' => $videos]);
    }

    /**
     * Display a listing of the resource.
     *@param int $id
     * @return \Illuminate\Http\Response
     */
    public function sub_play($id) // video id
    {
        $video = video::all()->where('id', '=', $id);
        $course = Course::all()->where('id', '=', $video->value('course_id'));
        return view('watch_video', ['course' => $course, 'video' => $video]);
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
        $video->description = $request->description;
        $video->course_id = $id;
        $course_name = Course::all()->where('id', '=', $id)->value('name');
        $tempvideo = Videotempo::where('foldername', $request->video)->first();

        if ($tempvideo) {
            if (!File::exists(public_path('videos/' . $course_name))) {
                mkdir(public_path('videos/' . $course_name));
            }
            File::move(
                storage_path('app/public/tempo/videos/' . $request->video . '/' . $tempvideo->filename),
                public_path('videos/' . $course_name . '/' . $tempvideo->filename)
            );


            $video->path = 'videos/' . $course_name . '/' . $tempvideo->filename;
            if (!File::exists(public_path('videos/' . $course_name . '/thumbnails'))) {
                mkdir(public_path('videos/' . $course_name . '/thumbnails'));
            }


            $tempvideo->delete();
            $video->title = $tempvideo->filename;
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
     * @param int $id
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $path = video::all()->where('id', '=', $id)->value('path');
        $course_id = video::all()->where('id', '=', $id)->value('course_id');
        if (File::exists($path)) {
            File::delete($path);
        }
        video::where('id', '=', $id)->delete();
        return redirect()->route('superadmin.video.show', $course_id);
    }
}
