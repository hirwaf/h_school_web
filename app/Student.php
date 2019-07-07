<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'std_id', 'surname', 'other_name', 'date_of_birth', 'gender', 'marital_status', 'mother_names', 'father_names',
        'guardian_names', 'nationality', 'country_residence', 'national_id', 'passport_number', 'index_number_s_6',
        'previous_education', 'qualification_obtained', 'year_of_completion', 'physics_disability', 'next_kin_phone_number',
        'status', 'email', 'telephone', 'password', 'college_id', 'department_id'
    ];

    protected $attributes = [
        'year_of_study'
    ];

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'std_id', 'std_id');
    }

    public function registered()
    {
        return $this->hasMany(RegisteredStudent::class, 'std_id', 'std_id');
    }

    public function attendances()
    {
        return $this->hasMany(CourseAttendance::class,'std_id', 'std_id');
    }

    public function getYearOfStudyAttribute()
    {
        $status = $this->status;
        $registered = $this->registered()->orderBy('year_of_study', 'desc')->first();
        if ($registered && ($status == 'student' || $status == 'alumni'))
            return $registered->year_of_study;

        return 1;
    }
}
