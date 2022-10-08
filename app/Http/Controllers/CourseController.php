<?php

namespace App\Http\Controllers;


use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('superadmin.add_course');
    }
    public function sub_index()
    {

        return view('course');
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $course = new course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->field = $request->field;
        $course->price = $request->price;
        $course->save();

        return redirect()->route('superadmin.course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        $courses = Course::select('*')->orderBy('id', 'desc')->get();
        return view('superadmin.show_courses', ['courses' => $courses]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function sub_show(course $course)
    {
        $courses = Course::select('*')->orderBy('id', 'desc')->get();
        return view('course', ['courses' => $courses]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course, $id)
    {
        $course = course::all()->where('id', '=', $id);

        return view('superadmin.edit_course', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $course = course::where('id', '=', $id)->update([
            'name' => $request->name, 'description' => $request->description,
            'field' => $request->field, 'price' => $request->price
        ]);
        return redirect()->route('superadmin.course.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        //
    }
}
