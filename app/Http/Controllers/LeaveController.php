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
            'start_date'  => 'required', // Hapus validasi strict '|date'
            'end_date'    => 'required', // Hapus validasi strict '|date'
            'reason'      => 'required',
        ]);

        // Input datetime-local formatnya: "2025-11-25T14:30"
        // Kita ubah jadi: "2025-11-25 14:30" agar masuk ke database dengan benar

        Leave::create([
            'employee_id' => $request->employee_id,
            'leave_type'  => $request->leave_type,
            // Hapus huruf T
            'start_date'  => str_replace('T', ' ', $request->start_date),
            'end_date'    => str_replace('T', ' ', $request->end_date),
            'reason'      => $request->reason,
            'status'      => 'pending'
        ]);

        return redirect()->route('leaves.index')
            ->with('success', 'Pengajuan cuti berhasil dibuat.');
    }

    public function show($id)
    {
        $leave = Leave::with('employee')->findOrFail($id);

        return view('leaves.show', compact('leave'));
    }


    public function edit($id)
    {
        // Ambil data leave + pegawai
        $leave = Leave::with('employee')->findOrFail($id);

        // Ambil list employee untuk dropdown
        $employees = Employee::all();

        return view('leaves.edit', compact('leave', 'employees'));
    }


    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type'  => 'required',
            'start_date'  => 'required', // Hapus rule |date agar format T diterima dulu
            'end_date'    => 'required', // Hapus rule |date agar format T diterima dulu
            'reason'      => 'nullable|string',
            'status'      => 'required|in:pending,approved,rejected',
        ]);

        $leave = Leave::findOrFail($id);

        // File: LeaveController.php -> function update

        // ...
        $leave->employee_id = $request->employee_id;
        $leave->leave_type  = $request->leave_type;

        // PENTING: Pastikan baris ini ada agar jam tersimpan
        $leave->start_date  = str_replace('T', ' ', $request->start_date);
        $leave->end_date    = str_replace('T', ' ', $request->end_date);
        // ...

        $leave->reason      = $request->reason;
        $leave->status      = $request->status;

        $leave->save();

        return redirect()->route('leaves.index')
            ->with('success', 'Data cuti berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();

        return redirect()->route('leaves.index')
            ->with('success', 'Data cuti berhasil dihapus.');
    }


    public function verify(Request $request, Leave $leave)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $leave->update(['status' => $request->status]);

        $statusMsg = $request->status === 'approved'
            ? 'disetujui'
            : 'ditolak';

        return redirect()->back()->with('success', "Pengajuan cuti telah $statusMsg.");
    }
}
