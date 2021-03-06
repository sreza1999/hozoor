<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'grade_id',
        'first_name',
        'last_name',
        'dad_name',
        'personal_code',
        'birth_day',
        'entry_date',
        'manager_id',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function manager()
    {
        return $this->belongsTo('App\Manager');
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'userable');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance', 'student_id');
    }

}
