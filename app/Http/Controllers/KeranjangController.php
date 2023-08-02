<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use App\Models\Keranjang;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class KeranjangController extends Controller
{
    public function index(){
        $data = Keranjang::orderBy('created_at')->get()->groupBy(function ($transaction) {
            return $transaction->created_at->format('Y-m-d H:i');
        });
        return view('transaksi',compact('data'));
    }

    public function getKeranjang()
    {
        return Session::get('keranjang', []);
    }

    // public function index()
    // {
    // $data = Keranjang::orderBy('created_at')
    //     ->get()
    //     ->groupBy(function ($transaction) {
    //         // Mengubah created_at menjadi objek Carbon untuk memanfaatkan metode perbandingan
    //         return Carbon::parse($transaction->created_at)->format('Y-m-d H:i:s');
    //     })
    //     ->filter(function ($groupedData) {
    //         // Filter hanya mengambil grup dengan detik terkecil
    //         return $groupedData->min('created_at');
    //     });

    // return view('transaksi', compact('data'));
    // }

    public function saveKeranjang(Request $request)
{
    $nama = $request->input('nama');
    $harga = $request->input('harga');
    $jumlah = $request->input('jumlah');
    $total = $request->input('total');
    $no_meja = $request->input('no_meja');

    $totalKeseluruhan = 0;

    // Hitung total keseluruhan
    foreach ($total as $subtotal) {
        $totalKeseluruhan += $subtotal;
    }

    $errors = [];

    foreach ($nama as $index => $item) {
        $menu = Menu::where('nama', $nama[$index])->first();

        // Cek apakah stok mencukupi
        if ($menu->stok < $jumlah[$index]) {
            $errors[] = "Stok menu {$menu->nama} tidak mencukupi.";
            continue;
        }

        // Cek batas maksimal pesanan
        $maxOrder = $menu->stok;
        if ($jumlah[$index] > $maxOrder) {
            $errors[] = "Maksimal pesanan untuk menu {$menu->nama} adalah {$maxOrder}.";
            continue;
        }

        $keranjang = new Keranjang;
        $keranjang->nama = $nama[$index];
        $keranjang->harga = $harga[$index];
        $keranjang->jumlah = $jumlah[$index];
        $keranjang->total = $total[$index];
        $keranjang->no_meja = $no_meja[$index];
        $keranjang->total_keseluruhan = $totalKeseluruhan;

        // Simpan data ke database
        $keranjang->save();
        

        // Kurangi stok menu sesuai dengan jumlah yang dipesan
        $menu->stok -= $jumlah[$index];
        $menu->save();
    }

    if (count($errors) > 0) {
        return redirect()->back()->withErrors($errors);
    }

    // Redirect atau tindakan lain setelah penyimpanan
    return redirect()->back()->with('success', 'Data keranjang berhasil disimpan.');
}

public function printNota($created_at)
{
    $keranjang = Keranjang::where('created_at', $created_at)->get();

    if ($keranjang->isEmpty()) {
        abort(404); // Menampilkan halaman 404 jika data keranjang tidak ditemukan
    }

    $data = $keranjang->map(function ($item) {
        return [
            'nama' => $item->nama,
            'jumlah' => $item->jumlah,
            'harga' => $item->harga,
            'total' => $item->total,
        ];
    });

    return view('cetak_nota', compact('keranjang', 'data'));
}

// public function deleteKeranjang($index)
// {
//     $keranjang = $this->getKeranjang();

//     if (isset($keranjang[$index])) {
//         unset($keranjang[$index]);
//         Session::put('keranjang', $keranjang);
//     }

//     return redirect()->back()->with('success', 'Item keranjang berhasil dihapus.');
// }

public function hapusItem($index)
{
    // Lakukan logika penghapusan item dari keranjang berdasarkan indeksnya
    $keranjang = session('keranjang'); // Ambil data keranjang dari sesi atau sumber data lainnya

    if (isset($keranjang[$index])) {
        unset($keranjang[$index]); // Hapus item dari keranjang berdasarkan indeksnya
        session(['keranjang' => $keranjang]); // Simpan kembali data keranjang setelah item dihapus
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}

}

