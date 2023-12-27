<?php

namespace App\Http\Controllers;

use App\Exports\ExportJabatan;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JabatanController extends Controller
{
    public function index()
    {
        $title = "Data Jabatan";
        $jabatans = Jabatan::orderBy('id', 'asc')->paginate(5);
        return view('jabatans.index', compact(['jabatans', 'title']));
    }

    public function create()
    {
        $title = "Tambah data position";
        return view('jabatans.create', compact(['title']));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'keterangan',
            'alias',
        ]);

        Jabatan::create($request->post());

        return redirect()->route('jabatans.index')->with('success', 'Jabatan has been created successfully.');
    }


    public function show(Jabatan $jabatan)
    {
        return view('jabatans.show', compact('jabatans'));
    }


    public function edit(Jabatan $jabatan)
    {
        $title = "Edit Data position";
        return view('jabatans.edit', compact('position', 'title'));
    }


    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',
            'alias' => 'required',
        ]);

        $jabatan->fill($request->post())->save();

        return redirect()->route('jabatans.index')->with('success', 'Jabatan Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatans
     * @return \Illuminate\Http\Response
     */

     
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatans.index')->with('success', 'Jabatan has been deleted successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportJabatan, 'jabatans.xlsx');
    }
}
