<?php

namespace App\Http\Livewire\Dashboard\Inventaris;

use App\Models\JenisInventaris;
use Livewire\Component;

class Index extends Component
{
    public $showCreateForm = false,
        $showEditForm = false,
        $deleteId = null,
        $editId = null;
    public $namaInventoris, $penanggungJawab, $keterangan, $canBeStored = false;
    public $namaInventorisEdit, $penanggungJawabEdit, $keteranganEdit, $canBeUpdated = false;
    public $notification = ['status' => false, 'title' => '', 'message' => ''];

    public function showCreate()
    {
        $this->showEditForm = false;
        $this->showCreateForm = true;
    }
    public function showEdit($id)
    {
        $this->showCreateForm = false;
        $this->showEditForm = true;

        $inventaris = JenisInventaris::find($id);
        $this->editId = $inventaris->id;
        $this->namaInventorisEdit = $inventaris->nama;
        $this->penanggungJawabEdit = $inventaris->penanggung_jawab;
        $this->keteranganEdit = $inventaris->keterangan;
    }
    public function getJenisInventaris()
    {
        return JenisInventaris::all();
    }
    public function store()
    {
        $this->validate([
            'namaInventoris' => 'required',
            'penanggungJawab' => 'required',
            'keterangan' => 'required',
        ]);

        $inventori = new JenisInventaris();
        $inventori->nama = $this->namaInventoris;
        $inventori->penanggung_jawab = $this->penanggungJawab;
        $inventori->keterangan = $this->keterangan;
        $inventori->save();
        $this->showCreateForm = false;
        $this->notification = [
            'status' => true,
            'title' => 'Berhasil',
            'message' => 'Data inventaris berhasil ditambahkan',
        ];
    }
    public function update()
    {
        $inventaris = JenisInventaris::find($this->editId);
        $inventaris->nama = $this->namaInventorisEdit;
        $inventaris->penanggung_jawab = $this->penanggungJawabEdit;
        $inventaris->keterangan = $this->keteranganEdit;
        $inventaris->save();
        $this->showEditForm = false;
        $this->notification = [
            'status' => true,
            'title' => 'Berhasil',
            'message' => 'Data inventaris berhasil diubah',
        ];
    }
    public function deleteItem()
    {
        $inventaris = JenisInventaris::find($this->deleteId);
        $nama = $inventaris->nama;
        $inventaris->delete();
        $this->notification = [
            'status' => true,
            'title' => 'Berhasil Menghapus',
            'message' => 'Data inventaris <b>' . $nama . '</b> berhasil dihapus',
        ];
    }
    public function render()
    {
        if ($this->namaInventoris != null && $this->penanggungJawab != null && $this->keterangan != null) {
            $this->canBeStored = true;
        } else {
            $this->canBeStored = false;
        }
        if ($this->namaInventorisEdit != null && $this->penanggungJawabEdit != null && $this->keteranganEdit != null) {
            $this->canBeUpdated = true;
        } else {
            $this->canBeUpdated = false;
        }
        $jenisInventaris = $this->getJenisInventaris();
        return view('livewire.dashboard.inventaris.index', compact('jenisInventaris'));
    }
}
