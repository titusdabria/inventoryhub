@extends('layouts/layout')
@php
    view()->share('page_title', 'Create Ticket');
@endphp

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Create New Ticket</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('tickets.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select name="priority" class="form-select" required>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Ticket</button>
            </form>
        </div>
    </div>
</div>
@endsection