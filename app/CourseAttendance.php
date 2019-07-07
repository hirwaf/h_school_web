<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseAttendance extends Model
{
    protected $table = "course_attendance";

    protected $fillable = [
        'std_id', 'course_id', 'department_id', 'tap_time', 'academic_year'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'std_id', 'std_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

}
