@extends('crud.modal')
@section('input-form')
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Desa</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Desa" required>
                    </div>
                </div>




                <div class="col-12">



                    <div class="form-group">
                        <label for="type">Kecamatan</label>
                        <select class="form-control show-tick" name="kecamatan_id" id="typeID" required>
                            <option disabled selected value>---- Pilih Salah Satu ----</option>
                            @foreach ($data as $item)
                                <option value="{!!  $item->id !!}">{!! $item->nama !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputConfirmtext1">Deskripsi</label>

                        <textarea class="form-control" rows="5" id="textarea" placeholder="Deskripsi..." name="deskripsi"
                            value=""></textarea>
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
                            value="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputConfirmnumber1">Longitude</label>
                        <input id="longitude" type="text" class="form-control" name="longitude" placeholder="Longitude"
                            value="">
                    </div>
                </div>
            </div>
            <div id="mapid"></div>
        </div>
    </div>
@endsection
