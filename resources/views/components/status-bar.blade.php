@if (session('success') || session('error'))
    <div id="status-bar" class="fixed top-0 left-0 w-full py-2 text-center text-white transition-opacity duration-500"
        style="background-color: {{ session('success') ? '#28a745' : '#dc3545' }};">

        {{ session('success') ?? session('error') }}
    </div>

    <script>
        setTimeout(() => {
            let bar = document.getElementById('status-bar');
            if (bar) {
                bar.style.opacity = '0';
                setTimeout(() => bar.remove(), 500);
            }
        }, 3000);
    </script>
@endif
