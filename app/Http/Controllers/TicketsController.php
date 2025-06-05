<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TicketsController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->role === 'admin'){
            $tickets = Ticket::with('messages.user')->latest()->get();
        }else{
            $tickets = $user->tickets()->with('messages.user')->latest()->get();
        }
        return view('tickets.index', compact('tickets'));
    }
    //Creating a new ticket
    public function create(){
    if (auth()->user()->role !== 'staff') {
        abort(403); // vagy redirect
        }

        return view('tickets.create');
    }
    //Storing the new ticket
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'message' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'status' => 'open',
            'created_by' => Auth::id(),
        ]);

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);
    }
    //Return tickets
    public function show($id){
        $ticket = Ticket::with('messages.user')->findOrFail($id);
        return view('tickets.show',compact('ticket'));
    }
    //Reply ticket
    public function reply(Request $request,$id){
        
        $ticket = Ticket::findOrFail($id);
        $request->validate([
            'message'=>'required|string',
        ]);
        TicketMessage::create([
            'ticket_id'=>$ticket->id,
            'user_id'=>Auth::id(),
            'message'=>$request->message,    
        ]);
        return back()->with('success','Replied to this ticket!');
    }
    //Closing ticket
    public function close($id){
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'closed';
        $ticket->closed_by = Auth::id();
        $ticket->save();
        return redirect()->route('tickets.index')->with('success', 'Ticket closed.');
    }
}
