<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[Permission::class]->forgetCachedPermissions();

        // roles = developer, admin, ketua, bendahara, sekretaris, anggota, seksi-inventaris

        // keuangan permissions
        // jenis keuangan : buat-kategori-keuangan, edit-kategori-keuangan, hapus-kategori-keuangan, lihat-kategori-keuangan
        $kategori_keuangan_permissions = [
            'buat-kategori-keuangan',
            'edit-kategori-keuangan',
            'hapus-kategori-keuangan',
            'lihat-kategori-keuangan',
        ];
        foreach ($kategori_keuangan_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // pemasukan : buat-pemasukan, edit-pemasukan, hapus-pemasukan, lihat-pemasukan
        $pemasukan_permissions = [
            'buat-pemasukan',
            'edit-pemasukan',
            'hapus-pemasukan',
            'lihat-pemasukan',
        ];
        foreach ($pemasukan_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // pengeluaran : buat-pengeluaran, edit-pengeluaran, hapus-pengeluaran, lihat-pengeluaran
        $pengeluaran_permissions = [
            'buat-pengeluaran',
            'edit-pengeluaran',
            'hapus-pengeluaran',
            'lihat-pengeluaran',
        ];
        foreach ($pengeluaran_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // catatan permissions
        // jenis catatan : buat-kategori-catatan, edit-kategori-catatan, hapus-kategori-catatan, lihat-kategori-catatan
        $kategori_catatan_permissions = [
            'buat-kategori-catatan',
            'edit-kategori-catatan',
            'hapus-kategori-catatan',
            'lihat-kategori-catatan',
        ];
        foreach ($kategori_catatan_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // catatan : buat-catatan, edit-catatan, hapus-catatan, lihat-catatan
        $catatan_permissions = [
            'buat-catatan',
            'edit-catatan',
            'hapus-catatan',
            'lihat-catatan',
        ];
        foreach ($catatan_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // inventaris permissions
        // jenis inventaris : buat-kategori-inventaris, edit-kategori-inventaris, hapus-kategori-inventaris, lihat-kategori-inventaris
        $kategori_inventaris_permissions = [
            'buat-kategori-inventaris',
            'edit-kategori-inventaris',
            'hapus-kategori-inventaris',
            'lihat-kategori-inventaris',
        ];
        foreach ($kategori_inventaris_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // inventaris : buat-inventaris, edit-inventaris, hapus-inventaris, lihat-inventaris
        $inventaris_permissions = [
            'buat-inventaris',
            'edit-inventaris',
            'hapus-inventaris',
            'lihat-inventaris',
        ];
        foreach ($inventaris_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // pengelolaan web permissions
        // edit-header
        $edit_header_permission = Permission::create(['name' => 'edit-header']);

        // artikel kegiatan : buat-artikel-kegiatan, edit-artikel-kegiatan, hapus-artikel-kegiatan, lihat-artikel-kegiatan
        $artikel_kegiatan_permissions = [
            'buat-artikel-kegiatan',
            'edit-artikel-kegiatan',
            'hapus-artikel-kegiatan',
            'lihat-artikel-kegiatan',
        ];
        foreach ($artikel_kegiatan_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // artikel : buat-artikel, edit-artikel, hapus-artikel, lihat-artikel
        $artikel_permissions = [
            'buat-artikel',
            'edit-artikel',
            'hapus-artikel',
            'lihat-artikel',
        ];
        foreach ($artikel_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // galeri : buat-galeri, edit-galeri, hapus-galeri, lihat-galeri 
        $galeri_permissions = [
            'buat-galeri',
            'edit-galeri',
            'hapus-galeri',
            'lihat-galeri',
        ];
        foreach ($galeri_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // asign permissions to roles
        // developer
        $developer_role = Role::create(['name' => 'developer']);
        $developer_role->givePermissionTo(Permission::all());

        // admin
        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo(Permission::all());

        // ketua
        $ketua_role = Role::create(['name' => 'ketua']);
        // assign multiple permissions at once
        $ketua_role->givePermissionTo([
            'lihat-kategori-keuangan',
            'lihat-pemasukan',
            'lihat-pengeluaran',
            'buat-kategori-catatan',
            'edit-kategori-catatan',
            'hapus-kategori-catatan',
            'lihat-kategori-catatan',
            'buat-catatan',
            'edit-catatan',
            'hapus-catatan',
            'lihat-catatan',
            'buat-kategori-inventaris',
            'edit-kategori-inventaris',
            'hapus-kategori-inventaris',
            'lihat-kategori-inventaris',
            'buat-inventaris',
            'edit-inventaris',
            'hapus-inventaris',
            'lihat-inventaris',
            'edit-header',
            'buat-artikel-kegiatan',
            'edit-artikel-kegiatan',
            'hapus-artikel-kegiatan',
            'lihat-artikel-kegiatan',
            'buat-artikel',
            'edit-artikel',
            'hapus-artikel',
            'lihat-artikel',
            'buat-galeri',
            'edit-galeri',
            'hapus-galeri',
            'lihat-galeri',
        ]);

        // wakil ketua
        $wakil_ketua_role = Role::create(['name' => 'wakil ketua']);
        // assign multiple permissions at once
        $wakil_ketua_role->givePermissionTo([
            'lihat-kategori-keuangan',
            'lihat-pemasukan',
            'lihat-pengeluaran',
            'buat-kategori-catatan',
            'edit-kategori-catatan',
            'hapus-kategori-catatan',
            'lihat-kategori-catatan',
            'buat-catatan',
            'edit-catatan',
            'hapus-catatan',
            'lihat-catatan',
            'buat-kategori-inventaris',
            'edit-kategori-inventaris',
            'hapus-kategori-inventaris',
            'lihat-kategori-inventaris',
            'buat-inventaris',
            'edit-inventaris',
            'hapus-inventaris',
            'lihat-inventaris',
            'edit-header',
            'buat-artikel-kegiatan',
            'edit-artikel-kegiatan',
            'hapus-artikel-kegiatan',
            'lihat-artikel-kegiatan',
            'buat-artikel',
            'edit-artikel',
            'hapus-artikel',
            'lihat-artikel',
            'buat-galeri',
            'edit-galeri',
            'hapus-galeri',
            'lihat-galeri',
        ]);

        // bendahara
        $bendahara_role = Role::create(['name' => 'bendahara']);
        // assign multiple permissions at once
        $bendahara_role->givePermissionTo([
            // all permissions
            'buat-kategori-keuangan',
            'edit-kategori-keuangan',
            'hapus-kategori-keuangan',
            'lihat-kategori-keuangan',
            'buat-pemasukan',
            'edit-pemasukan',
            'hapus-pemasukan',
            'lihat-pemasukan',
            'buat-pengeluaran',
            'edit-pengeluaran',
            'hapus-pengeluaran',
            'lihat-pengeluaran',
            'buat-kategori-catatan',
            'edit-kategori-catatan',
            'hapus-kategori-catatan',
            'lihat-kategori-catatan',
            'buat-catatan',
            'edit-catatan',
            'hapus-catatan',
            'lihat-catatan',
            'lihat-kategori-inventaris',
            'lihat-inventaris',
            'lihat-artikel-kegiatan',
            'buat-artikel',
            'edit-artikel',
            'hapus-artikel',
            'lihat-artikel',
            'buat-galeri',
            'edit-galeri',
            'hapus-galeri',
            'lihat-galeri',
        ]);

        // sekretaris
        $sekretaris_role = Role::create(['name' => 'sekretaris']);
        // assign multiple permissions at once
        $sekretaris_role->givePermissionTo([
            'lihat-kategori-keuangan',
            'lihat-pemasukan',
            'lihat-pengeluaran',
            'buat-kategori-catatan',
            'edit-kategori-catatan',
            'hapus-kategori-catatan',
            'lihat-kategori-catatan',
            'buat-catatan',
            'edit-catatan',
            'hapus-catatan',
            'lihat-catatan',
            'buat-kategori-inventaris',
            'edit-kategori-inventaris',
            'hapus-kategori-inventaris',
            'lihat-kategori-inventaris',
            'buat-inventaris',
            'edit-inventaris',
            'hapus-inventaris',
            'lihat-inventaris',
            'edit-header',
            'buat-artikel-kegiatan',
            'edit-artikel-kegiatan',
            'hapus-artikel-kegiatan',
            'lihat-artikel-kegiatan',
            'buat-artikel',
            'edit-artikel',
            'hapus-artikel',
            'lihat-artikel',
            'buat-galeri',
            'edit-galeri',
            'hapus-galeri',
            'lihat-galeri'
            ]
        );

        // seksi inventaris
        $seksi_inventaris_role = Role::create(['name' => 'seksi-inventaris']);
        // assign multiple permissions at once
        $seksi_inventaris_role->givePermissionTo([
            'lihat-kategori-keuangan',
            'lihat-pemasukan',
            'lihat-pengeluaran',
            'lihat-kategori-catatan',
            'lihat-catatan',
            'buat-kategori-inventaris',
            'edit-kategori-inventaris',
            'hapus-kategori-inventaris',
            'lihat-kategori-inventaris',
            'buat-inventaris',
            'edit-inventaris',
            'hapus-inventaris',
            'lihat-inventaris',
            'lihat-artikel-kegiatan',
            'buat-artikel',
            'edit-artikel',
            'hapus-artikel',
            'lihat-artikel',
            'lihat-galeri'
            ]
        );

        // anggota
        $anggota_role = Role::create(['name' => 'anggota']);
        // assign multiple permissions at once
        $anggota_role->givePermissionTo([
            'lihat-kategori-keuangan',
            'lihat-pemasukan',
            'lihat-pengeluaran',
            'lihat-kategori-catatan',
            'lihat-catatan',
            'lihat-kategori-inventaris',
            'lihat-inventaris',
            'lihat-artikel-kegiatan',
            'buat-artikel',
            'edit-artikel',
            'hapus-artikel',
            'lihat-artikel',
            'lihat-galeri'
            ]
        );

        $developer = User::create([
            'name' => 'Developer',
            'email' => 'developer@app.com',
            'password' => bcrypt('password'),
        ]);
        $developer->assignRole('developer');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        // $all_permissions = [
        // 'buat-kategori-keuangan',
        // 'edit-kategori-keuangan',
        // 'hapus-kategori-keuangan',
        // 'lihat-kategori-keuangan',
        // 'buat-pemasukan',
        // 'edit-pemasukan',
        // 'hapus-pemasukan',
        // 'lihat-pemasukan',
        // 'buat-pengeluaran',
        // 'edit-pengeluaran',
        // 'hapus-pengeluaran',
        // 'lihat-pengeluaran',
        // 'buat-kategori-catatan',
        // 'edit-kategori-catatan',
        // 'hapus-kategori-catatan',
        // 'lihat-kategori-catatan',
        // 'buat-catatan',
        // 'edit-catatan',
        // 'hapus-catatan',
        // 'lihat-catatan',
        // 'buat-kategori-inventaris',
        // 'edit-kategori-inventaris',
        // 'hapus-kategori-inventaris',
        // 'lihat-kategori-inventaris',
        // 'buat-inventaris',
        // 'edit-inventaris',
        // 'hapus-inventaris',
        // 'lihat-inventaris',
        // 'edit-header',
        // 'buat-artikel-kegiatan',
        // 'edit-artikel-kegiatan',
        // 'hapus-artikel-kegiatan',
        // 'lihat-artikel-kegiatan',
        // 'buat-artikel',
        // 'edit-artikel',
        // 'hapus-artikel',
        // 'lihat-artikel',
        // 'buat-galeri',
        // 'edit-galeri',
        // 'hapus-galeri',
        // 'lihat-galeri'
        // ];

    }
}
