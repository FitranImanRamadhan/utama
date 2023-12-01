<?php

namespace App\Http\Controllers;

use App\Exports\ExportGaji; // Perhatikan penamaan kelas
use App\Models\Gaji;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GajiController extends Controller
{
    public function index()
    {
        $title = "Data gajis";
        $gajis = Gaji::with('user')->paginate(15);
        return view('gajis.index', compact('gajis', 'title')); // Mengubah compact agar sesuai
    }

    public function create()
    {
        $title = "Tambah data Gaji";
        $np = User::whereNotIn('id', Gaji::pluck('user_id')->toArray())->get();
        return view('gajis.create', compact('title','np')); // Mengubah compact agar sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:gajis,user_id',
            'gapok' => 'required',
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

        Gaji::create($request->post());

        return redirect()->route('gajis.index')->with('success', 'Gaji has been created successfully.'); // Mengubah pesan success agar sesuai
    }

    public function show(Gaji $gaji)    
    {
        return view('gajis.show', compact('gaji')); // Mengubah compact agar sesuai
    }

    public function edit(Gaji $gaji)
    {
        $title = "Edit Data Gaji";
        $np = User::all();
        return view('gajis.edit', compact('gaji', 'title','np'));
    }

    public function update(Request $request, Gaji $gaji)
{
    $request->validate([
        'user_id' => 'required|unique:gajis,user_id,' . $gaji->id,
        'gapok' => 'required',
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

    $gaji->fill($request->post())->save();

    return redirect()->route('gajis.index')->with('success', 'Gaji has been updated successfully');
}

    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect()->route('gajis.index')->with('success', 'Gaji has been deleted successfully'); // Mengubah pesan success agar sesuai
    }

    public function exportExcel()
    {
        return Excel::download(new ExportGaji, 'gajis.xlsx');
    }
}
