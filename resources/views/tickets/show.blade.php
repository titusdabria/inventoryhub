@extends('layouts/layout')

@php view()->share('page_title', 'Ticket #'.$ticket->id); @endphp

@section('content')

<h4 class="mb-3">{{ $ticket->title }}</h4>
<p><strong>Status:</strong> {{ ucfirst($ticket->status) }} | <strong>Priority:</strong> {{ ucfirst($ticket->priority) }}</p>
<hr>
<div class="mb-4">
    @foreach ($ticket->messages as $message)
        <div class="mb-3">
            <strong>{{ $message->user->name }}:</strong>
            <p class="mb-1">{{ $message->message }}</p>
            <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
        </div>
    @endforeach
</div>
@if($ticket->status === 'open')
    <form action="{{ route('tickets.reply', $ticket->id) }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Reply</label>
            <textarea name="message" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Send Reply</button>
    </form>
    @if(auth()->user()->role === 'ADMIN')
        <form action="{{ route('tickets.close', $ticket->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Close Ticket</button>
        </form>
    @endif
@endif
@endsection