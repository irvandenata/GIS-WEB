@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />

@endpush

<script>

    function showDetail(){
        $('#modalForm').modal('show');
    }
    
</script>

@push('css')

    <style>
        .ting {

            min-height: 75.5vh;
        }

        .scroll {
   height: 30.5vh;
   width: 100%; 
    overflow-y: auto;
}

    </style>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->


    <!-- Main content -->

    <div class="container-fluid" style="min-height: 511px;padding-bottom: 0px;">

        <div class="row ">
            <div class="col-3">
                <div class="card ">
                    
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <form class="form">
                            <div class="row ">
                                <div class="col-12">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Pilih Jenis Potensi</label>
                                        <select class="form-control">
                                            <option disabled selected value>---- Pilih Salah Satu ----</option>
                                            <option value="1">Ekonomi</option>
                                            <option value="2">Lingkungan</option>
                                            <option value="3">Listrik</option>
                                            <option value="4">Tambang</option>
                                            <option value="5">Sosial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <!-- select -->
                                    <div class="form-group">
                                        <input class="form-control " type="search" placeholder="Cari disini ..." aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <button class="btn btn-primary">Cari</button>
                                    </div>
                                </div>

                               
                            </div>
                          </form>
                          
                    </div>
                </div>
                
                <div class="card  ">
                    <div class="card-header ">
                       Hasil Pencarian
                </div>
                


       
                    <!-- /.card-header -->
                    <div class="card-body scroll ">
                        <div class="overflow">

                          <div class="row mb-2" onclick="showDetail()">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                sWADAWDWADWAD
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" style="background-color: yellow">
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>
                          <div class="row mb-2">
                            <div class="col-3" style="background-color: black">
                                aes
                            </div>
                            <div class="col-9" >
                                aessefsefsefawdawdawdwadwad
                            </div>
                            
                          </div>

                        </div>
                    </div>
                </div>
                
              
            </div>
            <div class="col-9">
                <div id="mapid" class="ting"></div>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->

    <!-- /.content -->
    @include('admin.map._form')
@endsection


@push('scripts')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@endpush

@push('js')
    {{-- @include('crud.js') --}}
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
