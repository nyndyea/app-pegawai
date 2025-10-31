<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Tampilkan semua posisi (jabatan)
     */
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    /**
     * Form tambah jabatan
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Simpan data jabatan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Position::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);


        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    /**
     * Form edit jabatan
     */
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    /**
     * Update data jabatan
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
        ]);

        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui!');
    }

    /**
     * Hapus jabatan
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}
