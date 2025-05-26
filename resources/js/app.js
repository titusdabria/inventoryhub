import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('themeToggle');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            fetch('/toggle-theme', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                },
            })
            .then(res => res.json())
            .then(data => {
                document.body.className = data.theme;
            });
        });
    }
});