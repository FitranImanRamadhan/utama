<?php

namespace App\Http\Controllers;

use App\Exports\Exportpotongan; // Perhatikan penamaan kelas
use App\Models\Potongan;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

class PotonganController extends Controller
{
    public function index()
    {
        $title = "Data potongans";
        $potongans = Potongan::with('user')->paginate(15);
        return view('potongans.index', compact('potongans', 'title')); // Mengubah compact agar sesuai
    }

    public function create()
    {
        $title = "Tambah data potongan";
        $np = User::all();
        return view('potongans.create', compact('title','np')); // Mengubah compact agar sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'bulan' => 'required',
            'zakat' => 'required',
            'tnj_istri' => 'required',
            'tnj_anak' => 'required',
            'tnj_umum' => 'required',
            'tnj_beras' => 'required',
            'pph' => 'required',
            'tnj_struktural' => 'required',
            'tnj_fungsional' => 'required',
            'tnj_terpencil' => 'required',
            'pembulatan' => 'required',
            'tnj_kinerja' => 'required',
            'tnj_makan' => 'required',
            'total_gaji' => 'required',
        ]);

        Potongan::create($request->post());

        return redirect()->route('potongans.index')->with('success', 'Gaji has been created successfully.'); // Mengubah pesan success agar sesuai
    }

    public function show(Potongan $potongan)    
    {
        return view('potongans.show', compact('potongan')); // Mengubah compact agar sesuai
    }

    public function tampilkanLaporan()
    {
        $title = "Laporan";
        $potongans = Potongan::with('user')->paginate(15);
    
        return view('potongans.laporan_gaji', ['title' => $title, 'potongans' => $potongans]);
    }
    
    
    public function edit(Potongan $potongan)
    {
        $title = "Edit Data Gaji";
        $np = User::all();
        return view('potongans.edit', compact('potongan', 'title','np'));
    }

    public function update(Request $request, Potongan $potongan)
{
    $request->validate([
        'user_id' => 'required',
        'bulan' => 'required',
        'zakat' => 'required',
        'tnj_istri' => 'required',
        'tnj_anak' => 'required',
        'tnj_umum' => 'required',
        'tnj_beras' => 'required',
        'pph' => 'required',
        'tnj_struktural' => 'required',
        'tnj_fungsional' => 'required',
        'tnj_terpencil' => 'required',
        'pembulatan' => 'required',
        'tnj_kinerja' => 'required',
        'tnj_makan' => 'required',
        'total_gaji' => 'required',
    ], [
        'user_id.unique' => 'NIP sudah ada, pilih NIP yang lain.'
    ]);

    $potongan->fill($request->post())->save();

    return redirect()->route('potongans.index')->with('success', 'Gaji has been updated successfully');
}


public function potonganBerdasarkanBulan(Request $request)
{
    // Ambil input bulan dari request
    $bulan = $request->input('bulan');

    // Ubah format bulan ke dalam format yang dikenali oleh Carbon (YYYY-MM)
    $bulanFormatted = Carbon::createFromFormat('Y-m', $bulan)->format('Y-m');

    // Ambil data potongan berdasarkan bulan
    $potonganByMonth = Potongan::where('bulan', $bulanFormatted)
        ->where('user_id', auth()->user()->id) // Filter berdasarkan user yang sedang login
        ->with('user')
        ->paginate(15);

    // Tampilkan ke view yang sesuai
    return view('potongans.laporan_potongan', ['potongans' => $potonganByMonth, 'title' => 'Potongan Berdasarkan Bulan']);
}


    public function destroy(Potongan $potongan)
    {
        $potongan->delete();
        return redirect()->route('potongans.index')->with('success', 'potongan has been deleted successfully'); // Mengubah pesan success agar sesuai
    }

    public function exportExcel()
    {
        return Excel::download(new Exportpotongan, 'potongans.xlsx');
    }
}
