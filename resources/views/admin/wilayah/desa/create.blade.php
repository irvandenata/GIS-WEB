@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/leaflet/leaflet.css')}}"/>
@endpush


@push('css')
<style>
    #mapid { min-height: 400px; }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Masukkan Data Desa</h4>
          
        <form class="forms-sample"method="post" action="{{route('wilayah.desa.store')}}">
            @csrf
           
              <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Kabupaten</label>
                        <input type="text" class="form-control" name="nama"  placeholder="Nama Tempat" required>
                      </div>
                  </div>
                 
              </div>
             <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Kecamatan</label>
                      <select class="form-control form-control" name="kecamatan_id" required>
                        <option value="">---Pilih---</option>
                        @foreach ($kecamatan as $item)
                        
                      <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                </div>

               
               
              </div>
              <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputConfirmtext1">Deskripsi</label>
                        
                        <textarea class="form-control" rows="5" id="textarea" placeholder="Deskripsi..." name="deskripsi" value=" "></textarea>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputConfirmtext1">Latitiude</label>
                        <input id="latitude" type="text" class="form-control" name="latitude"  placeholder="Latitude" value=" ">
                      </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputConfirmnumber1">Longitude</label>
                        <input id="longitude" type="text" class="form-control" name="longitude" placeholder="Longitude" value=" ">
                      </div>
              </div>
            </div>
            
           
              
              
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Map</h4>
          <div id="mapid"></div>
         
        </div>
      </div>
    </div>

@endsection


@push('scripts')
<script src="{{asset('assets/leaflet/leaflet.js')}}"></script>
@endpush

@push('js')
    


<script>









  




    var map = L.map('mapid').setView([ 0., 109], 10);
    



    var title = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);




    

    var mapCenter = [0.0528716965978, 110.73120117187];

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 12);
        let longitude = e.latlng.lng.toString().substring(0, 12);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
        map.setView([latitude,longitude], 16);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);



</script>
@endpush
