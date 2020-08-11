<?php

namespace App\Http\Controllers;

use App\Bangunan;
use App\Potensi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $assets = Bangunan::all();
            return DataTables::of($assets)
                ->addColumn('action', function ($asset) {
                    return '
                    <div class="row justify-content-center">
                                
                                <a class="btn btn-success text-white  mr-1 ml-1" href="'. route('bangunan.edit', $asset->id) .'" >Edit</span></a>
                                
                                <a id="delete" class="btn btn-danger text-white  mr-1 ml-1" onclick="deleteItem(' . $asset->id . ')" >Delete</span></a>
                                </div>';
                })
               
                ->addColumn('potensi', function ($asset) {
                    return $asset->potensi->nama;
                })
                
                
                ->removeColumn(' id')
               
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.bangunan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Potensi::all();
        return view('admin.bangunan.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Bangunan::insert([        
            'nama'     => $request->nama,
            'potensi_id'     => $request->potensi_id,           
              
      ]);
      return redirect('bangunan');
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
        $data = Bangunan::find($id);
        
        $potensi = Potensi::all();
        
        return view('admin.bangunan.edit',compact('data','potensi'));
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
        $data = Bangunan::find($id);
        $data->nama     = $request->nama;      
        
        $data->potensi_id = $request->potensi_id;
           
        $data->save();
        return redirect('bangunan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bangunan::find($id)->delete();
        return session(['status'=> 'Data Aset Telah Berhasil Dihapus']);
    }
}
