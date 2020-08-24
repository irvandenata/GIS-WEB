@extends('crud.modal')
@section('input-form')
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Kabupaten</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kabupaten" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputConfirmtext1">Deskripsi</label>
                        <textarea class="form-control" rows="5" id="textarea" placeholder="Deskripsi..." name="deskripsi"
                            value=""></textarea>
                    </div>
                </div>
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
        </div>


        <div class="col-6">
            <div id="mapid"></div>
        </div>
    </div>
@endsection
