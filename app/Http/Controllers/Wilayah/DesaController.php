<?php

namespace App\Http\Controllers\Wilayah;

use App\Desa;
use App\Http\Controllers\Controller;
use App\Kabupaten;
use App\Kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datas = Desa::all();
            return DataTables::of($datas)
                ->addColumn('action', function ($data) {
                    return '
                    <div class="row justify-content-center">
                    <a class="btn btn-primary text-white  mr-1 ml-1"  onclick="detailItem(' . $data->id . ')">Detail</span></a>
                                <a class="btn btn-success text-white  mr-1 ml-1" href="'. route('wilayah.kecamatan.edit', $data->id) .'" >Edit</span></a>
                                
                                <a id="delete" class="btn btn-danger text-white  mr-1 ml-1" onclick="deleteItem(' . $data->id . ')" >Delete</span></a>
                                </div>';
                })
                ->addIndexColumn()
                ->addColumn('kecamatan', function ($data) {
                    return $data->kecamatan->nama;
                })
                ->addColumn('kabupaten', function ($data) {
                    return $data->kecamatan->kabupaten->nama;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
     return view('admin.wilayah.desa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
       
        return view('admin.wilayah.desa.create',compact('kecamatan'));
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
        Desa::insert([        
            'nama'     => $request->nama,
            'kecamatan_id'     => $request->kecamatan_id,
            'deskripsi'=> $request->deskripsi,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude  
           
            
               
      ]);
      return redirect('wilayah/desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deskripsi = Desa::find($id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
