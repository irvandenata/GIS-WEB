@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />

 <link rel="stylesheet" href="{{  asset('assets/dist/css/skins/_all-skins.min.css') }}">


@endpush

<script>

    function showDetail(){
        $('#modalForm').modal('show');
    }
    
</script>

@push('css')

    <style>

.content-wrapper{max-height: 163px;

padding-bottom: -100px;
}
    
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
                                <div class="col-12">
                                    <!-- select -->
                                    <div class="form-group " style="z-index:999">
                                    <div id="myDropdown" class="dropdown-content">
                                            <input class="form-control " type="text" placeholder="Cari disini ..."  id="myInput">
                                            <ul class="list-group" id="myList" style="z-index: 100;" >
                                               {{-- <li class="list-group-item">Desa Berlistrik, Temajok, Paloh, Sambas</li> --}}
                                               
                                            </ul>  
                                        </div>
                                        
                                       
                                    </div>

                                    
                                </div>
                                
                                

                               
                            </div>
                          </form>
                          
                    </div>
                </div>
                
                 <div class="card ">
                    
                    <!-- /.card-header -->
                     <div class="card-header ">
                     <label>Jenis Potensi</label>
                     </div>
                    <div class="card-body ">
                       
                 <input id="ekonomi" type="checkbox" class="flat-green"  checked>
                <label>
                
                  Ekonomi 
                </label>
               <br>
                
                 <input id="lingkungan"  type="checkbox" class="flat-red" checked>
                <label>   
                  Lingkungan
                </label>
              <br>
                
                 <input id="listrik" type="checkbox" class="flat-red" checked>
                <label>
                  Listrik
                </label>
              <br>
              
                 <input id="tambang" type="checkbox" class="flat-red" checked>
                <label>
                  Tambang
                </label>
               <br>
                 <input id="sosial" type="checkbox" class="flat-red" checked>
                <label>
                  Sosial
                </label>
            
                          
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
    @include('admin.map._modal')
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
            popupAnchor:  [0, -20],
            
        }
    });
    
    var ekonomiIcon = new Icons({iconUrl: '{{asset('assets/img/ekonomi.png')}}'}),
        lingkunganIcon = new Icons({iconUrl: '{{asset('assets/img/lingkungan.png')}}'}),
        listrikIcon = new Icons({iconUrl: '{{asset('assets/img/listrik.png')}}'}),
        tambangIcon = new Icons({iconUrl: '{{asset('assets/img/tambang.png')}}'}),
        sosialIcon = new Icons({iconUrl: '{{asset('assets/img/sosial.png')}}'});
    
    
       
        var ekonomi = L.layerGroup();
        var lingkungan = L.layerGroup();
        var listrik = L.layerGroup();
        var tambang = L.layerGroup();
        var sosial = L.layerGroup();

        
    
    
    
        
    
    
        axios.get('{{ route('api.potensi.show',1)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           //console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {   
                    return L.marker(latlng,{icon: ekonomiIcon}).on('click', onClick);
                },  
            }
            ).addTo(ekonomi);
        })
        .catch(function (error) {
            console.log(error);
        });

        



        axios.get('{{ route('api.potensi.show',2)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           // console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {   
                    return L.marker(latlng,{icon: sosialIcon}).on('click', onClick);
                },  
            }
            ).addTo(lingkungan);
            
        })
        .catch(function (error) {
            console.log(error);
        });




        axios.get('{{ route('api.potensi.show',3)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           
           response.data.features.forEach(function(e){
               console.log(e.properties.search);
               $("#myList").append(e.properties.search);
           });
          
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {   
                    return L.marker(latlng,{icon: listrikIcon}).on('click', onClick);
                },  
            }
            
            ).addTo(listrik);
        
        $("#myList li").toggle();
        })
        .catch(function (error) {
            console.log(error);
        });



        axios.get('{{ route('api.potensi.show',4)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           // console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {   
                    return L.marker(latlng,{icon: lingkunganIcon}).on('click', onClick);
                },  
            }
            ).addTo(tambang);
        })
        .catch(function (error) {
            console.log(error);
        });




        axios.get('{{ route('api.potensi.show',5)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           // console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {   
                    return L.marker(latlng,{icon: sosialIcon}).on('click', onClick);
                },  
            }
            ).addTo(sosial);
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
           layers: [ekonomi,lingkungan,listrik,tambang,sosial]
       }).setView([ 0.0528716965978, 110.73120117187], 7);
        
    
        var title = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
      
        
    
      
    
        $("#ekonomi").click(function(event) {
        
        if(map.hasLayer(ekonomi)) {
            $(this).prop( "checked", false );
            map.removeLayer(ekonomi);
        } else {
            map.addLayer(ekonomi);        
            $(this).prop( "checked", true );
       }
    });
    
    $("#lingkungan").click(function(event) {
        
        if(map.hasLayer(lingkungan)) {
            $(this).prop( "checked", false );
            map.removeLayer(lingkungan);
        } else {
            map.addLayer(lingkungan);        
            $(this).prop( "checked", true );
       }
    });


    $("#listrik").click(function(event) {
        
        if(map.hasLayer(listrik)) {
            $(this).prop( "checked", false );
            map.removeLayer(listrik);
        } else {
            map.addLayer(listrik);        
            $(this).prop( "checked", true );
       }
    });

    $("#tambang").click(function(event) {
        
        if(map.hasLayer(tambang)) {
            $(this).prop( "checked", false );
            map.removeLayer(tambang);
        } else {
            map.addLayer(tambang);        
            $(this).prop( "checked", true );
       }
    });

    $("#sosial").click(function(event) {
        
        if(map.hasLayer(sosial)) {
            $(this).prop( "checked", false );
            map.removeLayer(sosial);
        } else {
            map.addLayer(sosial);        
            $(this).prop( "checked", true );
       }
    });
    
    
    
    map.on('click', function(e) {
        map.setView(e.popup._latlng,20);
    } );





 function onClick(e){
     
     console.log(e)
     map.setView(e.latlng,13);
       $('.modal-body h3').text(e.target.feature.properties.nama);
       $('.modal-body p').text(e.target.feature.properties.bangunan);
        $('ul li .kab').text(e.target.feature.properties.kabupaten);
        $('ul li .kec').text(e.target.feature.properties.kecamatan);
        $('ul li .des').text(e.target.feature.properties.desa);
        $('textarea[name=deskripsi]').val(e.target.feature.properties.deskripsi);
        $('#modalFormTitle').text("Potensi "+e.target.feature.properties.potensi);

        $('#modalForm').modal('show');  
        
   
 }




  



function goTo(lat,lng){
    map.setView([lat,lng],13);
}





function searching(value){
     $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
}
 $(document).ready(function(){
     
     
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    (value != '' )? searching(value) : searching('xxxxxx');
   
  });
  
});
    
            
    </script>


@endpush
