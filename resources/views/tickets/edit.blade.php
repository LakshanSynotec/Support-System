@extends('layout')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Ticket</h2>

    <form action="{{ url('/ticket/' . $ticket->id . '/update') }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2 font-semibold">Status</label>
        <select name="status" class="w-full border p-2 rounded mb-4">
            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
            <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
            <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
        </select>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Ticket</button>
        <a href="{{ url('/dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
    </form>
</div>
@endsection
