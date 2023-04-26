<?php

namespace App\Http\Livewire\Dashboard\Keuangan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\RiwayatKeuangan;

class KelolaKeuangan extends Component
{
    public $keuangans;
    public $keuanganAktif;
    public $dataKeuanganAktif;
    public $statistikKeuanganAktif;

    // bulan yang dipilih user untuk dilihat keuanganya
    public $bulanAktif;
    public $tahunAktif;

    // property untuk grafik satu bulan
    public $daftar_tanggal_bulan_ini;
    public $nominal_keuangan_bulan_ini;

    // property statistik keuangan satu bulan
    public $nominalPemasukanSatuBulan;
    public $jumlahPemasukanSatuBulan;
    public $nominalPengeluaranSatuBulan;
    public $jumlahPengeluaranSatuBulan;

    protected $listeners = [
        'refresh' => 'refreshData',
    ];

    public function mount()
    {
        $this->keuangans = Keuangan::all();
        $this->keuanganAktif = $this->keuangans[0]->slug;
        $this->bulanAktif = date('m');
        $this->tahunAktif = date('Y');

        // isi data keuangan aktif untuk pertama kali

        $this->dataKeuanganAktif = Keuangan::get()->first();

        // jalankan method untuk perhitungan data keuangan
        $this->hitungDataKeuanganAktif();
        $this->hitungDataGrafikKeuanganSatuBulan();
        $this->emit('initMonthChart', [
            'daftar_tanggal_bulan_ini' => $this->daftar_tanggal_bulan_ini,
            'nominal_keuangan_bulan_ini' => $this->nominal_keuangan_bulan_ini,
            'label' => $this->dataKeuanganAktif->nama,
        ]);
        // make an emit to update pemasukan and pengeluaran
        $this->emit('KeuanganAktifUpdated', [
            'keuanganAktif' => $this->keuanganAktif,
            'dataKeuanganAktif' => $this->dataKeuanganAktif,
            'bulanAktif' => $this->bulanAktif,
            'tahunAktif' => $this->tahunAktif,
        ]);
    }



    // Method ketika ada perubahan pada property
    public function updatedKeuanganAktif()
    {
        $this->dataKeuanganAktif = Keuangan::where('slug', $this->keuanganAktif)->first();
        $this->refreshData();
    }

