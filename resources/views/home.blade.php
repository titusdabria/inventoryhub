@php
    $page_title = 'Home';
    view()->share('page_title', $page_title);
@endphp
@extends('layout')

@section('title', 'Home')

@section('page_title', 'Welcome')

@section('content')
    <h2>Welcome to InventoryHUB</h2>
    <p>This project is part of a personal career reboot journey.</p>
    <p><strong>Status:</strong> Actively being built and improved 🚀</p>
@endsection
