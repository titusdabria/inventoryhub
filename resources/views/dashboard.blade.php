@php
    $page_title = 'Dashboard';
    view()->share('page_title', $page_title);
@endphp

@extends('layout')

@section('title', $page_title)

@section('content')
<div class="container-fluid">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-6">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Pending Orders</h5>
                    <p class="card-text display-6">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Monthly Revenue</h5>
                    <p class="card-text display-6">$0</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
