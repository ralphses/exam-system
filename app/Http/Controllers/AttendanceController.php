<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $examinationId = $request->studentId ?? false;

        $attendances = ($examinationId) ? Attendance::where('examination_id', $examinationId) : Attendance::all();
        return view('backend.attendance.all', ['attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        if($request->method() == "GET") {

            $allAttendace = Attendance::all();

            return view('backend.attendance.authenticate', ['attendances' => $allAttendace]);
        }

        $request->validate([
                'matric' => ['required', Rule::exists('students', 'matric')], 
                'attendance' => ['required', Rule::exists('attendances', 'id')
            ]]);


        $student = Student::where('matric', $request->get('matric'))->first();
        $attendance = Attendance::find($request->get('attendance'));

        $exam = Examination::where('attendance_id', $attendance->id)->get();

        $cheb = array_intersect($student->courses->map(function($val) { return $val->id; })->all(), $exam->map(function($val) { return $val->id; })->all());

        if(count($cheb) > 0) {
            return redirect(route('students.view', ['id' => $student->id]))->with('data', "found")->with('attendance', $attendance->id);
        }

        return back()->with('info', "No data found");


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mark(Request $request)
    {
        $attendance = $request->get('attendance');

        if($attendance) {
            Student::find($request->id)
                ->attendances()
                ->attach(Attendance::find($request->get('attendance')));
        }

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
