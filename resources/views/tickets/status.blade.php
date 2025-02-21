@extends('layout')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Check Ticket Status</h2>

        <form action="{{ url('/ticket/status') }}" method="POST">
            @csrf
            <label class="block mb-2">Enter Reference Number</label>
            <input type="text" name="reference_number" class="w-full border p-2 rounded mb-4" required>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Check Status</button>
        </form>
    </div>
@endsection 