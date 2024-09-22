<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        return view('content.kategori.list', compact('kategoris'));
    }

    public function tambah()
    {
        return view('content.kategori.add');
    }

    public function prosesTambah(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        DB::beginTransaction();
        try {
            // Create a new instance of Kategori
            $kategoris = new Kategori();
            $kategoris->nama_kategori = $request->nama_kategori;
            $kategoris->save();

            DB::commit();
            Session::flash('message', ['Berhasil tambah kategori', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal tambah kategori', 'error']);
        }
        return redirect()->route('kategoris.index');
    }

    public function hapus($id)
    {
        $kategoris = Kategori::findOrFail($id);

        try {
            $kategoris->delete();
            return redirect()->route('kategoris.index')->with('pesan', ['Success', 'Berhasil Hapus Kategori']);

        } catch (\Exception $e) {
            return redirect()->route('kategoris.index')->with('pesan', ['Danger', 'Gagal Hapus Kategori']);

        }
    }
}