    public function updatedBulanAktif()
    {
        $this->refreshData();
    }
    public function updatedTahunAktif()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->hitungDataKeuanganAktif();
        $this->hitungDataGrafikKeuanganSatuBulan();
        // make an emit to refresh chart
        $this->emit('refreshMonthChart', [
            'daftar_tanggal_bulan_ini' => $this->daftar_tanggal_bulan_ini,
            'nominal_keuangan_bulan_ini' => $this->nominal_keuangan_bulan_ini,
            'label' => $this->dataKeuanganAktif->nama,
        ]);
        // make an emit to update pemasukan and pengeluaran
        $this->emit('KeuanganAktifUpdated', [
            'keuanganAktif' => $this->keuanganAktif,
            'dataKeuanganAktif' => $this->dataKeuanganAktif,
            'bulanAktif' => $this->bulanAktif,
            'tahunAktif' => $this->tahunAktif,
        ]);
    }




    // Method untuk menghitung data keuangan
    // method ini untuk menghitung data statistik di bagian atas
    public function hitungDataKeuanganAktif()
    {

        $totalKeuanganSaatIni = Keuangan::where('slug', $this->keuanganAktif)->first()->nominal;
        $totalPemasukanSatuBulan = Pemasukan::where('tipe', $this->keuanganAktif)->whereMonth('tanggal', date('m'))->sum('nominal');
        $totalPengeluaranSatuBulan = Pengeluaran::where('tipe', $this->keuanganAktif)->whereMonth('tanggal', date('m'))->sum('nominal');

        $this->statistikKeuanganAktif = [
            'totalKeuanganSaatIni' => $totalKeuanganSaatIni,
            'totalPemasukanSatuBulan' => $totalPemasukanSatuBulan,
            'totalPengeluaranSatuBulan' => $totalPengeluaranSatuBulan,
        ];
    }

    // Method untuk menghitung data grafik keuangan satu bulan
    public function hitungDataGrafikKeuanganSatuBulan()
    {
        // get newest 10 data riwayat keuangan
        $number_of_days_in_selected_month = cal_days_in_month(CAL_GREGORIAN, date($this->bulanAktif), date($this->tahunAktif));
        $daftar_tanggal_bulan_ini = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28];
        if ($number_of_days_in_selected_month == 30) {
            array_push($daftar_tanggal_bulan_ini, 29, 30);
        } else if ($number_of_days_in_selected_month == 31) {
            array_push($daftar_tanggal_bulan_ini, 29, 30, 31);
        } else if ($number_of_days_in_selected_month == 29) {
            array_push($daftar_tanggal_bulan_ini, 29);
        }
        $tanggal_hari_ini = date('d');

        $riwayat_keuangan = RiwayatKeuangan::whereMonth('tanggal', date($this->bulanAktif))
            ->whereYear('tanggal', date($this->tahunAktif))
            ->orderBy('tanggal', 'asc')
            ->where('tipe', $this->keuanganAktif)
            ->get();

        $nominal_keuangan_terbaru = 0;
        $nominal_keuangan_bulan_ini = [];


        // kalau bulan aktif = bulan ini, maka ambil data riwayat keuangan sampai hari ini
        // kalau bulan aktif != bulan ini, maka ambil data riwayat keuangan sampai akhir bulan
        // kalau tahun aktif < tahun ini, maka ambil data riwayat keuangan sampai akhir bulan
        // kalau tahun aktif = tahun ini, sesuaikan dengan bulan aktif

        if ($this->tahunAktif < date('Y')) {
            $rentangTanggalKeuangan = $number_of_days_in_selected_month;
        } else {
            if ($this->bulanAktif == date('m')) {
                $rentangTanggalKeuangan = $tanggal_hari_ini;
            } else if ($this->bulanAktif < date('m')) {
                $rentangTanggalKeuangan = $number_of_days_in_selected_month;
            } else {
                $rentangTanggalKeuangan = 0;
            }
        }

        // proses menghitung data grafik keuangan satu bulan, dihitung satu-satu per hari/tanggal
        for ($i = 1; $i <= $rentangTanggalKeuangan; $i++) {
            if ($i < 10) {
                $i = '0' . $i;
            }
            $riwayat_keuangan_hari_ini = $riwayat_keuangan->where('tanggal', date($this->tahunAktif . '-' . $this->bulanAktif . '-' . $i));

            // jika ada data riwayat keuangan pada hari ini, maka ambil nominal terakhir dan tambahkan ke array
            if ($riwayat_keuangan_hari_ini->count() > 0) {
                $nominal_keuangan_terbaru = $riwayat_keuangan_hari_ini->last()->nominal;
                array_push($nominal_keuangan_bulan_ini, $riwayat_keuangan_hari_ini->last()->nominal);
            }
            // jika tidak ada riwayat, maka isi array dengan nominal terakhir
            else {
                array_push($nominal_keuangan_bulan_ini, $nominal_keuangan_terbaru);
            }
        }

        $this->daftar_tanggal_bulan_ini = $daftar_tanggal_bulan_ini;
        $this->nominal_keuangan_bulan_ini = $nominal_keuangan_bulan_ini;

        // hitung statistik keuangan satu bulan
    }

    // Method untuk menghitung data statistik keuangan satu bulan
    public function hitungStatistikKeuanganSatuBulan()
    {
        // hitung pemasukan satu bulan
        $pemasukan_satu_bulan = Pemasukan::whereMonth('tanggal', date($this->bulanAktif))
            ->whereYear('tanggal', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->sum('nominal');
        $jumlahPemasukanSatuBulan = Pemasukan::whereMonth('tanggal', date($this->bulanAktif))
            ->whereYear('tanggal', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->count();
        $this->nominalPemasukanSatuBulan = $pemasukan_satu_bulan;
        $this->jumlahPemasukanSatuBulan = $jumlahPemasukanSatuBulan;

        // hitung pengeluaran satu bulan
        $pengeluaran_satu_bulan = Pengeluaran::whereMonth('tanggal', date($this->bulanAktif))
            ->whereYear('tanggal', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->sum('nominal');
        $jumlahPengeluaranSatuBulan = Pengeluaran::whereMonth('tanggal', date($this->bulanAktif))
            ->whereYear('tanggal', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->count();
        $this->nominalPengeluaranSatuBulan = $pengeluaran_satu_bulan;
        $this->jumlahPengeluaranSatuBulan = $jumlahPengeluaranSatuBulan;
    }

    public function render()
    {
        $this->hitungStatistikKeuanganSatuBulan();
        return view('livewire.dashboard.keuangan.kelola-keuangan');
    }
}
