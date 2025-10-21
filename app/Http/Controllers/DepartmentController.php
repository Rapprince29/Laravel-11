<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:departments,nama_department',
        ]);

        Department::create([
            'nama_department' => $request->nama,
        ]);

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100|unique:departments,nama_department,' . $department->id,
        ]);

        $department->update([
            'nama_department' => $request->nama,
        ]);

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus!');
    }
}
