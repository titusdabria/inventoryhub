@extends('layout')

@php
    view()->share('page_title', 'Reports');
@endphp

@section('content')
<div class="container-fluid">
    {{-- Összesítő statisztikák --}}
    <div class="row mb-4 gy-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Total Revenue (This Month)</h6>
                    <p class="fs-4 fw-semibold">$3,250</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Total Orders</h6>
                    <p class="fs-4 fw-semibold">154</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Top Product</h6>
                    <p class="fs-5 fw-semibold">Wireless Mouse (32 units)</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Havi bevétel grafikon placeholder --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h5 class="mb-0">Monthly Revenue Chart</h5>
        </div>
        <div class="card-body">
            <div class="fst-italic text-center py-5">
                <em>Chart placeholder – coming soon</em>
            </div>
        </div>
    </div>

    {{-- Legtöbb eladott termékek listája --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Top Selling Products</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Wireless Mouse – 32 sales</li>
                <li class="list-group-item">Cotton T-Shirt – 27 sales</li>
                <li class="list-group-item">Laravel Book – 21 sales</li>
            </ul>
        </div>
    </div>
</div>
@endsection
