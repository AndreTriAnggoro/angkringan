<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function indexowner()
    {
        return view('dashboard.indexowner');
    }
    public function indexdapur()
    {
        $keranjangs = Keranjang::all(); // Query untuk mengambil data dari tabel keranjangs
        $menus = Menu::all();
        return view('dashboard.indexdapur', compact('keranjangs', 'menus'));
    }
    
}
