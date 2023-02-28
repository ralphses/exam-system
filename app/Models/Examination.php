<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start_time', 'stop_time', 'date', 'course_id', 'added_by', 'school_id', 'attendance_id'];

    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function staff() {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function attendance() {
        return $this->hasOne(Attendance::class);
    }

}

