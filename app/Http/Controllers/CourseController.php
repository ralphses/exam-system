<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.course.all', ['courses' => Auth::user()->school->courses]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.course.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCourseRequest $request)
    {
        $request->validated();

        Course::create([
            'title' => $request->get('course_title'),
            'code' => $request->get('course_code'),
            'unit' => $request->get('course_unit'),
            'school_id' => Auth::user()->school->id
        ]);

        return redirect(route('course.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Course::destroy($request->id);

        return redirect(route('course.all'));
    }
}
