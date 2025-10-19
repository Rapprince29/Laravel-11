<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Pegawai</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header bg-warning text-dark text-center rounded-top-4">
            <h3 class="mb-0">Edit Data Pegawai</h3>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control"
                  value="{{ $employee->nama_lengkap }}" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                  value="{{ $employee->email }}" required>
              </div>

              <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control"
                  value="{{ $employee->nomor_telepon }}" required>
              </div>

              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                  value="{{ $employee->tanggal_lahir }}" required>
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="3" required>{{ $employee->alamat }}</textarea>
              </div>

              <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control"
                  value="{{ $employee->tanggal_masuk }}" required>
              </div>

              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select" required>
                  <option value="aktif" {{ $employee->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                  <option value="nonaktif" {{ $employee->status == 'nonaktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
              </div>

              <div class="mb-4">
                <label for="department_id" class="form-label">Departemen</label>
                <select id="department_id" name="department_id" class="form-select" required>
                  <option value="">-- Pilih Departemen --</option>
                  @foreach($departments as $department)
                  <option value="{{ $department->id }}"
                    {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->nama_department }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                  ← Kembali
                </a>
                <div>
                  <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                  <button type="submit" class="btn btn-warning text-dark fw-semibold">Update</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>