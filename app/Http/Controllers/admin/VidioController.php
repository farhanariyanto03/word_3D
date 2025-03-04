<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukVideo;
use Illuminate\Http\Request;

class VidioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vidio.index', [
            'title' => 'Vidio',
            'vidio' => ProdukVideo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vidio.create-update', [
            'title' => 'Tambah Video',
            'edit_vidio' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|integer',
            'minimal_dp' => 'nullable|integer',
            'deskripsi_produk' => 'required',
            'syarat_ketentuan' => 'required',
            'gambar_produk' => 'required|mimes:jpeg,png,jpg|max:10024',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi',
            'harga_produk.required' => 'Harga produk harus diisi',
            'deskripsi_produk.required' => 'Deskripsi produk harus diisi',
            'syarat_ketentuan.required' => 'Syarat dan ketentuan harus diisi',
            'gambar_produk.required' => 'Gambar produk harus diisi',
            'gambar_produk.mimes' => 'Format gambar produk harus JPEG, PNG, atau JPG',
            'gambar_produk.max' => 'Ukuran gambar produk maksimal 10 MB',
        ]);

        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $filePath = $file->store('gambar_produk', 'public');
            $validatedData['gambar_produk'] = $filePath;
        }

        ProdukVideo::create($validatedData);
        return redirect()->route('vidio.index')->with('success', 'Produk berhasil ditambahkan');
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
        $edit_vidio = ProdukVideo::find($id);

        return view('admin.vidio.create-update', [
            'title' => 'Edit Video',
            'edit_vidio' => $edit_vidio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = decrypt($id);

        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|integer',
            'minimal_dp' => 'nullable|integer',
            'deskripsi_produk' => 'required',
            'syarat_ketentuan' => 'required',
            'gambar_produk' => 'mimes:jpeg,png,jpg|max:10024',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi',
            'harga_produk.required' => 'Harga produk harus diisi',
            'deskripsi_produk.required' => 'Deskripsi produk harus diisi',
            'syarat_ketentuan.required' => 'Syarat dan ketentuan harus diisi',
            'gambar_produk.required' => 'Gambar produk harus diisi',
            'gambar_produk.mimes' => 'Format gambar produk harus JPEG, PNG, atau JPG',
            'gambar_produk.max' => 'Ukuran gambar produk maksimal 10 MB',
        ]);

        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $filePath = $file->store('gambar_produk', 'public');
            $validatedData['gambar_produk'] = $filePath;
        }

        ProdukVideo::where('id', $id)->update($validatedData);
        return redirect()->route('vidio.index')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = decrypt($id);
        ProdukVideo::destroy($id);
        return redirect()->route('vidio.index')->with('success', 'Produk berhasil dihapus');
    }
}
