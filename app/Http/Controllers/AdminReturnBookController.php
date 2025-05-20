<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowBooks;
use App\Models\Return_logs;

class AdminReturnBookController extends Controller
{
    public function index()
    {
        $borrowBooks = BorrowBooks::with('student', 'book')->get();
        $returnLogs = Return_logs::with('student', 'book')->get();
        return view('tenant.admin.returnBooks', compact('borrowBooks', 'returnLogs'));
    }

    public function destroy(Request $request)
    {
        try {
            $request->validate([
                'borrowedBook_id' => 'required|exists:borrow_books,id',
            ], [
                'borrowedBook_id.required' => 'Borrowed book ID is required.',
                'borrowedBook_id.exists' => 'The borrowed book record does not exist.',
            ]);

            $borrowBook = BorrowBooks::find($request->borrowedBook_id);

            if ($borrowBook) {
                Return_logs::create([
                    'student_id' => $borrowBook->student_id,
                    'book_id' => $borrowBook->book_id,
                ]);
                $borrowBook->delete();
                return redirect()->back()->with('success', 'The borrowed book record has been deleted.');
            } else {
                return redirect()->back()->withErrors(['error' => 'Record not found for this borrowed book.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }
}
