<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'std_id', 'department_id', 'lecturer_id', 'message', 'seen_by'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'std_id', 'std_id');
    }


}
