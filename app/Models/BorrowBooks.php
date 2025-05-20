<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowBooks extends Model
{
    protected $table = "borrow_books";

    protected $fillable = [
        'student_id',
        'book_id',
        'due_date'
    ];

    protected $casts = [
        'due_date' => 'datetime',
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
