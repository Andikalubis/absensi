<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #f0f4ff, #ffffff);
            min-height: 100vh;
        }

        /* Header Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #4e73df, #1cc88a);
            padding: 1rem 2rem;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 600;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #f0f4ff !important;
        }

        .content-card {
            background-color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-top: -40px;
        }

        .btn-primary {
            background: #4e73df;
            border: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #2e59d9;
        }

        table thead {
            background-color: #4e73df;
            color: white;
        }

        table tbody tr:hover {
            background-color: #f1f3ff;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="{{ route('departement.index') }}">Attendance System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" 
        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color:white;">☰</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('departement.index') }}">Departement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.index') }}">Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('attendance.index') }}">Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('attendance-history.index') }}">Log Attendance</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Content -->
<div class="container mt-5">
    <div class="content-card">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
