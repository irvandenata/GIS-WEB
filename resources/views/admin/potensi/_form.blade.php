@extends('crud.modal')
@section('input-form')
<input type="hidden" name="potensi_id" value="1">
<div class="row">

    <div class="col-6">

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                </div>
            </div>
            <div class="col-6">



                <div class="form-group">
                    <label for="type">Jenis</label>
                    <select class="form-control show-tick" name="bangunan_id" id="bangID" required>
                        <option disabled selected value>---- Pilih Salah Satu ----</option>
                        @foreach ($bangunan as $item)
                        <option value="{!! $item->id !!}">{!! $item->nama !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">



                <div class="form-group">
                    <label for="type">Kabupaten</label>
                    <select class="form-control show-tick" name="kabupaten_id" id="typeID" required>
                        <option disabled selected value>---- Pilih Salah Satu ----</option>
                        @foreach ($kab as $item)
                        <option value="{!! $item->id !!}">{!! $item->nama !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">



                <div class="form-group">
                    <label for="type">Kecamatan</label>
                    <select class="form-control show-tick" name="kecamatan_id" id="kecID">
                        <option disabled selected value>---- Pilih Salah Satu ----</option>
                        @foreach ($kec as $item)
                        <option value="{!! $item->id !!}">{!! $item->nama !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="type">Desa</label>
                    <select class="form-control show-tick" name="desa_id" id="desaID">
                        <option disabled selected value>---- Pilih Salah Satu ----</option>
                        @foreach ($desa as $item)
                        <option value="{!! $item->id !!}">{!! $item->nama !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea id="textarea" class="form-control" rows="5" placeholder="Deskripsi..." name="deskripsi"
                        value=" "></textarea>
                </div>
            </div>
        </div>
    </div>


    <div class="col-6">

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputConfirmtext1">Latitiude</label>
                    <input id="latitude" type="text" class="form-control" name="latitude" placeholder="Latitude"
                        value=" ">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputConfirmnumber1">Longitude</label>
                    <input id="longitude" type="text" class="form-control" name="longitude" placeholder="Longitude"
                        value=" ">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="mapid" style="height: 335px"></div>
            </div>
        </div>
    </div>

</div>


{{-- <div class="form-group">
    <div class="form-line">
        <label for="number">Gambar Produk</label>
        <input type="text" name="name" class="form-control">
    </div>
</div> --}}

{{-- <div class="form-group">
    <label for="type">Pilih Salah Satu</label>
   <select class="form-control show-tick" name="type_id" id="typeID" required>
            <option disabled selected value>---- Pilih Salah Satu ----</option>
            @foreach ($type as $item)
                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
            @endforeach
        </select>
</div> --}}

@endsection
