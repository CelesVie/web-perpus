<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'nis'    => 'required|string|max:100|unique:siswas,nis',
            'kelas'  => 'required|in:10,11,12',
            'alamat' => 'nullable|string|max:65535',
        ]);

        Siswa::create($request->only(['nama', 'nis', 'kelas', 'alamat']));
        return redirect('/siswa')->with('sukses', 'Siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama'   => 'required|string|max:255',
            'nis'    => [
                'required',
                'string',
                'max:100',
                Rule::unique('siswas', 'nis')->ignore($siswa->id),
            ],
            'kelas'  => 'required|in:10,11,12',
            'alamat' => 'nullable|string|max:65535',
        ]);

        $siswa->update($request->only(['nama', 'nis', 'kelas', 'alamat']));
        return redirect('/siswa')->with('sukses', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Siswa berhasil dihapus!');
    }
}
