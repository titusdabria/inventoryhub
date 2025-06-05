@extends('layouts/layout')
@php
    view()->share('page_title', 'Settings');
@endphp
@section('content')
<div class="container">
    <h4 class="mb-4">User Settings</h4>

    <div class="card mb-4">
        <div class="card-body">
            <h6>Name: <strong>Titus Dabria</strong></h6>
            <h6>Role: <span class="badge bg-primary">Admin</span></h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-center">
            <span>Theme Mode</span>
            <button id="themeToggle" class="btn btn-sm btn-outline-secondary">
                <span id="themeIcon">🌙</span> <span id="themeText">Dark Mode</span>
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('themeToggle');
        if (!btn) return;

        const isDark = document.body.classList.contains('dark-mode');
        updateThemeButton(isDark);

        btn.addEventListener('click', () => {
            const currentlyDark = document.body.classList.contains('dark-mode');
            const newTheme = currentlyDark ? 'light-mode' : 'dark-mode';

            document.body.classList.remove('dark-mode', 'light-mode');
            document.body.classList.add(newTheme);
            updateThemeButton(!currentlyDark);

            fetch('/theme/' + newTheme, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        });

        function updateThemeButton(isDark) {
            const icon = document.getElementById('themeIcon');
            const text = document.getElementById('themeText');
            if (icon && text) {
                icon.textContent = isDark ? '☀️' : '🌙';
                text.textContent = isDark ? 'Light Mode' : 'Dark Mode';
            }
        }
    });
</script>
@endsection
