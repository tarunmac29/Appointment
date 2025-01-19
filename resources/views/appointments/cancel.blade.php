<style>
    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
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
    textarea {
        width: 100%;
        height: 100px;
        padding: 10px;
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
</style>

<form action="{{ route('appointments.cancel', $appointment) }}" method="POST">
    @csrf
    @method('DELETE')
    <div>
        <label for="cancellation_reason">Cancellation Reason</label>
        <textarea id="cancellation_reason" name="cancellation_reason" required></textarea>
    </div>
    <button type="submit">Cancel Appointment</button>
</form>
