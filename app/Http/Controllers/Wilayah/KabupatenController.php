<?php

namespace App\Http\Controllers\Wilayah;

use App\Http\Controllers\Controller;
use App\Kabupaten;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $datas = Kabupaten::all();
            return DataTables::of($datas)
                ->addColumn('action', function ($data) {
                    return '
                    <div class="row justify-content-center">
                                <a class="btn btn-primary text-white  mr-1 ml-1"  onclick="detailItem(' . $data->id . ')">Detail</span></a>
                                <a class="btn btn-success text-white  mr-1 ml-1" href="'. route('wilayah.kabupaten.edit', $data->id) .'" >Edit</span></a>
                                
                                <a id="delete" class="btn btn-danger text-white  mr-1 ml-1" onclick="deleteItem(' . $data->id . ')" >Delete</span></a>
                                </div>';
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
     return view('admin.wilayah.kabupaten.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.wilayah.kabupaten.create');
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
        
        Kabupaten::insert([        
            'nama'     => $request->nama,
            
            'deskripsi'=> $request->deskripsi,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude    
      ]);
      return redirect('wilayah/kabupaten');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deskripsi = Kabupaten::find($id);
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
        $data = Kabupaten::find($id);
        return view('admin.wilayah.kabupaten.edit',compact('data'));
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
            
            $data = Kabupaten::find($id);
         $data->nama     = $request->nama;      
         $data->deskripsi = $request->deskripsi;
         $data->latitude = $request->latitude;
         $data->longitude =  $request->longitude;    
         $data->save();
  
      return redirect('wilayah/kabupaten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kabupaten::find($id)->delete();
        return session(['status'=> 'Data Aset Telah Berhasil Dihapus']);
    }
}
