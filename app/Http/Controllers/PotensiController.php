<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Bangunan;
use App\Desa;
use App\Http\Controllers\Controller;
use App\Kabupaten;
use App\Kecamatan;
use App\Potensi;
use App\Subpotensi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bangunan = Subpotensi::where('potensi_id', '=', 1)->select('id', 'nama')->get();

        $kab = Kabupaten::select('id', 'nama')->get();
        $kec = Kecamatan::select('id', 'nama')->get();
        $desa = Desa::select('id', 'nama')->get();

        return view('admin.potensi.index', compact('bangunan', 'kab', 'kec', 'desa'));
    }


    public function api(Request $request, $id)
    {
        if ($request->ajax()) {
            $assets = Asset::where("potensi_id", '=', $id)->latest()->get();
            return DataTables::of($assets)
                ->addColumn('action', function ($asset) {
                    return '
                    <div class="row justify-content-center">

                                <a class="btn btn-success text-white  mr-1 ml-1" onclick="editItem(' . $asset->id . ')"  >Edit</span></a>

                                <a id="delete" class="btn btn-danger text-white  mr-1 ml-1" onclick="deleteItem(' . $asset->id . ')" >Delete</span></a>
                                </div>';
                })

                ->addColumn('bangunan', function ($asset) {
                    return $asset->subpotensi->nama;
                })
                ->addColumn('kabupaten', function ($asset) {
                    return $asset->kabupaten->nama;
                })
                ->addColumn('kecamatan', function ($asset) {
                    return $asset->kecamatan->nama;
                })
                ->addColumn('desa', function ($asset) {
                    return $asset->desa->nama;
                })

                ->removeColumn('potensi_id')
                ->removeColumn('subpotensi_id')
                ->removeColumn('kabupaten_id')
                ->removeColumn('kecamatan_id')
                ->removeColumn('desa_id')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
    }




    public function kecamatan($id)
    {
        $kecamatan = Kecamatan::where("kabupaten_id", "=", $id)
            ->pluck("nama", "id");
        return json_encode($kecamatan);
    }
    public function desa($id)
    {
        $desa = Desa::where("kecamatan_id", "=", $id)
            ->pluck("nama", "id");
        return json_encode($desa);
    }

    public function sel($id)
    {
        $sel = Potensi::find($id)->bangunans
            ->pluck("nama", "id");
        return json_encode($sel);
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Asset $asset)
    {

        $asset->create($request->all());
        return $asset;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = Asset::find($id);
        return  $asset;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asset = Asset::find($id);
        $asset->update($request->all());
        return $asset;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asset::find($id)->delete();
        return response()->json(['message', 'deleted success']);
    }
}
