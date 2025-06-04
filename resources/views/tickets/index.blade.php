@extends('layout')

@php
view()->share('page_title', 'Tickets'); 
@endphp

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>All Tickets</h4>
    @if(auth()->user()->role === 'STAFF')
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">New Ticket</a>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0 table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ ucfirst($ticket->priority) }}</td>
                        <td>{{ ucfirst($ticket->status) }}</td>
                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                        <td class="text-end">
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

---

2. resources/views/tickets/create.blade.php

@extends('layout')

@php view()->share('page_title', 'New Ticket'); @endphp

@section('content')
<h4 class="mb-4">Create New Ticket</h4>

<form action="{{ route('tickets.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Priority</label>
        <select name="priority" class="form-select" required>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea name="message" rows="5" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

---

3. resources/views/tickets/show.blade.php

@extends('layout')

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
