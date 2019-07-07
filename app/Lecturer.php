<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'names', 'telephone', 'email', 'gender', 'nationality', 'national_id', 'passport_number', 'password', 'status'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'hod', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'courses_lecturers_pivot','lecturer_id', 'course_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'lecturer_id', 'id');
    }

}
