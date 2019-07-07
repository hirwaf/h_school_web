<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredStudent extends Model
{
    protected $table = "academic_registered";

    protected $fillable = [
        'std_id', 'academic_year', 'year_of_study'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'std_id', 'std_id');
    }

}
