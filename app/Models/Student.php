<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'matric', 'level', 'image', 'school_id'];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }

    public function attendances() {
        return $this->belongsToMany(Attendance::class, 'student_attendance');
    }
}
