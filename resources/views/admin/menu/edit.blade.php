@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/adSuntingProduct.css') }}">

@section('content')    
</div>
</div>
    <div class="description">Sunting Produk</div>
    <div class="content">
        <div class="informasi">Informasi Produk</div>
        <div class="cardPesan">
            <div class="cardPesan"> 
                <form method="POST" action="{{ url('/menu/'.$menu->id_menu) }}" class="form-horizontal" enctype='multipart/form-data'>
                    @csrf {!! method_field('PUT') !!}
                    
                    <!-- Nama Menu -->
                    <div class="textarea-container">
                        <div class="tulisan-pesan">Nama Produk :</div>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Masukkan nama produk" value="{{ old('nama_menu', $menu->nama_menu) }}" required></input>

                        @error('nama_menu')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <!-- Deskripsi Menu -->
                    <div class="textarea-container">
                        <div class="tulisan-pesan">Deskripsi Produk :</div>
                        <input type="text" class="form-control" id="deskripsi_menu" name="deskripsi_menu" placeholder="Masukkan deskripsi produk" value="{{ old('deskripsi_menu', $menu->deskripsi_menu) }}" required></input>

                        @error('deskripsi_menu')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Harga Menu -->
                    <div class="textarea-container">
                        <div class="tulisan-pesan">Harga Produk :</div>
                        <input type="text" class="form-control" id="harga_menu" name="harga_menu" placeholder="Masukkan harga produk" value="{{ old('harga_menu', $menu->harga_menu) }}" required></input>

                        @error('harga_menu')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
        
                    {{-- Gambar Menu --}}
                    <div class="textarea-container">
                        <div class="tulisan-pesan">Foto Produk :</div>
                        <input type="file" class="form-control" id="gambar_menu" name="gambar_menu" value="{{ old('gambar_menu', $menu->gambar_menu) }}" required>

                        @error('gambar_menu')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
        
                    <!-- Stok Menu -->
                    <div class="textarea-container">
                        <div class="tulisan-pesan">Stok Awal :</div>
                        <input type="text" class="form-control" id="stok_menu" name="stok_menu" placeholder="Masukkan harga produk" value="{{ old('stok_menu', $menu->stok_menu) }}" required></input>

                        @error('stok_menu')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="button-container">
                        <button type="reset" class="batal-button">Batal</button>
                        <button type="submit" class="pesan-button">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="kembali-button" href="{{ url('menu') }}">Kembali</a>
</div>
@endsection