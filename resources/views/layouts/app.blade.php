<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedMate - Red Cross Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-redmate { background-color: #D32F2F; }
        .text-redmate { color: #D32F2F; }
        .btn-yellow { background-color: #FFC107; color: #000; font-weight: bold; }
        .btn-yellow:hover { background-color: #e0a800; }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-redmate shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
                🔴 RedMate
            </a>
            <div class="d-flex">
                <a href="/login" class="btn btn-outline-light me-2">Sign In</a>
                <a href="/register" class="btn btn-yellow">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-3 bg-white border-top mt-5">
        <p class="mb-0 text-muted">&copy; 2026 RedMate - Digital Red Cross Platform</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>