<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>KuyHijrah | {{ $title }}</title>

    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Link AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Link FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        :root {
            --bs-primary: #16a34a;
            --bs-primary-rgb: 22, 163, 74;
        }

        .btn-primary {
            background-color: #16a34a;
            border-color: #16a34a;
        }

        .btn-primary:hover {
            background-color: #12823d;
            border-color: #12823d;
        }

        .btn-outline-primary {
            color: #16a34a;
            border-color: #16a34a;
        }

        .btn-outline-primary:hover {
            background-color: #16a34a;
            color: #fff;
            border-color: #16a34a;
        }

        .text-primary {
            color: #16a34a !important;
        }

        .bg-primary {
            background-color: #16a34a !important;
        }

        .border-primary {
            border-color: #16a34a !important;
        }

        .pagination .page-link {
            color: #16a34a;
            border: 1px solid #16a34a;
        }

        .pagination .page-link:hover {
            background-color: #e1fbea;
            color: #166534;
            border-color: #16a34a;
        }

        .pagination .page-item.active .page-link {
            background-color: #16a34a;
            border-color: #16a34a;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #999;
            border-color: #ddd;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    @include('partials.navbar')

    <div class="mt-4">
        @yield('container')
    </div>
    @include('partials.chatbot')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JS AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>