<?php

namespace App\Http\Livewire\Dashboard\Keuangan;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class KelolaKeuangan extends Component
{
    public $keuangans;
    public $keuanganAktif;
    public $dataKeuanganAktif;
    public $statistikKeuanganAktif;
    public $ringkasanKeuangan = [];

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
        $this->keuanganAktif = $this->keuangans->first()->slug;
        // isi data keuangan aktif untuk pertama kali
        $this->dataKeuanganAktif = Keuangan::get()->first();
        $this->bulanAktif = date('m');
        $this->tahunAktif = date('Y');


        // jalankan method untuk perhitungan data keuangan
        $this->hitungKeuanganAktif();
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
        $this->hitungRingkasanKeuangan();
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
        $this->hitungKeuanganAktif();
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
    public function hitungKeuanganAktif()
    {
        // hitung total keuangan berdasarkan jenis keuangan yang aktif
        // 1. hitung jumlah pemasukan hingga saat ini
        // 2. hitung jumlah pengeluaran hingga saat ini
        // 3. pemasukan - pengeluaran = total keuangan
        $totalPemasukan = Pemasukan::where('tipe', $this->keuanganAktif)->sum('nominal');
        $totalPengeluaran = Pengeluaran::where('tipe', $this->keuanganAktif)->sum('nominal');
        $totalKeuanganSaatIni = $totalPemasukan - $totalPengeluaran;

        $totalPemasukanSatuBulan = Pemasukan::where('tipe', $this->keuanganAktif)->whereMonth('created_at', date('m'))->sum('nominal');
        $totalPengeluaranSatuBulan = Pengeluaran::where('tipe', $this->keuanganAktif)->whereMonth('created_at', date('m'))->sum('nominal');

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

        $track_keuangan = [];

        // proses menghitung data grafik keuangan satu bulan, dihitung satu-satu per hari/tanggal
        for ($i = 1; $i <= $rentangTanggalKeuangan; $i++) {
            $pemasukan_sampai_tanggal_ini = Pemasukan::where('tipe', $this->keuanganAktif)->whereDay('created_at', "<=", $i)->whereMonth('created_at', "<=", $this->bulanAktif)->whereYear('created_at', "<=", $this->tahunAktif)->sum('nominal');
            $pengeluaran_sampai_tanggal_ini = Pengeluaran::where('tipe', $this->keuanganAktif)->whereDay('created_at', "<=", $i)->whereMonth('created_at', "<=", $this->bulanAktif)->whereYear('created_at', "<=", $this->tahunAktif)->sum('nominal');
            $saldo_pada_tanggal_ini = $pemasukan_sampai_tanggal_ini - $pengeluaran_sampai_tanggal_ini;
            array_push($track_keuangan, $saldo_pada_tanggal_ini);
        }
        $this->daftar_tanggal_bulan_ini = $daftar_tanggal_bulan_ini;
        $this->nominal_keuangan_bulan_ini = $track_keuangan;
        // dd($track_keuangan);

        // hitung statistik keuangan satu bulan
    }

    // Method untuk menghitung data statistik keuangan satu bulan
    public function hitungStatistikKeuanganSatuBulan()
    {
        // hitung pemasukan satu bulan
        $pemasukan_satu_bulan = Pemasukan::whereMonth('created_at', date($this->bulanAktif))
            ->whereYear('created_at', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->sum('nominal');
        $jumlahPemasukanSatuBulan = Pemasukan::whereMonth('created_at', date($this->bulanAktif))
            ->whereYear('created_at', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->count();
        $this->nominalPemasukanSatuBulan = $pemasukan_satu_bulan;
        $this->jumlahPemasukanSatuBulan = $jumlahPemasukanSatuBulan;

        // hitung pengeluaran satu bulan
        $pengeluaran_satu_bulan = Pengeluaran::whereMonth('created_at', date($this->bulanAktif))
            ->whereYear('created_at', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->sum('nominal');
        $jumlahPengeluaranSatuBulan = Pengeluaran::whereMonth('created_at', date($this->bulanAktif))
            ->whereYear('created_at', date($this->tahunAktif))
            ->where('tipe', $this->keuanganAktif)
            ->count();
        $this->nominalPengeluaranSatuBulan = $pengeluaran_satu_bulan;
        $this->jumlahPengeluaranSatuBulan = $jumlahPengeluaranSatuBulan;
    }

    public function hitungRingkasanKeuangan()
    {
        $daftar_keuangan = Keuangan::all();
        $labels_keuangan = [];
        $data_keuangan = [];
        for ($i = 0; $i < count($daftar_keuangan); $i++) {
            $pemasukan = Pemasukan::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $pengeluaran = Pengeluaran::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;
            array_push($labels_keuangan, $daftar_keuangan[$i]->nama);
            array_push($data_keuangan, $saldo);
        }
        $this->ringkasanKeuangan = [
            'labels' => $labels_keuangan,
            'data' => $data_keuangan
        ];

        $this->emit('initDoughnutChart', $this->ringkasanKeuangan);
    }

    public function render()
    {
        $this->hitungStatistikKeuanganSatuBulan();
        // jumlah keuangan berdasar bulan dan tahun aktif
        $pemasukan = Pemasukan::where('tipe', $this->keuanganAktif)->whereMonth('created_at', "<=", date($this->bulanAktif))->whereYear('created_at', "<=", date($this->tahunAktif))->sum('nominal');
        $pengeluaran = Pengeluaran::where('tipe', $this->keuanganAktif)->whereMonth('created_at', "<=", date($this->bulanAktif))->whereYear('created_at', "<=", date($this->tahunAktif))->sum('nominal');
        $saldo = $pemasukan - $pengeluaran;

        $this->hitungRingkasanKeuangan();
        $this->emit('refreshDoughnutChart', $this->ringkasanKeuangan);

        $saldo_keuangan = [];
        $daftar_keuangan = Keuangan::all();
        $total_saldo_karangtaruna = 0;
        for ($i = 0; $i < count($daftar_keuangan); $i++) {
            $pemasukan = Pemasukan::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $pengeluaran = Pengeluaran::where('tipe', $daftar_keuangan[$i]->slug)->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;
            $daftar_keuangan[$i]->saldo = $saldo;
            $total_saldo_karangtaruna += $saldo;
        }


        return view('livewire.dashboard.keuangan.kelola-keuangan', compact(['saldo', 'daftar_keuangan', 'total_saldo_karangtaruna']));
    }
}
