<?php

namespace App\Http\Controllers;

use App\Exports\Exportgolongans;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GolonganController extends Controller
{
    public function index()
    {
        $title = "Data golongans";
        $golongans = Golongan::orderBy('id', 'asc')->paginate(5);
        return view('golongans.index', compact(['golongans', 'title']));
    }

    public function create()
    {
        $title = "Tambah data golongan";
        return view('golongans.create', compact(['title']));
    }


    public function store(Request $request)
    {
        $request->validate([
            'golongan' => 'required|unique:golongans',
            'pangkat'=>'required'
        ]);

        Golongan::create($request->post());

        return redirect()->route('golongans.index')->with('success', 'golongans has been created successfully.');
    }


    public function show(Golongan $golongan)
    {
        return view('golongans.show', compact('golongans'));
    }


    public function edit(Golongan $golongan)
    {
        $title = "Edit Data golongan";
        return view('golongans.edit', compact('golongan', 'title'));
    }


    public function update(Request $request, Golongan $golongan)
    {
        $request->validate([
            'golongan' => 'required|unique:golongans',
            'pangkat' => 'required',
        ]);

        $golongan->fill($request->post())->save();

        return redirect()->route('golongans.index')->with('success', 'golongans Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Golongan  $golongans
     * @return \Illuminate\Http\Response
     */

     
    public function destroy(Golongan $golongan)
    {
        $golongan->delete();
        return redirect()->route('golongans.index')->with('success', 'golongans has been deleted successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportGolongan, 'golongans.xlsx');
    }
}
