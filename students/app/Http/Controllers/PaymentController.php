<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments = Payment::all(); 
        return view('payments.index')->with('payments', $payments); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id'); 
        return view('payments.create', compact('enrollments')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request): RedirectResponse
{
    // Convert the date to 'YYYY-MM-DD' format
    $startDate = \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('paid_date'))->format('Y-m-d');
    
    $input = $request->all();
    $input['paid_date'] = $startDate; 
    
    Payment::create($input);
    return redirect('payments')->with('flash_message', 'Payment Added!');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $payment = Payment::find($id);
        return view('payments.show')->with('payments', $payment); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
{
    $payment = Payment::find($id);
    $enrollments = Enrollment::pluck('enroll_no', 'id');
    return view('payments.edit', compact('payment', 'enrollments'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $payment = Payment::find($id);
        $input = $request->all();
        $payment->update($input);
        return redirect('payments')->with('flash_message', 'payment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'payment Deleted!');
    }
}
