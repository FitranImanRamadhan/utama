<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        $title = "Data jadwal";
        $jadwals = Jadwal::with('user')->paginate(15);
        $count = Jadwal::count();
        return view('jadwals.index', compact('jadwals', 'title', 'count'));
    }

    public function create()
    {
        $title = "Tambah data jadwal";
        $np = User::all();
        $value = new Keterangan();
        $data['ket_jadwal'] = $value->ket_jadwal;
        return view('jadwals.create', compact('title', 'np', 'data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tgl_masuk' => 'required|date',
            'ket_jadwal' => 'required',
        ]);

        Jadwal::create($validatedData);

        $message = [
            'alert-type' => 'success',
            'message' => 'Data schedule created successfully'
        ];

        return redirect()->route('jadwals.index')->with($message);
    }

    public function show(Jadwal $jadwal)
    {
        return view('jadwals.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $title = "Edit data jadwal";
        $np = User::all();
        $value = new Keterangan();
        $data['ket_jadwal'] = $value->ket_jadwal;
        return view('jadwals.edit', compact('jadwal', 'title', 'np', 'data'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tgl_masuk' => 'required|date',
            'ket_jadwal' => 'required',
        ]);

        $jadwal->update($validatedData);

        $message = [
            'alert-type' => 'success',
            'message' => 'Data schedule updated successfully'
        ];

        return redirect()->route('jadwals.index')->with($message);
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
    
        if ($jadwal) {
            $jadwal->delete();
    
            // Redirect ke view index setelah penghapusan berhasil
            return redirect()->route('jadwals.index')->with('success', 'Data jadwal berhasil dihapus.');
        }
    
        return response()->json(['message' => 'Jadwal not found.'], 404);
    }
    

}
