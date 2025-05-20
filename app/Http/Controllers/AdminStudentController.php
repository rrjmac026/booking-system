<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Students;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AdminStudentController extends Controller
{
    public function index(){
        $students = Students::all();
        $students->each(function ($student) {
            $student->formatted_timestamp = Carbon::parse($student->created_at)->format('g:iA m/d/Y');
        });
    
        return view('tenant.admin.students', compact('students'));
    }

    public function store(StudentRequest $request){
        $randomPassword = Str::random(10);
        try {
            Students::create([
                'student_id' => $request->student_id,
                'name' => $request->name,
                'email' => $request->email,
                'role' => "student",
                'course' => $request->course,
                'college' => $request->college,
                'school_year' => $request->school_year,
            ]);
    
            return redirect()->route('admin.student.index')->with('success', 'Student added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.student.index')->with('error', 'An error occurred while adding the student: ' . $e->getMessage());
        }
    }

    public function update(Request $request){
        try {
            $validatedData = $request->validate([
                'student_id'   => 'required|string',
                'name'         => 'required|string',
                'email'        => 'required|email',
                'school_year'  => 'required|integer',
                'course'       => 'required|string',
                'college'      => 'required|string',
            ]);

            $student = Students::findOrFail($request->id);

            $student->update($validatedData);

            return redirect()
                ->route('admin.student.index')
                ->with('success', 'Student updated successfully.');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()
                ->back()
                ->with('error', 'Student not found.');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            Log::error('Student update error: '.$e->getMessage());

            return redirect()
                ->back()
                ->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function destroy(Request $request){
        try {
            // Find the student by ID and delete it
            $student = Students::findOrFail($request->id);
            $student->delete();
    
            // Redirect with a success message
            return redirect()->route('admin.student.index')->with('success', 'Student deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If the student is not found, handle the error
            return redirect()->route('admin.student.index')->with('error', 'Student not found.');
        } catch (\Exception $e) {
            // Handle other unexpected errors
            return redirect()->route('admin.student.index')->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
