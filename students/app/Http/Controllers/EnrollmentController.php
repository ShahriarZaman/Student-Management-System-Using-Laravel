<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Batch;
use App\Models\Student;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $enrollments = Enrollment::all(); 
        return view('enrollments.index')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $batches = Batch::pluck('name', 'id');
    $students = Student::pluck('name', 'id');

    return view('enrollments.create', compact('batches', 'students'));
}


    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Convert the date to 'YYYY-MM-DD' format
        $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('join_date'))->format('Y-m-d');

        $input = $request->all();
        $input['join_date'] = $startDate; // Use $startDate

        enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'Enrollment Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollment = Enrollment::find($id); 
        return view('enrollments.show')->with('enrollment', $enrollment);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollment = Enrollment::find($id); 
        return view('enrollments.edit')->with('enrollment', $enrollment); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollment = Enrollment::find($id); 
        $input = $request->all();
        $enrollment->update($input);
        return redirect('enrollments')->with('flash_message', 'Enrollment Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id); 
        return redirect('enrollments')->with('flash_message', 'Enrollment Deleted!'); 
    }
}
