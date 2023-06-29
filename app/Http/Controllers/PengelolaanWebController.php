<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PengelolaanWebController extends Controller
{
    public function header()
    {
        return view('dashboard.pengelolaan-web.header.index');
    }
    public function kegiatan()
    {
        return view('dashboard.pengelolaan-web.kegiatan.index');
    }
    public function kegiatanTambah()
    {
        return view('dashboard.pengelolaan-web.kegiatan.create');
    }
    public function kegiatanSimpan()
    {
        $data = request()->validate([
            'judulKegiatan' => 'required',
            // image can jpg, png, or jpeg
            'foto' => 'required|image|max:5120', // 1MB Max
            'deskripsi' => 'required',
        ]);
        $data['foto'] = request('foto')->store('kegiatan', 'public');
        $data['penulis'] = auth()->user()->email;
        $data['views'] = 0;

        $kegiatan = Kegiatan::create($data);
        session()->flash('success', [
            'title' => 'Berhasil',
            'message' => 'Kegiatan berhasil ditambahkan'
        ]);
        return redirect()->route('dashboard.pengelolaan-web.kegiatan.index');
    }
    public function kegiatanEdit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('dashboard.pengelolaan-web.kegiatan.edit', compact(['kegiatan']));
    }
    public function kegiatanBaca($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatanTerbaru = Kegiatan::latest()->take(5)->get();
        return view('dashboard.pengelolaan-web.kegiatan.read', compact(['kegiatan', 'kegiatanTerbaru']));
    }
    public function kegiatanUpdate(Request $request)
    {
        if ($request->gambar) {
            $data = request()->validate([
                'judul_kegiatan' => 'required',
                // image can jpg, png, or jpeg
                'gambar' => 'image|max:5120', // 1MB Max
                'deskripsi' => 'required',
            ]);
            $data['gambar'] = request('gambar')->store('kegiatan', 'public');
            // delete old image
            unlink(storage_path('app/public/' . $request->fotoLama));
        } else {
            $data = request()->validate([
                'judul_kegiatan' => 'required',
                'deskripsi' => 'required',
            ]);
            $data['gambar'] = $request->fotoLama;
        }

        $kegiatan = Kegiatan::find($request->id);
        $kegiatan->update($data);

        session()->flash('success', [
            'title' => 'Berhasil',
            'message' => 'Artikel kegiatan berhasil diubah!'
        ]);
        return redirect()->route('dashboard.pengelolaan-web.kegiatan.index');
    }
}
