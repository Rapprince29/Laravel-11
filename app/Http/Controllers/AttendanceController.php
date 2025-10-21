<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Menampilkan semua data absensi.
     */
    public function index()
    {
        // Menampilkan data absensi terbaru, 5 per halaman
        $attendances = Attendance::with('employee')
            ->orderBy('tanggal', 'desc')
            ->paginate(5);

        return view('attendance.index', compact('attendances'));
    }

    /**
     * Form tambah data absensi.
     */
    public function create()
    {
        $employees = Employee::all();
        $statuses = ['hadir', 'sakit', 'izin', 'alpha'];

        return view('attendance.create', compact('employees', 'statuses'));
    }

    /**
     * Simpan data absensi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'tanggal'       => 'required|date',
            'status'        => 'required|in:hadir,sakit,izin,alpha',
            'waktu_masuk'   => 'nullable|date_format:H:i',
            'waktu_keluar'  => 'nullable|date_format:H:i',
            'keterangan'    => 'nullable|string|max:255',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail absensi.
     */
    public function show($id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Form edit data absensi.
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        $statuses = ['hadir', 'sakit', 'izin', 'alpha'];

        // PERBAIKAN: Mengubah 'attendances.edit' (plural) menjadi 'attendance.edit' (singular) 
        // sesuai saran error, yang mengindikasikan lokasi view yang benar.
        return view('attendance.edit', compact('attendance', 'employees', 'statuses'));
    }

    /**
     * Update data absensi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'tanggal'       => 'required|date',
            'status'        => 'required|in:hadir,sakit,izin,alpha',
            'waktu_masuk'   => 'nullable|date_format:H:i',
            'waktu_keluar'  => 'nullable|date_format:H:i',
            'keterangan'    => 'nullable|string|max:255',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Hapus data absensi.
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
}
