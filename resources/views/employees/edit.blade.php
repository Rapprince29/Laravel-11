<h2>Edit Data Pegawai</h2>
<form action="{{ route('employees.update', $employee->id) }}" method="POST">
  @csrf
  @method('PUT')
  <table>
    <tr>
      <td>Nama Lengkap</td>
      <td><input type="text" name="nama_lengkap" value="{{ $employee->nama_lengkap }}"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email" value="{{ $employee->email }}"></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td><input type="text" name="nomor_telepon" value="{{ $employee->nomor_telepon }}"></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td><input type="date" name="tanggal_lahir" value="{{ $employee->tanggal_lahir }}"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input type="text" name="alamat" value="{{ $employee->alamat }}"></td>
    </tr>
    <tr>
      <td>Tanggal Masuk</td>
      <td><input type="date" name="tanggal_masuk" value="{{ $employee->tanggal_masuk }}"></td>
    </tr>
    <tr>
      <td>Status</td>
      <td>
        <select name="status">
          <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Aktif</option>
          <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
      </td>
    </tr>
  </table>
  <button type="submit">Update</button>
</form>