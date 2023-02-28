<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewExaminationRequest;
use App\Models\Attendance;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Auth::user()->school->examinations;
        return view('backend.exams.all', ['exams' => $examinations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exams.add', ['courses' => Auth::user()->school->courses]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewExaminationRequest $request)
    {
        $attendance = Attendance::create(['title' => $request->get('exam_title') . "Attendance"]);

        $examination = Examination::create([
            'title' => $request->get('exam_title'),
            'course_id' => $request->get('exam_course'),
            'date' => $request->get('exam_date'),
            'start_time' => $request->get('exam_start_time'),
            'stop_time' => $request->get('exam_stop_time'),
            'attendance_id' => $attendance->id,
            'school_id' => Auth::user()->school->id,
            'added_by' => Auth::user()->id,
        ]);


        return redirect(route('exam.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Examination::destroy($request->id);
        return redirect(route('exam.all'));

    }
}
