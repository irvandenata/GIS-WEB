<?php

namespace App\Http\Controllers\Potensi;

use App\Asset;
use App\Bangunan;
use App\Desa;
use App\Http\Controllers\Controller;
use App\Kabupaten;
use App\Kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $assets = Asset::where("potensi_id",'=',3)->get();
            return DataTables::of($assets)
                ->addColumn('action', function ($asset) {
                    return '
                    <div class="row justify-content-center">
                                <a class="btn btn-primary text-white  mr-1 ml-1"  onclick="detailItem(' . $asset->id . ')">Detail</span></a>
                                <a class="btn btn-success text-white  mr-1 ml-1" href="'. route('potensi.listrik.edit', $asset->id) .'" >Edit</span></a>
                                
                                <a id="delete" class="btn btn-danger text-white  mr-1 ml-1" onclick="deleteItem(' . $asset->id . ')" >Delete</span></a>
                                </div>';
                })
               
                ->addColumn('bangunan', function ($asset) {
                    return $asset->bangunan->nama;
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
                ->removeColumn('bangunan_id')
                ->removeColumn('kabupaten_id')
                ->removeColumn('kecamatan_id')
                ->removeColumn('desa_id')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.potensi.listrik.index');
    }

  




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bangunan = Bangunan::all();
        $kecamatan = Kecamatan::all();
        $kabupaten = Kabupaten::all();
        $desa = Desa::all();
        return view('admin.potensi.listrik.create',compact('bangunan','kabupaten','kecamatan','desa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
        if($request->deskripsi == null){
            $request->deskripsi = "" ;
        }
        if($request->latitude == null){
            $request->latidude = "" ;
        }
        if($request->longitude == null){
            $request->longitude = "" ;
        }
        
        Asset::insert([        
            'nama'     => $request->nama,
            'potensi_id'     => 3,           
            'bangunan_id'     => $request->bangunan_id,        
            'kabupaten_id'    => $request->kabupaten_id != null?$request->kabupaten_id:null  ,        
            'kecamatan_id'       => $request->kecamatan_id != null?$request->kecamatan_id:2,        
            'desa_id'      => $request->desa_id != null?$request->desa_id:2,        
            'deskripsi'=> $request->deskripsi,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude    
      ]);
      return redirect('potensi/listrik');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deskripsi = Asset::find($id);
        return $deskripsi;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Asset::find($id);
        $bangunan = Bangunan::all();
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::find($data->kecamatan_id);
        $desa = Desa::find($data->desa_id);
        return view('admin.potensi.listrik.edit',compact('data','bangunan','kabupaten','kecamatan','desa'));
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
        
        if($request->deskripsi == null){
            $request->deskripsi = "" ;
        }
        if($request->latitude == null){
            $request->latidude = "" ;
        }
        if($request->longitude == null){
            $request->longitude = "" ;
        }
         $data = Asset::find($id);
         $data->nama     = $request->nama;
         $data->potensi_id     = 3;           
         $data->bangunan_id     = $request->bangunan_id;        
         $data->kabupaten_id    = $request->kabupaten_id != null?$request->kabupaten_id:null;        
         $data->kecamatan_id       = $request->kecamatan_id != null?$request->kecamatan_id:2;        
         $data->desa_id      = $request->desa_id != null?$request->desa_id:2;        
         $data->deskripsi = $request->deskripsi;
         $data->latitude = $request->latitude;
         $data->longitude =  $request->longitude;   
         $data->save();
      return redirect('potensi/listrik');
    
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
        return session(['status'=> 'Data Aset Telah Berhasil Dihapus']);
    }
}
