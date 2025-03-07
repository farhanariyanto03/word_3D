<?php

namespace App\Http\Controllers\admin;

use App\Models\VideoYt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoYtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.yt.index', [
            'title' => 'Video Youtube',
            'vidio' => VideoYt::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.yt.create-update', [
            'title' => 'Tambah Video Youtube',
            'edit_vidio' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_video' => 'required',
            'url_video' => 'required|url',
        ], [
            'judul_video.required' => 'Judul Video harus diisi',
            'url_video.required' => 'URL Video harus diisi',
            'url_video.url' => 'URL Video harus berupa URL yang valid',
        ]);

        if (preg_match('/(?:youtube\\.com\\/.*[?&]v=|youtu\\.be\\/|youtube\\.com\\/embed\\/|youtube\\.com\\/v\\/)([a-zA-Z0-9_-]{11})/', $validatedData['url_video'], $matches)) {
            $validatedData['url_video'] = 'https://www.youtube.com/embed/' . $matches[1];
        }

        VideoYt::create($validatedData);

        return redirect()->route('video-yt.index')->with('success', 'Video YT berhasil ditambahkan');
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
        $edit_vidio = VideoYt::find($id);
        return view('admin.yt.create-update', [
            'title' => 'Edit Video Youtube',
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
            'judul_video' => 'required',
            'url_video' => 'required|url',
        ], [
            'judul_video.required' => 'Judul Video harus diisi',
            'url_video.required' => 'URL Video harus diisi',
            'url_video.url' => 'URL Video harus berupa URL yang valid',
        ]);

        if (preg_match('/(?:youtube\\.com\\/.*[?&]v=|youtu\\.be\\/|youtube\\.com\\/embed\\/|youtube\\.com\\/v\\/)([a-zA-Z0-9_-]{11})/', $validatedData['url_video'], $matches)) {
            $validatedData['url_video'] = 'https://www.youtube.com/embed/' . $matches[1];
        }

        VideoYt::where('id', $id)->update($validatedData);
        return redirect()->route('video-yt.index')->with('success', 'Video YT berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = decrypt($id);
        VideoYt::destroy($id);
        return redirect()->route('video-yt.index')->with('success', 'Video YT berhasil dihapus');
    }
}
