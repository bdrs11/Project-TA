<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KonPoMa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .hero-section {
            padding: 0;
            margin: 0;
        }

        /* Navbar hitam ke abu-abu */
        .navbar-custom {
            background-color: #101010;
        }

        .navbar-custom .navbar-nav .nav-link,
        .navbar-custom .navbar-brand {
            color: #eeeeee;
        }

        .navbar-custom .navbar-brand:hover,
        .navbar-custom .nav-link:hover {
            color: #ffffff;
        }

        .navbar-custom .btn-outline-primary {
            border-color: #cccccc;
            color: #cccccc;
        }

        .navbar-custom .btn-outline-primary:hover {
            background-color: #ffffff;
            color: #1f1f1f;
        }

        footer {
            background-color: #f1f1f1;
        }

        .pos-img {
            width: 100%;
            height: auto;
            display: block;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span>KonPoMa</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary ms-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link btn btn-outline-primary ms-2" href="{{ route('register') }}">Register</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section Full Image -->
    <div class="hero-section">
        <img src="{{ asset('landing.png') }}" alt="POS System" class="pos-img img-fluid">
    </div>

    <!-- Footer -->
    <footer class="py-3 text-center">
        <div class="container">
            <p class="mb-0 text-muted">© {{ date('Y') }} KonPoMa. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
