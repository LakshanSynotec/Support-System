<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller {
    public function create() {
        return view('tickets.create');
    }

    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'problem_description' => 'required',
        ]);

        $ticket = Ticket::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'problem_description' => $request->problem_description,
            'reference_number' => Str::random(10),
        ]);

        //Mail::to($ticket->email)->send(new \App\Mail\TicketCreated($ticket));

        return redirect()->back()->with('success', "Ticket created. Reference: {$ticket->reference_number}");
    }

    public function index() {
        $tickets = Ticket::latest()->paginate(10);
        return view('dashboard', compact('tickets'));
    }

    public function show(Ticket $ticket) {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket, Request $request){
        return view('tickets.edit',compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,resolved,closed',

        ]);

        $ticket->update([
            'status' => $request->status,

        ]);

        return redirect('/ticket/' . $ticket->id)->with('success', 'Ticket updated successfully!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.create')->with('success', 'Ticket deleted successfully!');
    }


    public function status() {
        return view('tickets.status');
    }

    public function checkStatus(Request $request) {
        $ticket = Ticket::where('reference_number', $request->reference_number)->first();
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found');
        }
        return view('tickets.details', compact('ticket'));
    }
}
