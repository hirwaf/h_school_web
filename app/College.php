<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = [
        'name', 'acronym', 'location', 'capacity'
    ];

    public function students() {
        return $this->hasMany(Student::class,'college_id', 'id');
    }

    public function departments() {
        return $this->hasMany(Department::class, 'college_id', 'id');
    }



}
