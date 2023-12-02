<?php

namespace App\Http\Livewire\Dashboard\PengelolaanWeb\IzinAkses;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'beriHakAkses' => 'beriHakAkses',
        'hapusHakAkses' => 'hapusHakAkses',
    ];

    public $user, $search;


    public function updatedUser()
    {
        $this->dispatchBrowserEvent('userUpdated', $this->user);
    }
    public function beriHakAkses($user_id, $role)
    {
        User::find($user_id)->syncRoles($role);
        $user = User::find($user_id);
        $this->dispatchBrowserEvent('beriHakAksesBerhasil', [$user, $role]);
    }
    public function hapusHakAkses($user_id)
    {
        // kosongkan hak akses user
        User::find($user_id)->syncRoles([]);
        $user = User::find($user_id);
        $this->dispatchBrowserEvent('hapusHakAksesBerhasil', $user);
    }

    public function render()
    {
        // return users who don't hanve any role
        $users = User::doesntHave('roles')->latest();
        if ($this->search) {
            $users = $users->where('name', 'like', '%' . $this->search . '%');
        }
        $users = $users->paginate(10, pageName: 'user');
        $admins = User::role('admin')->latest()->paginate(10, pageName: 'admin');
        $ketuas = User::role('ketua')->latest()->paginate(10, pageName: 'ketua');
        $bendaharas = User::role('bendahara')->latest()->paginate(10, pageName: 'bendahara');
        $sekretariss = User::role('sekretaris')->latest()->paginate(10, pageName: 'sekretaris');
        $seksi_inventariss = User::role('seksi-inventaris')->latest()->paginate(10, pageName: 'seksi_inventaris');
        $anggotas = User::role('anggota')->latest()->paginate(10, pageName: 'anggota');
        return view('livewire.dashboard.pengelolaan-web.izin-akses.index', compact(['users', 'admins', 'ketuas', 'bendaharas', 'sekretariss', 'seksi_inventariss', 'anggotas']));
    }
}
