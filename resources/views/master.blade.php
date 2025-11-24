<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'App Pegawai')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <style>
    :root {
      --main-purple: #4B0082;

      --dark-purple: #3A0155;

      --light-purple: #9370DB;

      --text-contrast: #E6E0F8;

      --table-stripe: #F8F4FF;

      --table-odd: #EFEAFF;

    }

    /* 🌃 Background wallpaper */
    body {
      background: url('https://i.pinimg.com/originals/02/01/1e/02011ec8554277b8c70bf22fb192123c.gif') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
    }


    .content-card {

      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(10px);

      border-radius: 18px;

      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
      padding: 2rem;
      margin-top: 1.5rem;
    }

    main {
      flex-grow: 1;
      padding: 2rem 0;
    }


    footer {
      background-color: var(--dark-purple);

      color: white;
      text-align: center;
      padding: 14px 0;
      margin-top: auto;
      font-weight: 500;
    }


    .navbar {
      background-color: var(--main-purple) !important;
      backdrop-filter: blur(6px);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
    }

    .navbar-brand {
      font-weight: 700;
    }

    .navbar-nav .nav-link.active {
      font-weight: 600;
      color: var(--text-contrast) !important;
    }

    .navbar-nav .nav-link:hover {
      color: #DDA0DD !important;

    }


    table.table {
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
    }

    thead {
      background-color: var(--main-purple);
      color: white;
    }

    tbody tr:nth-child(even) {
      background-color: var(--table-stripe);

    }

    tbody tr:nth-child(odd) {
      background-color: var(--table-odd);

    }


    tbody tr:hover {
      background-color: initial;

      transition: none;
    }


    .table-hover>tbody>tr:hover>* {
      --bs-table-accent-bg: initial !important;
    }



    .text-success {
      color: var(--main-purple) !important;

    }


    .btn-primary {
      background-color: var(--light-purple);
      border: none;
    }

    .btn-primary:hover {
      background-color: var(--main-purple);
    }


    .btn-success,
    .badge.bg-success {
      background-color: var(--light-purple) !important;
      color: white !important;

      border: none;
    }

    .btn-success:hover {
      background-color: #8A2BE2 !important;

    }


    .btn-info {
      background-color: var(--main-purple) !important;
      border: none;
    }

    .btn-info:hover {
      background-color: var(--dark-purple) !important;
    }

    .btn-warning {
      background-color: #FFD700;

      color: var(--main-purple);

      border: none;
    }

    .btn-warning:hover {
      background-color: #FFC700;
    }

    .btn-danger {
      background-color: #DC143C;

      border: none;
    }

    .btn-danger:hover {
      background-color: #B22222;

    }


    .alert-success {
      background-color: #E6E6FA;

      border: none;
      color: var(--dark-purple);
    }


    .pagination .page-link {
      color: var(--main-purple);
    }

    .pagination .page-item.active .page-link {
      background-color: var(--main-purple);
      border-color: var(--main-purple);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="{{ route('employees.index') }}">
        <i class="fa-solid fa-people-group me-1"></i> App Pegawai
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}"><i class="fa-solid fa-user"></i> Pegawai</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}"><i class="fa-solid fa-sitemap"></i> Departemen</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('positions.*') ? 'active' : '' }}" href="{{ route('positions.index') }}"><i class="fa-solid fa-briefcase"></i> Jabatan</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('attendances.*') ? 'active' : '' }}" href="{{ route('attendances.index') }}"><i class="fa-solid fa-calendar-check"></i> Absensi</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('salaries.*') ? 'active' : '' }}" href="{{ route('salaries.index') }}"><i class="fa-solid fa-wallet"></i> Gaji</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('leaves.*') ? 'active' : '' }}" href="{{ route('leaves.index') }}"><i class="fa-solid fa-plane-departure"></i> Manajemen Cuti</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    <div class="content-card">
      @yield('content')
    </div>
  </main>

  <footer>
    <p class="mb-0">&copy; {{ date('Y') }} App Pegawai — Dibuat dengan 💜 oleh Developnya</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>