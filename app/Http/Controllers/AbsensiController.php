<?php

namespace App\Http\Controllers;

use App\Exports\Exportabsensi; // Perhatikan penamaan kelas
use App\Models\Absensi;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;

use Illuminate\Support\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $title = "Data absensi";
       $absensis = Absensi::with('user')->paginate(15);
        return view('absensis.index', compact('absensis', 'title')); // Mengubah compact agar sesuai
    }

    public function create()
    {
        $title = "Tambah data absensi";
        $np = User::all();
        return view('absensis.create', compact('title','np')); // Mengubah compact agar sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'user_id.*' => 'required|exists:users,id',
            'hadir.*' => 'required|numeric',
            'sakit.*' => 'required|numeric',
            'alpha.*' => 'required|numeric',
        ], [
            'user_id.*.required' => 'User ID is required.',
            'user_id.*.exists' => 'Invalid user ID provided.',
            'hadir.*.required' => 'Hadir field is required.',
            'hadir.*.numeric' => 'Hadir field must be numeric.',
            'sakit.*.required' => 'Sakit field is required.',
            'sakit.*.numeric' => 'Sakit field must be numeric.',
            'alpha.*.required' => 'Alpha field is required.',
            'alpha.*.numeric' => 'Alpha field must be numeric.',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $userIds = $request->user_id;
        $hadir = $request->hadir;
        $sakit = $request->sakit;
        $alpha = $request->alpha;

        $attendanceData = [];

        // Prepare data for attendance records
        foreach ($userIds as $index => $userId) {
            $attendanceData[] = [
                'user_id' => $userId,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'hadir' => $hadir[$index],
                'sakit' => $sakit[$index],
                'alpha' => $alpha[$index],
                // You can add more fields here if needed
            ];
        }

        // Insert attendance records into the database
        Absensi::insert($attendanceData);

        return redirect()->route('absensis.index')->with('success', 'Absen berhasi ditambahkan');
    }


    public function show(Absensi $absensi)    
    {
        return view('absensis.show', compact('absensi')); // Mengubah compact agar sesuai
    }

    
    
    public function edit(Absensi $absensi)
    {
        $title = "Edit Data absensi";
        $np = User::all();
        return view('absensis.edit', compact('absensi', 'title','np'));
    }

    public function update(Request $request, Absensi $absensi)
    {
    $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'user_id' => 'required',
            'hadir' => 'required',
            'sakit' => 'required',
            'alpha' => 'required',
    ], [
        'user_id.unique' => 'NIP sudah ada, pilih NIP yang lain.'
    ]);

    $absensi->fill($request->post())->save();

    return redirect()->route('absensis.index')->with('success', 'potongan has been updated successfully');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensis.index')->with('success', 'potongan has been deleted successfully'); // Mengubah pesan success agar sesuai
    }



public function getDataForTable(Request $request)
{
    $title = "Data absensi";
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Lakukan pemfilteran data berdasarkan bulan dan tahun jika keduanya telah dipilih
    if ($bulan && $tahun) {
        $absensis = Absensi::where('bulan', $bulan)
                            ->where('tahun', $tahun)
                            ->get();
    } else {
        // Jika tidak ada filter bulan dan tahun, ambil semua data absensi
        $absensis = Absensi::all();
    }

    return view('absensis.index', ['title' => $title, 'absensis' => $absensis]); // Kirim data yang telah difilter ke view
}
public function getDataAll()
{
    $title = "Data absensi";
    $absensis = Absensi::all();
    
    return view('absensis.index', ['title' => $title, 'absensis' => $absensis]);
}


public function laporan()
    {
        $title = "Laporan";
        $absensis = Absensi::with('user')->paginate(15);
    
        return view('absensis.laporan_absensi', ['title' => $title, 'absensis' => $absensis]);
    }
   
    public function exportByMonthYear(Request $request)
{
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Lakukan validasi bulan dan tahun
    $request->validate([
        'bulan' => 'required|numeric|min:1|max:12',
        'tahun' => 'required|numeric|min:1900|max:'.(date('Y')+1), // Mengatur batasan tahun, di sini diset hingga tahun berjalan
    ]);

    // Ambil data absensi sesuai dengan bulan dan tahun yang dipilih
    $absensis = Absensi::where('bulan', $bulan)
                        ->where('tahun', $tahun)
                        ->get();

    // Jika tidak ada data, kembalikan ke halaman sebelumnya dengan pesan
    if ($absensis->isEmpty()) {
        return redirect()->back()->with('error', 'Tidak ada data absensi untuk bulan dan tahun yang dipilih.');
    }

    // Buat nama file Excel
    $fileName = 'Data_Absensi_' . Carbon::parse("{$tahun}-{$bulan}-01")->format('F_Y') . '.xlsx';

    // Export data ke Excel menggunakan Maatwebsite\Excel
    return Excel::download(new AbsensiExport($absensis), $fileName);
}
}
