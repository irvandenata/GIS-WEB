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
                               
                                <a class="btn btn-success btn-sm text-white  mr-1 ml-1" onclick="editItem(' . $data->id . ')">Edit</span></a>
                                
                                <a id="delete" class="btn btn-danger btn-sm text-white  mr-1 ml-1" onclick="deleteItem(' . $data->id . ')" >Delete</span></a>
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
        
        // return view('admin.wilayah.kabupaten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Kabupaten $kabupaten)
    {    
        $kabupaten=Kabupaten::create($request->all());
        return $kabupaten;
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
    public function edit(Kabupaten $kabupaten)
    {
        
        return $kabupaten;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {

        $kabupaten->update($request->all());
        return $kabupaten;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return response()->json(['message', 'deleted success']);
    }
}
