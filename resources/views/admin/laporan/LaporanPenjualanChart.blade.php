<!-- resources/views/customer/login.blade.php -->

@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/adLaporanPenjualan.css') }}">

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
<canvas id="penjualanChart" width="400" height="200"></canvas>
    <div class="btn-container">
        <a href="{{ route('Admin.LaporanPenjualan.table') }}" class="btn">Lihat Tabel</a>
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

      // Data untuk bar chart (contoh)
      var data = {
          labels: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5', 'Item 6', 'Item 7', 'Item 8', 'Item 9', 'Item 10'],
          datasets: [{
              label: 'Data',
              backgroundColor: '#DE5D01', // Warna batang
              data: [12, 19, 3, 5, 2] // Data nilai
          }]
      };
  
      // Konfigurasi chart
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
              borderWidth: 0 // Menghilangkan garis pada chart
          }
      }
    };
  
      // Inisialisasi chart
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

//chart
const data = @json($data);

const labels = data.map(item => item.nama_produk);
const values = data.map(item => parseInt(item.terjual.replace('pcs', '')));

const ctx = document.getElementById('penjualanChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Terjual',
            data: values,
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
  </script>
