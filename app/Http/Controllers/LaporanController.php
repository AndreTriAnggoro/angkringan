<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Menu;

class LaporanController extends Controller
{
    public function index(){
        $data = Keranjang::all();
        return view('laporan',compact('data'));
    }
    public function indexowner(){
        $data = Keranjang::all();
        return view('laporanowner',compact('data'));
    }

    public function generate(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'created_at' => 'required|date',
        ]);

        // Ambil tanggal dari input
        $tanggal = $request->input('created_at');

        // Query data berdasarkan tanggal
        $laporan = Keranjang::whereDate('created_at', $tanggal)
        ->orderBy('nama') // Menyusun data berdasarkan nama menu
        ->get();

        $totalPendapatan = $laporan->sum('total');
        
        $totalJumlahPerMenuTanggal = $laporan->groupBy(['nama'])->map(function ($items) {
            return $items->sum('jumlah');
        });
        $totalPerMenuTanggal = $laporan->groupBy(['nama'])->map(function ($items) {
            return $items->sum('total');
        });
        
        $stokMenu = Menu::whereIn('nama', $laporan->pluck('nama'))->pluck('stok', 'nama');

        // Kirim data laporan ke view
        $data = Keranjang::all();
        return view('result', compact('laporan', 'totalPendapatan', 'totalJumlahPerMenuTanggal', 'stokMenu', 'totalPerMenuTanggal'));
    }
    public function generateowner(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'created_at' => 'required|date',
        ]);

        // Ambil tanggal dari input
        $tanggal = $request->input('created_at');

        // Query data berdasarkan tanggal
        $laporan = Keranjang::whereDate('created_at', $tanggal)
        ->orderBy('nama') // Menyusun data berdasarkan nama menu
        ->get();

        $totalPendapatan = $laporan->sum('total');
        
        $totalJumlahPerMenuTanggal = $laporan->groupBy(['nama'])->map(function ($items) {
            return $items->sum('jumlah');
        });
        $totalPerMenuTanggal = $laporan->groupBy(['nama'])->map(function ($items) {
            return $items->sum('total');
        });
        
        $stokMenu = Menu::whereIn('nama', $laporan->pluck('nama'))->pluck('stok', 'nama');

        // Kirim data laporan ke view
        $data = Keranjang::all();
        return view('resultowner', compact('laporan', 'totalPendapatan', 'totalJumlahPerMenuTanggal', 'stokMenu', 'totalPerMenuTanggal'));
    }
}
