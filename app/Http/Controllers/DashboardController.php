<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() {

        $user = Auth::user();

        $examinations = $user->school->examinations->map(function($value) { return $value->attendance_id;});

        // dd($examinations);

        $info = [
            'attendance' => Attendance::whereIn('id', $examinations->all())->get(),
            'exams' => $user->school->examinations,
            'students' => $user->school->students,
            'courses' => $user->school->courses
        ];

        // dd($info);
        return view('backend.dashboard', ['info' => $info]);
    }
}
