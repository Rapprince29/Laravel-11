<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pegawai</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 40px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 70%;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    th,
    td {
      padding: 12px 16px;
      text-align: left;
    }

    th {
      background-color: #2b6cb0;
      color: white;
      width: 30%;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f5f9;
    }
  </style>
</head>

<body>
  <h1>Detail Pegawai</h1>

  <table>
    <tr>
      <th>Nama Lengkap</th>
      <td>{{ $employee->nama_lengkap }}</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{ $employee->email }}</td>
    </tr>
    <tr>
      <th>Nomor Telepon</th>
      <td>{{ $employee->nomor_telepon }}</td>
    </tr>
    <tr>
      <th>Tanggal Lahir</th>
      <td>{{ $employee->tanggal_lahir }}</td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td>{{ $employee->alamat }}</td>
    </tr>
    <tr>
      <th>Tanggal Masuk</th>
      <td>{{ $employee->tanggal_masuk }}</td>
    </tr>
    <tr>
      <th>Status</th>
      <td>{{ $employee->status }}</td>
    </tr>
  </table>
</body>

</html>