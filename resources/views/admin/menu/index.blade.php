@extends('layouts.template')

<link rel="stylesheet" href="{{ asset('css/adBerandaAdmin.css') }}">

@section('content')
</div>
</div>   
    <div class="content">
        <div class="background-image">
            <div class="description">HI. ADMIN!!</div>
                <span class="selamat">Selamat Datang di POS E-Kantin Jurusan Teknologi Informasi</span>

                {{-- Error Alert --}}
                @if(session('success'))
                    <div class='alert alert-success'>{{ session('success' ) }}</div>
                @endif
                @if(session('error'))
                    <div class='alert alert-danger'>{{ session('error' ) }}</div>
                @endif

                <button class="add-btn" onclick="window.location.href='{{ route('menu.create') }}'"><b>Tambah</b></button>

        </div>
            {{-- Table --}}
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok Awal</th>
                        <th>Rating dan Review</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                @foreach ($menu as $menu)
                <tbody>
                    <tr>
                        <td><img src="{{ asset('storage/menu/'.$menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" style="border-radius: 8px;"></td>
                        <td >{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->deskripsi_menu }}</td>
                        <td>Rp {{ $menu->harga_menu }}</td>
                        <td>{{ $menu->stok_menu }} pcs</td>
                        <td><a href="" style="color: #DE5D01">4.9/5<br><u>Lihat review</u></a></td>
                        {{-- {{ route('Admin.RatingdanReview') }} --}}
                        <td><button class="status-btn"><b>Ready</b></button></td>
                        <td>
                            <button class="edit-btn" onclick="window.location.href='{{ route('menu.edit',$menu->id_menu) }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                </svg>
                            </button>
                            <form action="{{ route('menu.destroy', $menu->id_menu) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Apakah Anda yakin menghapus data ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
    </div>
@endsection