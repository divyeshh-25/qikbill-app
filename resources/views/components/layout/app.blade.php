<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="QikBill POS is a powerful Bootstrap based Inventory Management Admin Template designed for businesses, offering seamless invoicing, project tracking, and estimates.">
    <meta name="keywords"
        content="inventory management, admin dashboard, bootstrap template, invoicing, estimates, business management, responsive admin, POS system">
    <meta name="author" content="Divyesh Technologies">
    <meta name="robots" content="index, follow">
    <title>{{ $title ?? 'QikBill POS - Your Bill Mitra' }}</title>
    <x-layout.css />
    @stack('styles')

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <x-layout.header />
        <x-layout.sidebar />
        <div class="page-wrapper">
            {{ $slot }}
            <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
                <p class="mb-0 text-gray-9">2014 - 2025 &copy; QikBill POS. All Right Reserved</p>
                <p>Designed &amp; Developed by <a href="javascript:void(0);" class="text-primary">Divyesh</a></p>
            </div>
        </div>
    </div>
    <x-layout.modal />
    <x-layout.toastr />
    <x-layout.script />
    <script>
        const showToast = (header, message, type = 'success') => {
            const toastContainer = document.getElementById('toastContainer');
            const toastEl = document.getElementById('toast');
            const toastHeaderContainer = document.getElementById('toastHeaderContainer');
            const toastHeader = document.getElementById('toastHeader');
            const toastMessage = document.getElementById('toastMessage');
            toastHeader.textContent = header;
            toastMessage.textContent = message;
            toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning', 'bg-info');
            switch (type) {
                case 'success':
                    toastEl.classList.add('bg-success', 'text-fixed-white');
                    toastHeaderContainer.classList.add('bg-success');
                    break;
                case 'error':
                    toastEl.classList.add('bg-danger', 'text-fixed-white');
                    toastHeaderContainer.classList.add('bg-danger');
                    break;
                case 'warning':
                    toastEl.classList.add('bg-warning', 'text-fixed-white');
                    toastHeaderContainer.classList.add('bg-warning');
                    break;
                case 'info':
                default:
                    toastEl.classList.add('bg-info', 'text-fixed-white');
                    toastHeaderContainer.classList.add('bg-info');
                    break;
            }
            // Show the toast
            const toast = new bootstrap.Toast(toastEl)
            toast.show()
        }
    </script>
    @stack('scripts')
</body>
</html>
