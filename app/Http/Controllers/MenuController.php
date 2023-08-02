<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function tambahmenu(){
        return view('tambahmenu');
    }

    public function insertmenu(Request $request){
        $request->validate([
            'nama' => ['required', 'unique:menus'],
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);
        $data = menu::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('gambarmenu/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('/menu')->with('success', 'Registration is successful!! you can login');
    }
    
    public function index(){
        $data = menu::all();
        return view('datamenu',compact('data'));
    }
    public function index2(){
        $keranjang = [];
        $data = menu::all();
        return view('about',compact('data', 'keranjang'));
    }

    public function tampilkandata($id) {

        $data = menu::find($id);
        return view('tampildata', compact('data'));
    }
    public function tampilkandata2($id) {

        $data = menu::find($id);
        return view('about', compact('data'));
    }

    public function updatedata(Request $request, $id) {
        $request->validate([
            'nama' => ['required'],
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:5000',
        ]);
        $data = menu::find($id);
        $data->nama = $request->input('nama');
        $data->harga = $request->input('harga');
        $data->stok = $request->input('stok');
    
        if ($request->hasFile('gambar')) {
    
            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambar->move('gambarmenu/', $gambar->getClientOriginalName());
            $data->gambar = $gambar->getClientOriginalName();
        }
    
        $data->save();
    
        return redirect('/menu')->with('success', 'Data berhasil diupdate');
    }
    

    public function delete($id) {
        $data = menu::find($id);
        $data->delete();
        return redirect('/menu');
    }
}
