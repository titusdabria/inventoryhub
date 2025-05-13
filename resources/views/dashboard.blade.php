@extends('layout')

@php
    view()->share('page_title', 'Dashboard');
@endphp

@section('content')
<div class="container-fluid">
    {{-- Felső stat kártyák --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Total Products</h6>
                    <p class="fs-4 fw-semibold">124</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Pending Orders</h6>
                    <p class="fs-4 fw-semibold">7</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Monthly Revenue</h6>
                    <p class="fs-4 fw-semibold">$3,250</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Low Stock Items</h6>
                    <p class="fs-4 fw-semibold text-warning">3</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Alsó rész: két oszlop --}}
    <div class="row g-3 mb-4">
        {{-- Legutóbbi rendelések --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    Latest Orders
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">#ORD-1001 - John Doe - $120</li>
                        <li class="list-group-item">#ORD-1002 - Alice Smith - $85</li>
                        <li class="list-group-item">#ORD-1003 - Bob Johnson - $60</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Készlethiányos termékek --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    Low Stock Products
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Product A – 2 left</li>
                        <li class="list-group-item">Product B – 1 left</li>
                        <li class="list-group-item">Product C – 0 left</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title">Recent Activities</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>2025.01.01 12:01:31</b> John added Product Z</li>
                        <li class="list-group-item"><b>2025.01.02 09:31:02</b> Alice updated Order #1005</li>
                        <li class="list-group-item"><b>2025.01.02 10:01:00</b> George updated Product A</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title">Top-Selling Products</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Product X - 124 sold</li>
                        <li class="list-group-item">Product Y - 98 sold</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title">Monthly Revenue</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">January: $1,200</li>
                        <li class="list-group-item">February: $1,700</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
