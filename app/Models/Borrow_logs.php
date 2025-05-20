<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow_logs extends Model
{
    protected $table = "borrowed_logs";

    protected $fillable = [
        'student_id',
        'book_id'
    ];

    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
