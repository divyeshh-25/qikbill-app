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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- /Main Wrapper -->
    <x-layout.script />

    <x-layout.toastr />

    <x-layout.modal />

    @stack('scripts')
</body>
</html>
