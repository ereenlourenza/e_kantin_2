<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPenjualanExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPenjualanController extends Controller
{
    public function showLaporanPenjualan()
    {
        $data = $this->getData();
        return view('admin.laporan.LaporanPenjualanChart', compact('data'));
    }
    private function getData()
    {
        return [
            [
                'tanggal' => '01/04/2024',
                'nama_produk' => 'Tahu Isi',
                'kategori' => 'Gorengan',
                'harga' => 2500,
                'stok_awal' => '50pcs',
                'terjual' => '45pcs',
                'sisa_stok' => '5pcs',
                'total_pemasukan' => 112500
            ],
            [
                'tanggal' => '01/04/2024',
                'nama_produk' => 'Martabak',
                'kategori' => 'Gorengan',
                'harga' => 2600,
                'stok_awal' => '50pcs',
                'terjual' => '40pcs',
                'sisa_stok' => '10pcs',
                'total_pemasukan' => 104000
            ],
            [
                'tanggal' => '01/04/2024',
                'nama_produk' => 'Martabak',
                'kategori' => 'Makanan Berat',
                'harga' => 10000,
                'stok_awal' => '15pcs',
                'terjual' => '10pcs',
                'sisa_stok' => '5pcs',
                'total_pemasukan' => 100000
            ],
            [
                'tanggal' => '01/04/2024',
                'nama_produk' => 'Ultramilk Chocolate',
                'kategori' => 'Minuman',
                'harga' => 5000,
                'stok_awal' => '25pcs',
                'terjual' => '25pcs',
                'sisa_stok' => '-',
                'total_pemasukan' => 125000
            ],
            [
                'tanggal' => '30/05/2024',
                'nama_produk' => 'Tahu Isi',
                'kategori' => 'Makanan',
                'harga' => 2500,
                'stok_awal' => '20pcs',
                'terjual' => '10pcs',
                'sisa_stok' => '10pcs',
                'total_pemasukan' => 25000
            ],
        ];
    }

    public function index()
    {
        return redirect()->route('Admin.LaporanPenjualan.chart');
    }

    public function chart()
    {
        $data = $this->getData();
        return view('Admin.LaporanPenjualanChart', compact('data'));
    }

    public function table()
    {
        $data = $this->getData();
        $total_pemasukan = array_sum(array_column($data, 'total_pemasukan'));
        return view('admin.laporan.LaporanPenjualanExcel', compact('data', 'total_pemasukan'));
    }

    public function export()
    {
        $data = $this->getData();
        $total_pemasukan = array_sum(array_column($data, 'total_pemasukan'));

        return Excel::download(new LaporanPenjualanExport($data, $total_pemasukan), 'Admin.LaporanPenjualan.export');
    }

    public function tambahPenjualan($idPesanan)
    {
        // Di sini Anda dapat menambahkan logika untuk menambahkan data penjualan berdasarkan $idPesanan
        // Contoh:
        $pesanan = Pesanan::find($idPesanan);
        $penjualan = new Penjualan();
        $penjualan->nama_produk = $pesanan->nama_produk;
        $penjualan->kategori = $pesanan->kategori;
        // Tambahkan logika lain sesuai kebutuhan
        $penjualan->save();

        return response()->json(['message' => 'Data penjualan berhasil ditambahkan'], 200);
    }
}