<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Reschedule Appointment</div>
                <div class="card-body">
                    <form action="{{ route('appointments.reschedule', $appointment->id) }}" method="POST" class="form-group">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="appointment_time">New Appointment Time</label>
                            <input type="datetime-local" id="appointment_time" name="new_time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="doctor">Select Doctor</label>
                            <select id="doctor" name="doctor_id" class="form-control" required>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Reschedule</button>
                        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
