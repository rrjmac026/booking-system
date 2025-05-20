<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Return_logs;
use App\Models\Borrow_logs;
use App\Models\BorrowBooks;
use App\Models\Students;
use App\Models\Books;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $studentCount = Students::count();
        $bookCount = Books::count();
        $borrowCount = Borrow_logs::count();
        $returnCount = Return_logs::count();
        $borrowLogs = Borrow_logs::with('student', 'book')->get();
        $returnLogs = Return_logs::with('student', 'book')->get();
        $borrowBooks = BorrowBooks::with('student', 'book')->get();
        return view("tenant.admin.dashboard", compact('borrowLogs', 'returnLogs', 'borrowBooks', 'studentCount', 'bookCount', 'borrowCount', 'returnCount'));
    }
}