<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'App Pegawai')</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    footer {
      margin-top: auto;
      background-color: #0d6efd;
      color: white;
      text-align: center;
      padding: 12px 0;
    }

    .navbar-nav .nav-link.active {
      font-weight: 600;
      color: #fff !important;
    }

    .navbar {
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    main {
      padding: 2rem 0;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ url('/') }}">
        <i class="bi bi-people-fill"></i> App Pegawai
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('employees*') ? 'active' : '' }}" href="{{ url('/employees') }}">
              <i class="bi bi-person-vcard"></i> Pegawai
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('department*') ? 'active' : '' }}" href="{{ url('/department') }}">
              <i class="bi bi-diagram-3"></i> Departemen
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('attendance*') ? 'active' : '' }}" href="{{ url('/attendance') }}">
              <i class="bi bi-calendar-check"></i> Absensi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('report*') ? 'active' : '' }}" href="{{ url('/report') }}">
              <i class="bi bi-bar-chart"></i> Laporan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('settings*') ? 'active' : '' }}" href="{{ url('/settings') }}">
              <i class="bi bi-gear"></i> Pengaturan
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    <p class="mb-0">&copy; {{ date('Y') }} App Pegawai — Dibuat dengan ❤️ oleh Tim IT</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
