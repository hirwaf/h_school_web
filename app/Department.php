<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'code', 'hod', 'college_id'
    ];

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function hod()
    {
        return $this->belongsTo(Lecturer::class, 'hod', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'department_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(CourseAttendance::class,'department_id', 'id');
    }

}
