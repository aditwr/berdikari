<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        return view('dashboard.catatan.index');
    }
    public function jenis()
    {
        return view('dashboard.catatan.jenis');
    }
    public function tambah()
    {
        return view('dashboard.catatan.tambah');
    }
    public function simpan(Request $request)
    {
        $data_catatan = $request->all();
        $pembuat = auth()->user()->email;

        $catatan = new Catatan();
        $catatan->jenis_catatan_id = $data_catatan['idJenisCatatan'];
        $catatan->judul = $data_catatan['judulCatatan'];
        $catatan->isi = $data_catatan['isiCatatan'];
        $catatan->pembuat = $pembuat;
        $catatan->save();

        $nama_jenis_catatan = $catatan->jenisCatatan->nama;
        session()->flash('success', [
            'title' => 'Catatan berhasil disimpan!',
            'message' => 'Catatan baru dengan judul <b>' . $catatan->judul . '</b> berhasil disimpan di kategori <b>' . $nama_jenis_catatan . '</b>!'
        ]);
        return redirect()->route('dashboard.catatan.tambah');
    }
    public function update(Request $request)
    {
        $catatan = Catatan::find($request->idCatatan);
        $judul_lama = $catatan->judul;
        $catatan->judul = $request->judulCatatan;
        $catatan->isi = $request->isiCatatan;
        // updated by (uncreated)
        $catatan->save();

        // create session for notif
        session()->flash('success', [
            'title' => 'Perubahan berhasil tersimpan!',
            'message' => 'Catatan dengan judul <b>' . $judul_lama . '</b> berhasil diubah!</b>'
        ]);
        return redirect()->route('dashboard.catatan.baca', $request->idCatatan);
    }
    public function baca($id)
    {
        $catatan = Catatan::find($id);
        return view('dashboard.catatan.baca', compact('catatan'));
    }
}
