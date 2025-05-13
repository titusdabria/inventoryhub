@extends('layout')

@php
    view()->share('page_title', 'Orders');
@endphp

@section('content')
<div class="container-fluid">
    {{-- Fejléc: Kereső és szűrő --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <input type="text" id="orderSearch" class="form-control" placeholder="Search orders...">
        </div>
        <div class="col-md-3">
            <select id="statusFilter" class="form-select">
                <option value="all" selected>All Statuses</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    {{-- Orders tábla --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Order List</h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0 table-hover align-middle" id="ordersTable">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
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
                    <tr data-status="{{ $order['status'] }}">
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('orderSearch');
        const statusFilter = document.getElementById('statusFilter');
        const rows = document.querySelectorAll('#ordersTable tbody tr');

        function filterTable() {
            const searchValue = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;

            rows.forEach(row => {
                const customer = row.children[1].textContent.toLowerCase();
                const status = row.dataset.status;

                const matchesSearch = customer.includes(searchValue);
                const matchesStatus = statusValue === 'all' || status === statusValue;

                row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
    });
</script>
@endsection
