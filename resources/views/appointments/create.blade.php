<style>
    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }
    div {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    select, input[type="datetime-local"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #0056b3;
    }
    .back-button {
        background-color: #6c757d;
    }
    .back-button:hover {
        background-color: #5a6268;
    }
</style>

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <div>
        <label for="doctor_id">Select Doctor</label>
        <select id="doctor_id" name="doctor_id" required>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="appointment_time">Appointment Time</label>
        <input type="datetime-local" id="appointment_time" name="appointment_time" required>
    </div>
    <button type="submit">Schedule Appointment</button>
    <button type="button" class="back-button" onclick="window.history.back();">Back</button>
</form>
