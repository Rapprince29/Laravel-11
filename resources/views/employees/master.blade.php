<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'App Pegawai' )</title>
</head>

<body>
  <header>
    <h1>App Pegawai</h1>
    <!-- <h1>@yeild( 'page-title' , 'App Pegawai' )</h1> Kode ini tidak bekerja semestinya jadi saya komen agar tidak muncul  -->
    <nav>
      <ul>
        <li><a href="{{ url('/employees') }}"> Employee</a></li>
        <li><a href="{{ url('/department') }}">Department</a></li>
        <li><a href="{{ url('/attendance') }}">Attendance</a></li>
        <li><a href="{{ url('/report') }}">Report</a></li>
        <li><a href="{{ url('/settings') }}">Settings</a></li>
      </ul>
    </nav>
  </header>
  <main>
    @yield('content')
  </main>
  <footer>
    <p>&copy; {{ date('Y') }} App Pegawai</p>
  </footer>
</body>

</html>