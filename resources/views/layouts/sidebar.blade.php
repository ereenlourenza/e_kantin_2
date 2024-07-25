<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <button class="openSidebarButton" onclick="showSidebar()"> <img src="{{ asset('/img/menu.png') }}" alt="E Kantin Logo"></button>
    <div class="sidebar-content">
        <div class="customer-icon">
            <img src="{{ asset('/img/user.png') }}" alt="Icon 2">
        </div>
        
        <span class="customer-name">Admin</span>
        
        <button class="menu-button" onclick="goToRoute('BerandaAdmin')">Semua produk</button>
        <button class="menu-button" onclick="goToRoute('LaporanPenjualan')">Laporan penjualan</button>
        <button class="menu-button" onclick="goToRoute('InputLaporan')">Input laporan penjualan</button>
        <button class="menu-button" onclick="goToRoute('KelolaPesanan')">Kelola pesanan</button>
        <button class="menu-button" onclick="goToRoute('KelolaAkunCustomer')">Kelola akun customer</button>
        <button class="menu-button3" onclick="logout()">Keluar Akun</button>
    </div>
</div>