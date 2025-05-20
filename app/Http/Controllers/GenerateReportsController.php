<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Return_logs;
use App\Models\Borrow_logs;
use App\Models\BorrowBooks;
use App\Models\Students;
use App\Models\Books;
use FPDF;

class GenerateReportsController extends Controller
{
    public function generateTenant()
    {
        $studentsCount = Students::count();
        $booksCount = Books::count();
        $borrowedBooksCount = Borrow_logs::count();
        $returnedBooksCount = Return_logs::count();

        $students = Students::all();
        $books = Books::all();
        $borrow_logs = Borrow_logs::all();
        $return_logs = Return_logs::all();

        

        // Create a new PDF instance
        $pdf = new FPDF();
        $pdf->AddPage();

        // Display the counts
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'Number of Students: ' . $studentsCount);
        $pdf->Ln(10);
        $pdf->Cell(40, 10, 'Number of Books: ' . $booksCount);
        $pdf->Ln(10);
        $pdf->Cell(40, 10, 'Number of Borrowed Books: ' . $borrowedBooksCount);
        $pdf->Ln(10);
        $pdf->Cell(40, 10, 'Number of Returned Books: ' . $returnedBooksCount);
        $pdf->Ln(10);

        // student table
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(40, 10, 'List of Students:');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 10, 'Student ID', 1);
        $pdf->Cell(50, 10, 'Name', 1);
        $pdf->Cell(60, 10, 'Email', 1);
        $pdf->Cell(30, 10, 'date_registered', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 10);
        foreach ($students as $student) {
            $dateRegistered = $student->created_at ? $student->created_at->format('Y-m-d') : 'N/A';
            $pdf->Cell(30, 10, $student->student_id, 1);
            $pdf->Cell(50, 10, $student->name, 1);
            $pdf->Cell(60, 10, $student->email, 1);
            $pdf->Cell(30, 10, $dateRegistered, 1);
            $pdf->Ln();
        }

        $pdf->Ln(10);

        // books table
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(40, 10, 'List of Books:');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 10, 'Book ID', 1);
        $pdf->Cell(60, 10, 'Title', 1);
        $pdf->Cell(50, 10, 'Author', 1);
        $pdf->Cell(30, 10, 'date_registered', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 10);
        foreach ($books as $book) {
            $dateRegistered = $book->created_at ? $book->created_at->format('Y-m-d') : 'N/A';
            $pdf->Cell(30, 10, $book->id, 1);
            $pdf->Cell(60, 10, $book->title, 1);
            $pdf->Cell(50, 10, $book->author, 1);
            $pdf->Cell(30, 10, $dateRegistered, 1);
            $pdf->Ln();
        }

        $pdf->Ln(10);

        //borrow logs
        $pdf->Cell(40, 10, 'List of Books Borrowed:');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(45);
        $pdf->Cell(20, 10, 'id', 1);
        $pdf->Cell(20, 10, 'book_id', 1);
        $pdf->Cell(50, 10, 'student_id', 1);
        $pdf->Cell(30, 10, 'date_registered', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 10);
        foreach ($borrow_logs as $borrow_log) {
            $dateRegistered = $borrow_log->created_at ? $borrow_log->created_at->format('Y-m-d') : 'N/A';
            $pdf->SetX(45);
            $pdf->Cell(20, 10, $borrow_log->id, 1);
            $pdf->Cell(20, 10, $borrow_log->book_id, 1);
            $pdf->Cell(50, 10, $borrow_log->student->student_id, 1);
            $pdf->Cell(30, 10, $dateRegistered, 1);
            $pdf->Ln();
        }
        
        $pdf->Ln(10);

        // Return logs
        $pdf->Cell(40, 10, 'List of Books Returned:');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(45);
        $pdf->Cell(20, 10, 'id', 1);
        $pdf->Cell(20, 10, 'book_id', 1);
        $pdf->Cell(50, 10, 'student_id', 1);
        $pdf->Cell(30, 10, 'date_returned', 1); // Optional: you can keep the label as 'date_registered' if preferred
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 10);
        foreach ($return_logs as $return_log) {
            $dateReturned = $return_log->created_at ? $return_log->created_at->format('Y-m-d') : 'N/A';
            $pdf->SetX(45);
            $pdf->Cell(20, 10, $return_log->id, 1);
            $pdf->Cell(20, 10, $return_log->book_id, 1);
            $pdf->Cell(50, 10, $return_log->student->student_id, 1);
            $pdf->Cell(30, 10, $dateReturned, 1);
            $pdf->Ln();
        }


        // Output the PDF
        $pdf->Output();
        exit;
    }
}
