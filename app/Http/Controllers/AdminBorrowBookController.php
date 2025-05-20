<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Students;
use App\Models\BorrowBooks;
use App\Models\Borrow_logs;
use Carbon\Carbon;

class AdminBorrowBookController extends Controller
{
    public function index()
    {
        $books = Books::where('quantity', '>', 0)->get();
        $students = Students::all();
        $borrowLogs = Borrow_logs::with('student', 'book')->get();

        $books->each(function ($book) {
            $borrowedCount = BorrowBooks::where('book_id', $book->id)->count();
            $book->available_quantity = $book->quantity - $borrowedCount;
            $book->formatted_timestamp = Carbon::parse($book->created_at)->format('g:iA m/d/Y');
        });

        $books = $books->filter(function ($book) {
            return $book->available_quantity > 0;
        });

        return view('tenant.admin.borrowBooks', compact('books', 'students', 'borrowLogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'selected_books' => 'required|array|min:1',
            'selected_books.*' => 'exists:books,id',
        ], [
            'student_id.required' => 'Please select a student.',
            'student_id.exists' => 'The selected student does not exist.',
            'selected_books.required' => 'Please select at least one book.',
            'selected_books.*.exists' => 'One or more selected books do not exist.',
        ]);

        try {
            $dueDate = Carbon::now()->addWeek(); 
            $studentId = $request->student_id;
            $selectedBookIds = $request->selected_books;

            foreach ($selectedBookIds as $bookId) {
                $book = Books::findOrFail($bookId);
                $borrowedCount = BorrowBooks::where('book_id', $bookId)->count();
                if ($borrowedCount >= $book->quantity) {
                    return redirect()->back()->withErrors([
                        'error' => "The book '{$book->title}' is currently out of stock."
                    ]);
                }
                $alreadyBorrowed = BorrowBooks::where('student_id', $studentId)
                                            ->where('book_id', $bookId)
                                            ->exists();
                if ($alreadyBorrowed) {
                    return redirect()->back()->withErrors([
                        'error' => "The student has already borrowed '{$book->title}'."
                    ]);
                }
                BorrowBooks::create([
                    'student_id' => $studentId,
                    'book_id' => $bookId,
                    'due_date' => $dueDate
                ]);
                Borrow_logs::create([
                    'student_id' => $studentId,
                    'book_id' => $bookId,
                ]);
            }

            return redirect()->back()->with('success', 'Books successfully borrowed by the student.');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'An unexpected error occurred. Please try again later.',
                'details' => $e->getMessage()
            ]);
        }
    }
}
