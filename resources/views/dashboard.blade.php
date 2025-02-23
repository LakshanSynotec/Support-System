@extends('layout')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Support Tickets</h2>

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Reference NO</th>
                    <th class="border p-2">Customer Name</th>
                    <th class="border p-2">Ticket Status</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr class="border @if($ticket->status == 'open') bg-blue-50 @endif">
                        <td class="border p-2">{{ $ticket->reference_number }}</td>
                        <td class="border p-2">{{ $ticket->customer_name }}</td>
                        <td class="border p-2">{{ ucfirst($ticket->status) }}</td>
                        <td class="border p-2   ">
                            <a href="{{ url('/ticket/' . $ticket->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded">View</a>
                            <form action="{{ url('/ticket/' . $ticket->id . '/edit') }}" method="POST">
                                <a href="{{ url('/ticket/' . $ticket->id.'/edit') }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                            </form>
                            <form action="{{ url('/ticket/' . $ticket->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded"
                                        onclick="return confirm('Are you sure you want to delete this ticket?');">
                                    Delete
                                </button>
                            </form>
                            {{-- <a href="{{ url('/ticket/' . $ticket->id.'/reply') }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded">Reply</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $tickets->links() }}
        </div>
    </div>
@endsection
