<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BorrowBooks;
use App\Models\Books;
use App\Models\Borrow_logs;
use Carbon\Carbon;

class UserBorrowBooksController extends Controller
{
    public function index()
    {
        $books = Books::where('quantity', '>', 0)->get();

        $books->each(function ($book) {
            $borrowedCount = BorrowBooks::where('book_id', $book->id)->count();
            $book->available_quantity = $book->quantity - $borrowedCount;
        });

        $books = $books->filter(function ($book) {
            return $book->available_quantity > 0;
        });

        $studentId = Auth::guard('students')->id();

        $borrowedBooks = BorrowBooks::with('book')
            ->where('student_id', $studentId)
            ->get();

        return view('tenant.user.borrowBooks', compact('books', 'borrowedBooks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ], [
            'book_id.exists' => 'Selected book does not exist.',
        ]);

        try {
            $studentId = Auth::guard('students')->id();
            $book_id = $request->book_id;

            $book = Books::findOrFail($book_id);

            $borrowedCount = BorrowBooks::where('book_id', $book_id)->count();

            if ($borrowedCount >= $book->quantity) {
                return redirect()->back()->withErrors(['error' => 'This book is currently out of stock.']);
            }

            $alreadyBorrowed = BorrowBooks::where('book_id', $book_id)
                                        ->where('student_id', $studentId)
                                        ->exists();

            if ($alreadyBorrowed) {
                return redirect()->back()->withErrors(['error' => 'You have already borrowed this book.']);
            }

            $dueDate = Carbon::now()->addWeek(); 

            BorrowBooks::create([
                'student_id' => $studentId,
                'book_id' => $book_id,
                'due_date' => $dueDate
            ]);

            Borrow_logs::create([
                'student_id' => $studentId,
                'book_id' => $book_id,
            ]);

            return redirect()->back()->with('success', 'Book successfully borrowed');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }
}
