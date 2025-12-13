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
    {{ $slot }}
    <x-layout.script />

    <x-layout.toastr />

    <x-layout.modal />

    @stack('scripts')
</body>

</html>