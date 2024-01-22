<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(5);
        return view('mahasiswa.index', compact('mahasiswa'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'prodi' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',

        ]);


        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show',compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit',compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'prodi' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',

        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa deleted successfully');
    }
}
