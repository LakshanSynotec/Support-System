@extends('layout')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Ticket Details</h2>

        <p><strong>Customer:</strong> {{ $ticket->customer_name }}</p>
        <p><strong>Email:</strong> {{ $ticket->email }}</p>
        <p><strong>Phone:</strong> {{ $ticket->phone }}</p>
        <p><strong>Issue:</strong> {{ $ticket->problem_description }}</p>

        <h3 class="text-lg font-bold mt-4">Replies</h3>
        @foreach ($ticket->replies as $reply)
            <div class="bg-gray-100 p-3 rounded my-2">
                <p>{{ $reply->message }}</p>
            </div>
        @endforeach

        <form action="{{ url('/ticket/' . $ticket->id . '/reply') }}" method="POST">
            @csrf
            <label class="block mb-2">Reply</label>
            <textarea name="message" class="w-full border p-2 rounded mb-4" required></textarea>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Send Reply</button>
        </form>
    </div>
@endsection