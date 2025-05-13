@extends('layout')

@php
    view()->share('page_title', 'Orders');
@endphp

@section('content')
<div class="container-fluid">
    {{-- Fejléc: Kereső és szűrő --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search orders...">
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option selected>All Statuses</option>
                <option>Pending</option>
                <option>Completed</option>
                <option>Cancelled</option>
            </select>
        </div>
    </div>

    {{-- Orders tábla --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Order List</h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0 table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                        ['id' => 'ORD-1001', 'customer' => 'John Doe', 'date' => '2025-05-01', 'status' => 'Pending', 'total' => 120],
                        ['id' => 'ORD-1002', 'customer' => 'Alice Smith', 'date' => '2025-05-02', 'status' => 'Completed', 'total' => 85],
                        ['id' => 'ORD-1003', 'customer' => 'Bob Johnson', 'date' => '2025-05-03', 'status' => 'Cancelled', 'total' => 60],
                    ] as $order)
                    <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{ $order['customer'] }}</td>
                        <td>{{ $order['date'] }}</td>
                        <td>
                            <span class="badge 
                                @if($order['status'] === 'Pending') bg-warning
                                @elseif($order['status'] === 'Completed') bg-success
                                @elseif($order['status'] === 'Cancelled') bg-danger
                                @endif">
                                {{ $order['status'] }}
                            </span>
                        </td>
                        <td>${{ $order['total'] }}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary me-2">View</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
