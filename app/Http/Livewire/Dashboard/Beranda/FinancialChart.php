<?php

namespace App\Http\Livewire\Dashboard\Beranda;

use Livewire\Component;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\AkumulasiKeuanganTahunan;

class FinancialChart extends Component
{
    public $keuangans;
    public $keuanganAktif;
    public $dataKeuanganAktif;
    public $akumulasi_keuangan_sebelum_tahun_aktif;
    // property untuk grafik satu bulan
    public $daftar_tanggal_bulan_ini;
    public $nominal_keuangan_bulan_ini;

    public $bulanAktif;
    public $tahunAktif;


    public function mount()
    {
        $this->keuangans = Keuangan::all();
        $this->keuanganAktif = Keuangan::all()->first()->slug;

        $this->dataKeuanganAktif = Keuangan::get()->first();
        $this->bulanAktif = date('m');
        $this->tahunAktif = date('Y');

        $this->hitungDataGrafikKeuanganSatuBulan();
        $this->emit('initMonthChart', [
            'daftar_tanggal_bulan_ini' => $this->daftar_tanggal_bulan_ini,
            'nominal_keuangan_bulan_ini' => $this->nominal_keuangan_bulan_ini,
            'label' => $this->dataKeuanganAktif->nama,
        ]);
    }

    // Method ketika ada perubahan pada property
    public function updatedKeuanganAktif()
    {
        $this->dataKeuanganAktif = Keuangan::where('slug', $this->keuanganAktif)->first();
        $this->refreshData();
    }

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

        // jika hari ini adalah tanggal 1 januari, maka
        // jumlahkan semua pemasukan dan pengeluaran di sampai tahun sebelumnya
        if (now()->format('m-d') == '05-10') {
            $current_year = date("Y");
            $previous_year = date("Y", strtotime("-1 year"));
            // jika data akumulasi pemasukan dan pengeluran tahun sebelumnya belum ada, maka buat data baru
            $daftar_keuangan = Keuangan::all();
            foreach ($daftar_keuangan as $keuangan) {
                if (AkumulasiKeuanganTahunan::where('tahun', $previous_year)->where('tipe', $keuangan->slug)->doesntExist()) {
                    $pemasukan_sampai_tahun_sebelumnya = Pemasukan::where('tipe', $keuangan->slug)->whereYear('created_at', "<", $current_year)->sum('nominal');
                    $pengeluaran_sampai_tahun_sebelumnya = Pengeluaran::where('tipe', $keuangan->slug)->whereYear('created_at', "<", $current_year)->sum('nominal');
                    $akumulasi_keuangan = new AkumulasiKeuanganTahunan;
                    $akumulasi_keuangan->tipe = $keuangan->slug;
                    $akumulasi_keuangan->tahun = $previous_year;
                    $akumulasi_keuangan->total_pemasukan = $pemasukan_sampai_tahun_sebelumnya;
                    $akumulasi_keuangan->total_pengeluaran = $pengeluaran_sampai_tahun_sebelumnya;
                    $akumulasi_keuangan->save();
                }
            }
        }
        // $d = new DateTime('2021-05-07');
        // dd($d);

        // akumulasi keuangan tahun -1 tahun aktif
        $track_keuangan = [];
        $akumulasi_keuangan_sampai_tahun_lalu = AkumulasiKeuanganTahunan::where('tipe', $this->keuanganAktif)->where('tahun', (int)$this->tahunAktif - 1)->first();
        if ($akumulasi_keuangan_sampai_tahun_lalu) {
            $akumulasi_pemasukan_keuangan_sampai_tahun_lalu = $akumulasi_keuangan_sampai_tahun_lalu->total_pemasukan;
            $akumulasi_pengeluaran_keuangan_sampai_tahun_lalu = $akumulasi_keuangan_sampai_tahun_lalu->total_pengeluaran;
            $akumulasi_saldo_keuangan_sampai_tahun_lalu = $akumulasi_pemasukan_keuangan_sampai_tahun_lalu - $akumulasi_pengeluaran_keuangan_sampai_tahun_lalu;
        } else {
            $akumulasi_saldo_keuangan_sampai_tahun_lalu = 0;
        }
        $this->akumulasi_keuangan_sebelum_tahun_aktif = $akumulasi_saldo_keuangan_sampai_tahun_lalu;

        // proses menghitung data grafik keuangan satu bulan, dihitung satu-satu per hari/tanggal
        for ($i = 1; $i <= $rentangTanggalKeuangan; $i++) {
            // jumlahkan pemasukan tahun ini
            if ($this->tahunAktif < date('Y')) {
                $pemasukan_sampai_tanggal_ini = Pemasukan::where('tipe', $this->keuanganAktif)->whereYear('created_at', $this->tahunAktif)->where('created_at', "<=", date('Y-m-d', strtotime($this->tahunAktif . '-' . $this->bulanAktif . '-' . $i)))->sum('nominal');
                $pengeluaran_sampai_tanggal_ini = Pengeluaran::where('tipe', $this->keuanganAktif)->whereYear('created_at', $this->tahunAktif)->where('created_at', "<=", date('Y-m-d', strtotime($this->tahunAktif . '-' . $this->bulanAktif . '-' . $i)))->sum('nominal');
            } else {
                $pemasukan_sampai_tanggal_ini = Pemasukan::where('tipe', $this->keuanganAktif)->whereDay('created_at', "<=", $i)->whereMonth('created_at', "<=", $this->bulanAktif)->whereYear('created_at', $this->tahunAktif)->sum('nominal');
                $pengeluaran_sampai_tanggal_ini = Pengeluaran::where('tipe', $this->keuanganAktif)->whereDay('created_at', "<=", $i)->whereMonth('created_at', "<=", $this->bulanAktif)->whereYear('created_at', $this->tahunAktif)->sum('nominal');
            }


            $saldo_pada_tanggal_ini = $pemasukan_sampai_tanggal_ini - $pengeluaran_sampai_tanggal_ini;
            $saldo_pada_tanggal_ini += $akumulasi_saldo_keuangan_sampai_tahun_lalu;
            array_push($track_keuangan, $saldo_pada_tanggal_ini);
        };
        $this->daftar_tanggal_bulan_ini = $daftar_tanggal_bulan_ini;
        $this->nominal_keuangan_bulan_ini = $track_keuangan;

        // hitung statistik keuangan satu bulan
    }

    public function refreshData()
    {
        $this->hitungDataGrafikKeuanganSatuBulan();
        // make an emit to refresh chart
        $this->emit('refreshMonthChart', [
            'daftar_tanggal_bulan_ini' => $this->daftar_tanggal_bulan_ini,
            'nominal_keuangan_bulan_ini' => $this->nominal_keuangan_bulan_ini,
            'label' => $this->dataKeuanganAktif->nama,
            'bulanAktif' => date('m'),
            'tahunAktif' => date('Y'),
        ]);
        // make an emit to update pemasukan and pengeluaran
        $this->emit('KeuanganAktifUpdated', [
            'keuanganAktif' => $this->keuanganAktif,
            'dataKeuanganAktif' => $this->dataKeuanganAktif,
            // get month from date
            'bulanAktif' => date('m'),
            'tahunAktif' => date('Y')
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.beranda.financial-chart');
    }
}
