<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|date_format:Y-m',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $gajiPokok = $request->gaji_pokok;
        $tunjangan = $request->tunjangan ?? 0;
        $potongan = $request->potongan ?? 0;
        $totalGaji = $gajiPokok + $tunjangan - $potongan;

        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
            'total_gaji' => $totalGaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Pembayaran gaji berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $salary = Salary::with('employee')->findOrFail($id);
        return view('salaries.show', compact('salary'));
    }

    public function edit(string $id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $salary = Salary::findOrFail($id);

        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|date_format:Y-m',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $gajiPokok = $request->gaji_pokok;
        $tunjangan = $request->tunjangan ?? 0;
        $potongan = $request->potongan ?? 0;
        $totalGaji = $gajiPokok + $tunjangan - $potongan;

        $salary->update([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
            'total_gaji' => $totalGaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus!');
    }
}
