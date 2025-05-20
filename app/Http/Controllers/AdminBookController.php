<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Books;
use Carbon\Carbon;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        $books->each(function ($books) {
            $books->formatted_timestamp = Carbon::parse($books->created_at)->format('g:iA m/d/Y');
        });
        return view('tenant.admin.books', compact('books'));
    }

    public function store(BookRequest $request)
    {
        try {
            Books::create([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'quantity' => $request->input('quantity'),
            ]);

            return redirect()->route('admin.book.index')->with('success', 'Book added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.book.index')->with('error', 'An error occurred while adding the Book: ' . $e->getMessage());
        }
    }

    public function update(BookRequest $request)
    {
        try {
            $book = Books::findOrFail($request->id);

            $book->update([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'quantity' => $request->input('quantity'),
            ]);

            return redirect()->route('admin.book.index')->with('success', 'Book updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.book.index')->with('error', 'An error occurred while updating the Book: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $book = Books::findOrFail($request->id);
            $book->delete();

            return redirect()->route('admin.book.index')->with('success', 'Book deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.book.index')->with('error', 'An error occurred while deleting the Book: ' . $e->getMessage());
        }
    }
}
