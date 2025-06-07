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
        <table id="ordersTable" class="table {{session('theme' === 'dark'?'table-dark':'table-light')}}">
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
                        <td>
                            @php 
                            $priorityColor = match($ticket->priority){
                                'low' => 'info',
                                'medium' => 'primary',
                                'high' => 'warning',
                                default => 'secondary'
                            };
                            @endphp
                            <span class="badge bg-{{$priorityColor}}">{{ucfirst($ticket->priority)}}</span>
                        </td>
                        <td>
                            @if($ticket->status === 'open')
                                <span class="badge bg-success text-white">Opened</span>
                            @else
                                <span class="badge bg-danger text-white">Closed</span>
                            @endif
                        </td>
                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                        <td class="text-end">
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-outline-light">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection