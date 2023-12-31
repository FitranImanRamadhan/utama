<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RAK;
use App\Models\RAKDetail;
use Illuminate\Http\Request;
use App\Charts\RakLineChart;

class RAKController extends Controller
{
    public function index()
    {
        $title = "Data RAK";
        $raks = RAK::orderBy('id', 'asc')->paginate(5);
        return view('raks.index', compact(['raks', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data RAK";
        $managers = User::where('position', '1')->orderBy('id', 'asc')->get();
        return view('raks.create', compact('title', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_inventaris' => 'required'
        ]);

        $rak = [
            'no_inventaris' => $request->no_inventaris,
            'nama_rak' => $request->nama_rak,
            'tanggal' => $request->tanggal,
            'kapasitas' => $request->kapasitas,
        ];
        if ($result = RAK::create($rak)) {
            for ($i = 1; $i <= $request->jml; $i++) {
                $details = [
                    'no_inventaris' => $request->no_inventaris,
                    'id_barang' => $request['id_barang' . $i],
                    'stok' => $request['stok' . $i],
                    'sub_total' => $request['sub_total' . $i],
                ];
                RAKDetail::create($details);
            }
        }
        return redirect()->route('raks.index')->with('success', 'Position has been created successfully.');
    }

    public function show(RAK $rak)
    {
        return view('raks.show', compact('Departement'));
    }

    public function edit(RAK $rak)
    {
        $title = "Edit Data RAK";
        $managers = User::where('position', '1')->orderBy('id', 'asc')->get();
        $detail = RAKDetail::where('no_inventaris', $rak->no_inventaris)->orderBy('id', 'asc')->get();
        return view('raks.edit', compact('rak', 'title', 'managers', 'detail'));
    }

    public function update(Request $request, RAK $rak)
    {
        $raks = [
            'no_inventaris' => $request->no_inventaris,
            'nama_rak' => $request->nama_rak,
            'tanggal' => $request->tanggal,
            'kapasitas' => $request->kapasitas,
        ];
        if ($rak->fill($raks)->save()) {
            RAKDetail::where('no_inventaris', $rak->no_inventaris)->delete();
            for ($i = 1; $i <= $request->jml; $i++) {
                $details = [
                    'no_inventaris' => $request->no_inventaris,
                    'id_barang' => $request['id_barang' . $i],
                    'stok' => $request['stok' . $i],
                    'sub_total' => $request['sub_total' . $i],
                ];
                RAKDetail::create($details);
            }
        }

        return redirect()->route('raks.index')->with('success', 'Departement Has Been updated successfully');
    }


    public function destroy(RAK $rak)
    {
        $rak->delete();
        return redirect()->route('raks.index')->with('success', 'Departement has been deleted successfully');
    }





    public function chartLine()
    {
        $api = url(route('raks.chartLineAjax'));

        $chart = new RAKLineChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);
        $title = "Chart Ajax";
        return view('chart', compact('chart', 'title'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLineAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');
        $raks = RAK::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('tanggal', $year)
            ->groupBy(\DB::raw("Month(tanggal)"))
            ->pluck('count');

        $chart = new RAKLineChart;

        $chart->dataset('New RAK Register Chart', 'bar', $raks)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return $chart->api();
    }
}
