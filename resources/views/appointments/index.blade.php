<!-- Container Section -->
<div class="container mt-5">
    
    <!-- Bootstrap CSS Link Section -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Header Section -->
    <h1 class="mb-4">Your Appointments</h1>
    
    <p>{{ Auth::user()->name }}</p>
    
    <!-- Appointments List Section -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Appointment Time</th>
                <th scope="col">Doctor</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->appointment_time }}</td>
                    <td>Dr. {{ $appointment->doctor->name }}</td>
                    <td>
                        <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancel Appointment</button>
                        </form>
                        
                        <form action="{{ route('appointments.rescheduleView', $appointment->id) }}" method="GET" style="display:inline;">
                            <button type="submit" class="btn btn-warning">Reschedule Appointment</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create Appointment</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

</div>
