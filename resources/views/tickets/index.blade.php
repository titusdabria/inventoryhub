@extends('layouts/layout')

@php
view()->share('page_title', 'Tickets'); 
@endphp

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>All Tickets</h4>
    @if(auth()->user()->role === 'staff')
        <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Create Ticket</a>
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