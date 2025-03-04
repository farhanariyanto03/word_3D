<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\NomorRekening;
use App\Http\Controllers\Controller;

class NomorRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.norek.index', [
            'title' => 'Nomor Rekening',
            'norek' => NomorRekening::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.norek.create-update', [
            'title' => 'Tambah Nomor Rekening',
            'edit_norek' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bank' => 'required',
            'nomor_rekening' => 'required',
            'atas_nama' => 'required',
        ], [
            'nama_bank.required' => 'Nama Bank harus diisi',
            'nomor_rekening.required' => 'Nomor Rekening harus diisi',
            'atas_nama.required' => 'Atas Nama harus diisi',
        ]);

        NomorRekening::create($validatedData);
        return redirect()->route('nomor-rekening.index')->with('success', 'Nomor Rekening berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $edit_norek = NomorRekening::find($id);

        return view('admin.norek.create-update', [
            'title' => 'Edit Nomor Rekening',
            'edit_norek' => $edit_norek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = decrypt($id);
        $validatedData = $request->validate([
            'nama_bank' => 'required',
            'nomor_rekening' => 'required',
            'atas_nama' => 'required',
        ], [
            'nama_bank.required' => 'Nama Bank harus diisi',
            'nomor_rekening.required' => 'Nomor Rekening harus diisi',
            'atas_nama.required' => 'Atas Nama harus diisi',
        ]);

        NomorRekening::where('id', $id)->update($validatedData);
        return redirect()->route('nomor-rekening.index')->with('success', 'Nomor Rekening berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = decrypt($id);
        NomorRekening::destroy($id);
        return redirect()->route('nomor-rekening.index')->with('success', 'Nomor Rekening berhasil dihapus');
    }
}
