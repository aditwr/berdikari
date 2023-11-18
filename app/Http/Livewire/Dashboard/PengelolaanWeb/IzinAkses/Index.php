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

    public $user;


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
        $users = User::doesntHave('roles')->latest()->paginate(10);
        $admins = User::role('admin')->latest()->get();
        $ketuas = User::role('ketua')->latest()->get();
        $bendaharas = User::role('bendahara')->latest()->paginate(10);
        $sekretariss = User::role('sekretaris')->latest()->paginate(10);
        $seksi_inventariss = User::role('seksi-inventaris')->latest()->paginate(10);
        $anggotas = User::role('anggota')->latest()->paginate(10);
        return view('livewire.dashboard.pengelolaan-web.izin-akses.index', compact(['users', 'admins', 'ketuas', 'bendaharas', 'sekretariss', 'seksi_inventariss', 'anggotas']));
    }
}
