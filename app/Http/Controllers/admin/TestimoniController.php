<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimoniController extends Controller
{
    public function index()
    {
        return view('admin.testimoni.index', [
            'title' => 'Testimoni',
            'testimoni' => Testimoni::all()
        ]);
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        Testimoni::destroy($id);
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus');
    }
}
