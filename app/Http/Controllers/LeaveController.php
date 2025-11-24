<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with(['employee.department'])->latest()->get();
        return view('leaves.index', compact('leaves'));
    }

    public function create(Request $request)
    {
        $employees = Employee::with('department')->get();
        $selected_employee = $request->query('employee_id');
        return view('leaves.create', compact('employees', 'selected_employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type'  => 'required',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'reason'      => 'required',
        ]);

        Leave::create([
            'employee_id' => $request->employee_id,
            'leave_type'  => $request->leave_type,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'reason'      => $request->reason,
            'status'      => 'pending',
        ]);

        return redirect()->route('leaves.index')->with('success', 'Pengajuan cuti berhasil dibuat.');
    }

    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }

    public function edit($id)
    {
        // 1. Karena di atas kita pakai $id, maka baris ini sekarang BERHASIL
        $leave = Leave::findOrFail($id);

        // 2. Ambil data pegawai untuk dropdown
        $employees = Employee::with('department')->get();

        // 3. Kirim ke view
        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'employee_id' => 'required',
            'leave_type'  => 'required',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'reason'      => 'required',
        ]);

        $leave->update($request->all());

        return redirect()->route('leaves.index')->with('success', 'Data cuti berhasil diperbarui.');
    }

    // --- BAGIAN INI YANG PENTING UNTUK ADMIN ---

    // 1. Fungsi Hapus TANPA Syarat (God Mode)
    public function destroy($id)
    {
        // 1. Cari data pakai ID (Manual)
        $leave = Leave::findOrFail($id);

        // 2. Hapus data (Tanpa syarat aneh-aneh)
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', 'Data cuti berhasil dihapus.');
    }

    // 2. Fungsi Baru: Untuk Tombol Terima / Tolak
    public function verify(Request $request, Leave $leave)
    {
        // Validasi input status harus approved atau rejected
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $leave->update(['status' => $request->status]);

        // Pesan notifikasi sesuai status
        $statusMsg = $request->status == 'approved' ? 'disetujui' : 'ditolak';

        return redirect()->back()->with('success', "Pengajuan cuti telah $statusMsg.");
    }
}
