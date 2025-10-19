<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input Pegawai</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h3 class="mb-0">Form Input Pegawai</h3>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('employees.store') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
              </div>

              <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="08xxxxxxxxxx" required>
              </div>

              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
              </div>

              <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
              </div>

              <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select class="form-select" id="department_id" name="department_id" required>
                  <option value="">-- Pilih Department --</option>
                  @foreach ($departments as $department)
                  <option value="{{ $department->id }}">{{ $department->nama_department }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                  <option value="aktif">Aktif</option>
                  <option value="nonaktif">Nonaktif</option>
                </select>
              </div>

              <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
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
