<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menu = MenuModel::all();
        return view('admin.menu.index', ['menu' => $menu]);
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request){
        $newMenu = $request->validate([
            'nama_menu'         => 'required|string|max:100',
            'deskripsi_menu'    => 'required|string',
            'harga_menu'        => 'required|integer',
            'gambar_menu'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok_menu'         => 'required|integer',
        ]);

        // Store Image
        $menuImg = $newMenu['gambar_menu'];
        $menuName = $request->gambar_menu->hashName();
        $menuImg->storeAs('public/menu', $menuName);

        // MenuModel::create($request->all());
        MenuModel::create([
            'nama_menu'         => $request->nama_menu,
            'deskripsi_menu'    => $request->deskripsi_menu,
            'harga_menu'        => $request->harga_menu,
            'gambar_menu'       => $menuName,
            'stok_menu'         => $request->stok_menu,
        ]);

        // Overide Image
        $newMenu['gambar_menu'] = $menuName;

        // return redirect()->route('menu.index')->with('success','Data menu telah tersimpan.');
        return redirect('/menu')->with('success','Data menu telah tersimpan.');
    }

    public function show($id)
    {
        $menu = MenuModel::find($id);

        return view('menu.show');
    }

    public function edit($id)
    {
        $menu = MenuModel::find($id);

        return view('admin.menu.edit', ['menu' => $menu]);
    }

    public function update(Request $request, $id){
        $newMenu = $request->validate([
            'nama_menu'         => 'required|string|max:100',
            'deskripsi_menu'    => 'required|string',
            'harga_menu'        => 'required|integer',
            'gambar_menu'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok_menu'         => 'required|integer',
        ]);

        // Store Image
        $menuImg = $newMenu['gambar_menu'];
        $menuName = $request->gambar_menu->hashName();
        $menuImg->storeAs('public/menu', $menuName);

        // MenuModel::create($request->all());
        MenuModel::find($id)->update([
            'nama_menu'         => $request->nama_menu,
            'deskripsi_menu'    => $request->deskripsi_menu,
            'harga_menu'        => $request->harga_menu,
            'gambar_menu'       => $menuName,
            'stok_menu'         => $request->stok_menu,
        ]);

        // Overide Image
        $newMenu['gambar_menu'] = $menuName;

        // return redirect()->route('menu.index')->with('success','Data menu telah diupdate.');
        return redirect('/menu')->with('success','Data menu telah diupdate.');
    }
    
    public function destroy($id){
        $check = MenuModel::find($id);
        if(!$check){        //untuk mengecek apakah data barang dengan id yang dimaksud ada atau tidak
            return redirect('/menu')->with('error', 'Data menu tidak ditemukan');
        }

        try{
            MenuModel::destroy($id); //Hapus data kategori

            return redirect('/menu')->with('success', 'Data menu berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            //jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/menu')->with('error', 'Data menu gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
