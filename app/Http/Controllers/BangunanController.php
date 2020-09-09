<?php

namespace App\Http\Controllers;

use App\Bangunan;
use App\Potensi;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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

                                <a class="btn btn-success text-white  mr-1 ml-1" onclick="editItem(' . $asset->id . ')">Edit</span></a>

                                <a id="delete" class="btn btn-danger text-white  mr-1 ml-1" onclick="deleteItem(' . $asset->id . ')" >Delete</span></a>
                                </div>';
                })
                ->addColumn('potensi', function ($asset) {
                    return $asset->potensi->nama;
                })
                ->addColumn('icon', function ($item) {
                    return '<img src="' . asset('storage') . '/' . $item->icon . '" height="100"  >';
                })
                ->removeColumn(' id')
                ->addIndexColumn()
                ->rawColumns(['action', 'icon'])
                ->make(true);
        }
        $potensi = Potensi::select('id', 'nama')->get();
        return view('admin.bangunan.index', compact('potensi'));
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
    public function store(Request $request, Bangunan $bangunan)
    {

        $req = $request->all();
        if ($request->file('icon')) {
            $name_picture = Str::random(6) . '.png';
            $picture = Image::make($req['icon'])->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('png', 90);
            $path = "subpotensi/" . $name_picture;
            Storage::put("public/" . $path, $picture);

            $req['icon'] =  $path;
        }


        $bangunan = Bangunan::create($req);
        return $bangunan;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bangunan $bangunan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bangunan $bangunan)
    {
        return $bangunan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bangunan $bangunan)
    {

        return $bangunan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bangunan $bangunan)
    {

        Storage::delete('public/' . $bangunan->icon);
        $bangunan->delete();
        return response()->json(['message', 'deleted success']);
    }
}
