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
}
