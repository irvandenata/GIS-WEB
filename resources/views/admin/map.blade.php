@extends('layouts.backend.app')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/leaflet/leaflet.css')}}"/>


@endpush


@push('css')
<style>
    #mapid { min-height: 420px; }
    .row{
        margin-top: -40px;
    }
   
</style>

@endpush
@section('content')


<div class="container-fluid">
   
    <div class="row">
      
     
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Maps</h4>
              
            </div>
            <div class="card-body">
                <div id="mapid"></div>
            </div>
          </div>
        </div>
    </div>
  </div>

@endsection


@push('scripts')
<script src="{{asset('assets/leaflet/leaflet.js')}}"></script>


@endpush

@push('js')
<script>
    var Icons = L.Icon.extend({
        options: {
            iconSize: [25, 25],
            popupAnchor:  [0, -20]
        }
    });
    
    var caffeIcon = new Icons({iconUrl: '{{asset('assets/img/caffe.png')}}'}),
        officeIcon = new Icons({iconUrl: '{{asset('assets/img/office.png')}}'});
    
    
       
        
        var kantor = L.layerGroup();
        var kafe = L.layerGroup();
    
    
    
        
    
    
    
    
    
    
        axios.get('{{ route('api.place.index',['id' =>1]) }}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           // console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {   
                    return L.marker(latlng, {icon: officeIcon});
                },  
            }
            ).bindPopup(function (layer) {
              
                
              return layer.feature.properties.map_popup_content;
          })
            .addTo(kantor);
        })
        .catch(function (error) {
            console.log(error);
        });
    
        axios.get('{{ route('api.place.index',['id' =>2]) }}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
            //console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {               
                    return L.marker(latlng, {icon: caffeIcon});
                },
            })
            .bindPopup(function (layer) {
              
                
                return layer.feature.properties.map_popup_content;
            }).addTo(kafe);
        })
        .catch(function (error) {
            console.log(error);
        });
       
    
       
    
    
       var map = L.map('mapid',{
           layers: [kantor,kafe]
       }).setView([ 0.0528716965978, 110.73120117187], 7);
        
    
        var title = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
      
        
    
      
    
        $("#kantor").click(function(event) {
        
        if(map.hasLayer(kantor)) {
            $(this).prop( "checked", false );
            map.removeLayer(kantor);
        } else {
            map.addLayer(kantor);        
            $(this).prop( "checked", true );
       }
    });
    
    $("#kafe").click(function(event) {
        
        if(map.hasLayer(kafe)) {
            $(this).prop( "checked", false );
            map.removeLayer(kafe);
        } else {
            map.addLayer(kafe);        
            $(this).prop( "checked", true );
       }
    });
    
    
    
    map.on('popupopen', function(e) {
        map.setView(e.popup._latlng,20);
    } );
    
    
    
    
    
    
    
    </script>
@endpush
