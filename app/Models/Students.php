<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Authenticatable
{
    protected $fillable = [
        'student_id',
        'name',
        'email',
        'password',
        'student',
        'course',
        'college',
        'school_year'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function borrowBooks()
    {
        return $this->hasMany(BorrowBooks::class, 'student_id');
    }

    public function returnLogs()
    {
        return $this->hasMany(Return_logs::class, 'student_id');
    }

    public function borrowLogs()
    {
        return $this->hasMany(Return_logs::class, 'student_id');
    }
}
