@extends('layout')

@php
    view()->share('page_title', 'Products');
@endphp

@section('content')
<div class="container-fluid">
    {{-- Fejléc: Kereső és szűrő --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Search products...">
        </div>
        <div class="col-md-4">
            <select class="form-select">
                <option selected>All Categories</option>
                <option>Electronics</option>
                <option>Books</option>
                <option>Clothing</option>
            </select>
        </div>
        <div class="col-md-4 text-end">
            <div class="btn-group" role="group">
                <button id="gridViewBtn" class="btn btn-outline-primary active"><i class="bi bi-grid"></i> Grid</button>
                <button id="listViewBtn" class="btn btn-outline-primary"><i class="bi bi-list"></i> List</button>
            </div>
        </div>
    </div>

    {{-- Termékek: Grid nézet (alapértelmezett) --}}
    <div id="gridView" class="row gy-4 mb-5 fade transition-fast show">
        @foreach ([
            ['name' => 'Wireless Mouse', 'category' => 'Electronics', 'price' => 25, 'stock' => 10],
            ['name' => 'Cotton T-Shirt', 'category' => 'Clothing', 'price' => 15, 'stock' => 5],
            ['name' => 'Laravel Book', 'category' => 'Books', 'price' => 40, 'stock' => 2],
        ] as $product)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text text-muted">Category: {{ $product['category'] }}</p>
                    <p class="card-text">Price: ${{ $product['price'] }}</p>
                    <p class="card-text">Stock: {{ $product['stock'] }} pcs</p>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-secondary me-2">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Termékek: Lista nézet --}}
    <div id="listView" class="card shadow-sm d-none fade transition-fast">
        <div class="card-header">
            <h5 class="mb-0">Product List View</h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0 table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                        ['name' => 'Wireless Mouse', 'category' => 'Electronics', 'price' => 25, 'stock' => 10],
                        ['name' => 'Cotton T-Shirt', 'category' => 'Clothing', 'price' => 15, 'stock' => 5],
                        ['name' => 'Laravel Book', 'category' => 'Books', 'price' => 40, 'stock' => 2],
                    ] as $product)
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['category'] }}</td>
                        <td>${{ $product['price'] }}</td>
                        <td>{{ $product['stock'] }} pcs</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-secondary me-2">Edit</button>
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
        const gridBtn = document.getElementById('gridViewBtn');
        const listBtn = document.getElementById('listViewBtn');
        const gridView = document.getElementById('gridView');
        const listView = document.getElementById('listView');

        gridBtn.addEventListener('click', function () {
            gridView.classList.remove('d-none');
            listView.classList.add('d-none');
            setTimeout(() => {
                gridView.classList.add('show');
                listView.classList.remove('show');
            }, 10);
            gridBtn.classList.add('active');
            listBtn.classList.remove('active');
        });

        listBtn.addEventListener('click', function () {
            listView.classList.remove('d-none');
            gridView.classList.add('d-none');
            setTimeout(() => {
                listView.classList.add('show');
                gridView.classList.remove('show');
            }, 10);
            listBtn.classList.add('active');
            gridBtn.classList.remove('active');
        });
    });
</script>
<style>
    .fade {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
    .fade.show {
        opacity: 1;
    }
    .transition-fast {
        transition: opacity 0.5s ease-in-out;
    }
</style>
@endsection
