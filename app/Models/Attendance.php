<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function students() {
        return $this->belongsToMany(Student::class, 'student_attendace');
    }

    public function examination() {
        return $this->hasOne(Examination::class);
    }

}
