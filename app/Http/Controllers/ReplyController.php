<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReplyController extends Controller {
    public function store(Request $request, Ticket $ticket) {
        $request->validate(['message' => 'required']);

        $reply = $ticket->replies()->create(['message' => $request->message]);

        //Mail::to($ticket->email)->send(new \App\Mail\TicketReply($ticket, $reply));

        return redirect()->back()->with('success', 'Reply sent');
    }
}
