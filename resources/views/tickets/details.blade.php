@extends('layout')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Ticket Details</h2>

        <p><strong>Reference:</strong> {{ $ticket->reference_number }}</p>
        <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
        <p><strong>Problem:</strong> {{ $ticket->problem_description }}</p>

        <h2 class="text-lg font-bold mt-4">Replies</h2>


        @foreach ($ticket->replies as $reply)
            <div class="bg-gray-100 p-3 rounded my-2">
                <p>{{ $reply->message }}</p>
                <p class="text-sm text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
        <a href="{{ url('/ticket/' . $ticket->id) }}"class="bg-blue-500 text-white px-3 py-1 rounded">Delete</a>
    </div>
@endsection
