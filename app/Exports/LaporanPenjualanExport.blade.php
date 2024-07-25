<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPenjualanExport implements FromView
{
    protected $data;
    protected $total_pemasukan;

    public function __construct($data, $total_pemasukan)
    {
        $this->data = $data;
        $this->total_pemasukan = $total_pemasukan;
    }

    public function view(): View
    {
        return view('laporan_penjualan_excel', [
            'data' => $this->data,
            'total_pemasukan' => $this->total_pemasukan
        ]);
    }
}
