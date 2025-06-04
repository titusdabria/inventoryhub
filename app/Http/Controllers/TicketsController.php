<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
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
        return view('tickets', compact('tickets'));
    }
    //Creating a new ticket
    public function create(){
        return view('tickets');
    }
    //Storing the new ticket
    public function store(Request $request){
        $request->vakudate([
            'title'=>'required|string|max:255',
            'priority'=>'required|in:low,medium,high',
            'message'=>'required|string',
        ]);
        $ticket = Ticket::create([
            'title'=>$request->title,
            'priority'=>$request->priority,
            'status'=> 'open',
            'created_by'=>Auth::id(),
        ]);
        return Redirect::route('tickets')->with('success','Ticket successfully created!');
    }
    //Return tickets
    public function show($id){
        $ticket = Ticket::with('messages.user')->findOrFail($id);
        return view('tickets',compact('ticket'));
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
        $ticket->update([
            'status'=>'closed',
            'closed_by'=>Auth::id(),
        ]);
        return back()->with('success','You closed this ticket!');
    }
}
