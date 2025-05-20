<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Return_logs;
use App\Models\BorrowBooks;
use Illuminate\Support\Facades\Auth;

class UserReturnController extends Controller
{
    public function index(){
        $studentId = Auth::guard('students')->id();
        $borrowedBooks = BorrowBooks::where('student_id', $studentId)->get();
        $returnHistories = Return_logs::where('student_id', $studentId)->get();

        return view('tenant.user.returnBooks', compact('borrowedBooks', 'returnHistories'));
    }

    public function destroy(Request $request)
    {
        try {
            $studentId = Auth::guard('students')->id();

            $borrowedBook = BorrowBooks::where('id', $request->book_id)
                ->where('student_id', $studentId)
                ->first();

            if (!$borrowedBook) {
                return redirect()->back()->withErrors('Borrowed book not found.');
            }

            Return_logs::create([
                'student_id' => $studentId,
                'book_id' => $borrowedBook->book_id,
            ]);

            $borrowedBook->delete();

            return redirect()->route('user.return.index')->with('success', 'Book returned successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while processing the return: ' . $e->getMessage());
        }
    }
}
