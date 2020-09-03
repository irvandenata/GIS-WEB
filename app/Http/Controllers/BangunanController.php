<?php

namespace App\Http\Controllers;

use App\Bangunan;
use App\Potensi;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

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
                ->removeColumn(' id')
                ->addIndexColumn()
                ->rawColumns(['action'])
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

        $bangunan = Bangunan::create($request->except('icon'));
        if ($request->hasFile('icon')) {
            // Mengambil file yang diupload
            $uploaded_icon = $request->file('icon');
            // mengambil extension file
            $extension = $uploaded_icon->getClientOriginalExtension();
            // membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;
            // menyimpan icon ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'assets/leaflet/icon';
            $uploaded_icon->move($destinationPath, $filename);
            // mengisi field icon di bangunan dengan filename yang baru dibuat
            $bangunan->icon = $filename;
            $bangunan->save();
        }
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
        $bangunan->update($request->all());
        if ($request->hasFile('icon')) {
            // menambil icon yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_icon = $request->file('icon');
            $extension = $uploaded_icon->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'assets/leaflet/icon';
            // memindahkan file ke folder public/img
            $uploaded_icon->move($destinationPath, $filename);
            // hapus icon lama, jika ada
            if ($bangunan->icon) {
                $old_icon = $bangunan->icon;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
                    . DIRECTORY_SEPARATOR . $bangunan->icon;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
        }
        $bangunan->save();

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

        if ($bangunan->icon) {
            $old_icon = $bangunan->icon;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/leaflet/icon' . DIRECTORY_SEPARATOR . $bangunan->icon;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
        $bangunan->delete();
        return response()->json(['message', 'deleted success']);
    }
}
