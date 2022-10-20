<?php

namespace App\Http\Controllers;

use App\Models\Videotempo;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {

        if ($request->hasFile('video') && $request->file('video')->getMimeType() == 'video/mp4') {
            $file = $request->file('video');
            $foldername = uniqid() . '-' . now()->timestamp;
            $filename = $file->getClientOriginalName();
            $file->storeAs('tempo/videos/' . $foldername, $filename, ['disk' => 'my_files']);


            $v = new Videotempo();
            $v->filename = $filename;
            $v->foldername = $foldername;
            $v->save();

            return $foldername;
        } else {
            return 'not mp4';
        }
    }
}
