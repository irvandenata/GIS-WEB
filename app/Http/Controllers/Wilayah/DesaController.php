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
                   
                                <a class="btn btn-success text-white  mr-1 ml-1" onclick="editItem(' . $data->id . ')" >Edit</span></a>
                                
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
        $data=Kecamatan::select('id','nama')->get();
     return view('admin.wilayah.desa.index',compact('data'));
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
    public function store(Request $request,Desa $desa)
    {
        $desa=Desa::create($request->all());
        return $desa;
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
    public function edit(Desa $desa)
    {
        return $desa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $desa->update($request->all());
        return $desa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();
        return response()->json(['message', 'deleted success']);
    }
}
