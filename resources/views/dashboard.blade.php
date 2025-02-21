@extends('layout')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Support Tickets</h2>

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Reference</th>
                    <th class="border p-2">Customer</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr class="border @if($ticket->status == 'open') bg-yellow-100 @endif">
                        <td class="border p-2">{{ $ticket->reference_number }}</td>
                        <td class="border p-2">{{ $ticket->customer_name }}</td>
                        <td class="border p-2">{{ ucfirst($ticket->status) }}</td>
                        <td class="border p-2">
                            <a href="{{ url('/ticket/' . $ticket->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded">View</a>
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