<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department; // ✅ gunakan model Department, bukan Departemen

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ✅ Ambil semua data department
        $departments = Department::all();

        // ✅ Kirim ke view
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
            // ✅ ubah sesuai nama tabel "departments"
            'department_id' => 'required|integer|exists:departments,id',
        ]);

        // ✅ Simpan data pegawai
        Employee::create($request->all());

        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $departments = Department::all(); // ✅ tambahkan biar dropdown muncul di edit
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
            'department_id' => 'required|integer|exists:departments,id',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
