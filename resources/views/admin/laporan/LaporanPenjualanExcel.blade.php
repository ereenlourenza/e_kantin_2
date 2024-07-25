<!-- resources/views/customer/login.blade.php -->

@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/adLaporanPenjualanTB.css') }}">

@section('content')          
    </div>
  </div>
    
  
<!-- Main content of your page -->
<div class="description">Laporan Penjualan</div>
<div class="buttons">
    <button class="left-button">Makanan</button>
    <button class="right-button">Minuman</button>
</div>
<div class="content">
  <div class="chart-container">
    <canvas id="bar-chart"></canvas>
</div>
<button id="toggle-report" class="print-button">Laporan Table</button>
<div id="table-container" style="display:none;">
  <table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok Awal</th>
            <th>Terjual</th>
            <th>Sisa Stok</th>
            <th>Total Pemasukan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item['tanggal'] }}</td>
            <td>{{ $item['nama_produk'] }}</td>
            <td>{{ $item['kategori'] }}</td>
            <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
            <td>{{ $item['stok_awal'] }}</td>
            <td>{{ $item['terjual'] }}</td>
            <td>{{ $item['sisa_stok'] }}</td>
            <td>Rp{{ number_format($item['total_pemasukan'], 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="total">
            <td colspan="7">Total Pemasukan</td>
            <td>Rp{{ number_format($total_pemasukan, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>
{{-- <button id="toggle-table" class="print-button" onclick="toggleReportView()">Tampilkan Table</button> --}}
</div>
<button id="toggle-report" class="printLP-button" onclick="window.print()">Cetak Laporan</button>


  <button class="kembali-button">Kembali</button>
  <button class="Input-Laporan">Input Laporan</button>

</div>
@endsection


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const kembaliButton = document.querySelector('.kembali-button');

    // Tambahkan event listener untuk mengarahkan kembali ke halaman beranda saat tombol diklik
    kembaliButton.addEventListener('click', function() {
        window.location.href = '/BerandaAdmin'; // Ganti 'beranda.html' dengan URL halaman beranda Anda
    });

    // Input-Laporan
    const InputLaporan = document.querySelector('.Input-Laporan');

    // Tambahkan event listener untuk mengarahkan kembali ke halaman beranda saat tombol diklik
    InputLaporan.addEventListener('click', function() {
        window.location.href = '/InputLaporan'; // Ganti 'beranda.html' dengan URL halaman beranda Anda
    });

    // Generate labels for each day in May
    var labels = [];
    for (var i = 1; i <= 31; i++) {
        labels.push('Mei ' + i);
    }

    // Sample data for Makanan and Minuman for each day in May
    var makananData = [45, 40, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0];
    var minumanData = [25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    var data = {
        labels: labels,
        datasets: [
            {
                label: 'Makanan',
                backgroundColor: '#DE5D01',
                data: makananData
            },
            {
                label: 'Minuman',
                backgroundColor: '#1E88E5',
                data: minumanData
            }
        ]
    };

    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        elements: {
            line: {
                borderWidth: 0
            }
        }
    };

    var ctx = document.getElementById('bar-chart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });

    function toggleReportView() {
    var chartContainer = document.querySelector('.chart-container');
    var tableContainer = document.getElementById('table-container');
    var toggleButton = document.getElementById('toggle-report');

    if (chartContainer.style.display !== 'none') {
        chartContainer.style.display = 'none';
        tableContainer.style.display = 'block';
        toggleButton.textContent = 'Tampilkan Grafik';
    } else {
        chartContainer.style.display = 'block';
        tableContainer.style.display = 'none';
        toggleButton.textContent = 'Tampilkan Table';
    }
}

// Menambahkan event listener untuk tombol "Cetak Laporan"
document.getElementById('toggle-report').addEventListener('click', toggleReportView);


function printTable() {
    // Mengambil elemen tabel laporan
    var tableToPrint = document.getElementById('table-container').outerHTML;
    // Membuat jendela cetak baru
    var newWin = window.open('');
    // Menambahkan tabel laporan ke jendela cetak baru
    newWin.document.write('<html><head><title>Laporan</title></head><body>');
    newWin.document.write(tableToPrint);
    newWin.document.write('</body></html>');
    // Mencetak jendela baru
    newWin.print();
    // Menutup jendela baru setelah pencetakan selesai
    newWin.close();
}
document.getElementById('export-table').addEventListener('click', function() {
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.table_to_sheet(document.querySelector('table'));
            XLSX.utils.book_append_sheet(wb, ws, 'Laporan');
            XLSX.writeFile(wb, 'Laporan_Penjualan.xlsx');
        });
  </script>
