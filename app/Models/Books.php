<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = "books";
    protected $fillable = [
        'title',
        'author',
        'quantity'
    ];

    public function borrowBooks()
    {
        return $this->hasMany(BorrowBooks::class, 'book_id');
    }

    public function returnLogs()
    {
        return $this->hasMany(Return_logs::class, 'book_id');
    }

    public function borrowLogs()
    {
        return $this->hasMany(Return_logs::class, 'book_id');
    }
}
