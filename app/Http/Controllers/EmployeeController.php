<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::orderBy('nama_department')->get(); // ✅ konsisten
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|in:aktif,nonaktif',
            'department_id'  => 'required|exists:departments,id',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    public function show($id)
    {
        $employee = Employee::with('department')->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::orderBy('nama_department')->get(); // ✅ disamakan
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|in:aktif,nonaktif',
            'department_id'  => 'required|exists:departments,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
