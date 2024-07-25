<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'm_menu';
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'nama_menu',
        'deskripsi_menu',
        'harga_menu',
        'gambar_menu',
        'stok_menu',
    ];

}
