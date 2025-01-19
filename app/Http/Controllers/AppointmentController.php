<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::all(); // Fetch all doctors from the doctors table
        return view('appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_time' => 'required|date|after:now',
        ]);

        $conflict = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_time', $request->appointment_time)
            ->exists();

        if ($conflict) {
            return back()->withErrors(['appointment_time' => 'The selected time conflicts with an existing appointment.']);
        }

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => Auth::id(),
            'appointment_time' => $request->appointment_time,
        ]);

        return redirect()->route('appointments.index')->with('status', 'Appointment scheduled successfully.');
    }

    public function rescheduleView($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::all(); // Assuming you have a Doctor model to fetch all doctors
        return view('appointments.reschedule', compact('appointment', 'doctors'));
    }

    public function reschedule(Request $request, $id)
{
    $request->validate([
        'new_time' => 'required|date_format:Y-m-d\TH:i|after:now',
        'doctor_id' => 'required|exists:doctors,id',
    ]);

    $appointment = Appointment::findOrFail($id);

    $conflict = Appointment::where('doctor_id', $request->doctor_id)
        ->where('appointment_time', $request->new_time)
        ->exists();

    if ($conflict) {
        return back()->withErrors(['new_time' => 'The selected time conflicts with an existing appointment.']);
    }

    $appointment->appointment_time = $request->input('new_time');
    $appointment->doctor_id = $request->input('doctor_id');
    $appointment->save();

    return redirect()->route('appointments.index')->with('success', 'Appointment rescheduled successfully.');
}


    public function cancel($id){

        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        
        return redirect()->route('appointments.index')->with('success', 'Appointment cancelled successfully.');
    
    }

}
