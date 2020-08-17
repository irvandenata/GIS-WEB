@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />


    <link href="../dist/searchbox.min.css" rel="stylesheet" />

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



    <script src="../dist/leaflet.customsearchbox.min.js"></script>


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
    
    // var caffeIcon = new Icons({iconUrl: '{{asset('assets/img/caffe.png')}}'}),
    //     officeIcon = new Icons({iconUrl: '{{asset('assets/img/office.png')}}'});
    
    
       
        
        var listrik = L.layerGroup();
        var kafe = L.layerGroup();
    
    
    
        
    
    
    
    
    
    
        axios.get('{{ route('api.potensi.show',3)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           // console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {   
                    return L.marker(latlng);
                },  
            }
            ).addTo(listrik);
        })
        .catch(function (error) {
            console.log(error);
        });
    
        // axios.get('{{ route('')
        // .then(function (response) {
        //     // console.log(response.data.features[0].properties.category_id);
        //     //console.log(response.data);
        //     L.geoJSON(response.data, {
        //         pointToLayer: function(geoJsonPoint, latlng) {               
        //             return L.marker(latlng, {icon: caffeIcon});
        //         },
        //     })
        //     .bindPopup(function (layer) {
              
                
        //         return layer.feature.properties.map_popup_content;
        //     }).addTo(kafe);
        // })
        // .catch(function (error) {
        //     console.log(error);
        // });
       
    
       
    
    
       var map = L.map('mapid',{
           layers: [listrik,kafe]
       }).setView([ 0.0528716965978, 110.73120117187], 7);
        
    
        var title = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
      
        
    
      
    
        $("#kantor").click(function(event) {
        
        if(map.hasLayer(listrik)) {
            $(this).prop( "checked", false );
            map.removeLayer(listrik);
        } else {
            map.addLayer(listrik);        
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



    $(document).ready(function () {
        
        var map = L.map('map').setView([51.505, -0.09], 5);
        map.zoomControl.setPosition('topright');
        map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {attribution:'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'}
            ));
	    
        var searchboxControl=createSearchboxControl();
        var control = new searchboxControl({
            sidebarTitleText: 'Header',
            sidebarMenuItems: {
                Items: [
                    { type: "link", name: "Link 1 (github.com)", href: "http://github.com", icon: "icon-local-carwash" },
                    { type: "link", name: "Link 2 (google.com)", href: "http://google.com", icon: "icon-cloudy" },
                    { type: "button", name: "Button 1", onclick: "alert('button 1 clicked !')", icon: "icon-potrait" },
                    { type: "button", name: "Button 2", onclick: "button2_click();", icon: "icon-local-dining" },
                    { type: "link", name: "Link 3 (stackoverflow.com)", href: 'http://stackoverflow.com', icon: "icon-bike" },
                ]
            }
        });
        control._searchfunctionCallBack = function (searchkeywords)
        {
            if (!searchkeywords) {
                searchkeywords = "The search call back is clicked !!"
            }
            alert(searchkeywords);
        }
        map.addControl(control);
    });
    
    function button2_click()
    {
        alert('button 2 clicked !!!');
    }
    
    
    
    
            
    </script>


@endpush
