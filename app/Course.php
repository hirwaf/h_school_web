<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'code', 'department_id', 'credit', 'hours', 'year_of_study', 'semester'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id', 'id');
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class,'courses_lecturers_pivot', 'course_id', 'lecturer_id');
    }

    public function attendances()
    {
        return $this->hasMany(CourseAttendance::class,'course_id', 'id');
    }

}
