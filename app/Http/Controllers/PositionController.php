<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Employee;

class PositionController extends Controller
{

    public function index()
    {
        $positions = Position::latest()->get();
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);
        Position::create($request->all());
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('positions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $position->id,
        ]);
        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
        ]);
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}
