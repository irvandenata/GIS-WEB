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
        
        .icon-image{
            height: 20px;
            width: 20px;
        }
        .ting {
            min-height: 75.5vh;
        }
    </style>
@endpush
@section('topbar')
<nav class="main-header p-3">
  
        <div class="row justify-content-end ">
            <div class="col-2">
                <select class="form-control mr-2" id="cariPotensi">
                    <option disabled selected value>---- Pilih Potensi ----</option>
                    <option value="1">Ekonomi</option>
                    <option value="2">Lingkungan</option>
                    <option value="3">Listrik</option>
                    <option value="4">Tambang</option>
                    <option value="5">Sosial</option>
                </select>
            </div>
            <div class="col-2 mr-2">
                <div id="myDropdown" class="dropdown-content">
                    <input class="form-control " type="text" placeholder="Cari disini ..."  id="myInput">
                    <div class="list-group" id="myList" style="z-index: 10; position: absolute;" >
                       {{-- <li class="list-group-item">Desa Berlistrik, Temajok, Paloh, Sambas</li> --}}
                       
                    </div>  
                </div>
            </div>
        </div>
  
  
      <!-- Right navbar links -->
   
    
  </nav>
@endsection
@section('content')
    <div class="container-fluid" style="min-height: 511px;padding-bottom: 0px;">
        <div class="row ">
            <div class="col-3">
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Informasi Simbol</h3>
                    </div>
                    <div class="card-body">
                        {{-- chart start --}}
                        <div class="row">
                            <div class="col-12">

                             
                                <ul class="list-group" data-widget="todo-list">
                                    <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->   
                                          <input type="checkbox" value="" name="todo1" id="ekonomi" checked>
                                        <span class="text">Ekonomi</span>
                                        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                      </li>
                                      <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->
                                       
                                          <input type="checkbox" value="" name="todo1" id="lingkungan" checked>
                                        <span class="text">Lingkungan</span>
                                        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                      </li>
                                      <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->
                                       
                                          <input type="checkbox" value="" name="todo1" id="listrik" checked>
                                          <label for="todoCheck1"></label>
                                        <span class="text">Listrik</span>
                                        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                      </li>
                                      <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->
                                       
                                          <input type="checkbox" value="" name="todo1" id="tambang" checked>
                                          <label for="todoCheck1"></label>
                                        
                                        <!-- todo text -->
                                        <span class="text">Tambang</span>
                                        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                      </li>
                                      <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->
                                       
                                          <input type="checkbox" value="" name="todo1" id="sosial" checked>
                                          <label for="todoCheck1"></label>
                                        
                                        <!-- todo text -->
                                        <span class="text">Sosial</span>
                                        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                      </li>
                                      
                                     
                                   
                                  </ul>
                              
                               
                                
                            </div>
                        </div>
                      {{-- chart end --}}

                      
                    </div>
                    <!-- /.card-body -->
                  </div>

                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Jumlah Potensi</h3>
                    </div>
                    <div class="card-body">
                        {{-- chart start --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="chart">
                                    <canvas id="stackedBarChart" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                                  </div>
                            </div>
                        </div>
                      {{-- chart end --}}

                      
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            <div class="col-9">
                <div id="mapid" class="ting" style="z-index: 0;"></div>
            </div>
        </div>

    </div>
    @include('admin.map._modal')
@endsection
@push('scripts')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
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
        var searchLis, searchEko, searchLin, searchTam,searchSos;
        var dataGrafik = [];
        axios.get('{{ route('api.potensi.index')}}')
        .then(function(e){
            
           
            dataGrafik = e.data;
            console.log(dataGrafik)

            var donutData        = {
      labels:  dataGrafik.nama,
      datasets: [
        {
          data: dataGrafik.jumlah,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }
      ]
    }
    
var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, donutData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }
  
    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
           
            
                 }
                );
        axios.get('{{ route('api.potensi.show',1)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
           //console.log(response.data);
           searchEko = response.data.features;
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
           searchLin = response.data.features;
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
        var searchLis;
        axios.get('{{ route('api.potensi.show',3)}}')
        .then(function (response) {
            // console.log(response.data.features[0].properties.category_id);
            searchLis = response.data.features;
            
          
           
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
           searchTam = response.data.features;
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
           searchSos = response.data.features;
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
   
     $("#myList a").filter(function() {
        
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
}

// $(document).ready(function(){
//     $("#myInput").on('keyup',function(){
 
// });
// });

    function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

           $('select[id="cariPotensi"]').on('change', function() {
                
            const list = document.querySelector('#myList');
            removeAllChildNodes(list);
            var potensi = $(this).val();
            if(potensi == 1){
            $("#myInput").on("keypress", function() {
                console.log()
                removeAllChildNodes(list);
                searchEko.forEach(
                function (e){
                            // console.log(e.properties.search)
                            $("#myList").append(e.properties.search)
                        }
                    );
                });
                var value = $(this).val().toLowerCase();
                    (value != '')? searching(value) : searching('xxxxxx');
            }
            else if(potensi == 2){
            $("#myInput").on("keyup", function() {
                removeAllChildNodes(list);
                searchLin.forEach(
                function (e){
                    // console.log(e.properties.search)
                    $("#myList").append(e.properties.search)
                }
            );
                var value = $(this).val().toLowerCase();
                (value != '' )? searching(value) : searching('xxxxxx');
            });
         }
         else if(potensi == 3){
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
               
                removeAllChildNodes(list);
                searchLis.forEach(
                function (e){
                    // console.log(e.properties.search)
                    $("#myList").append(e.properties.search)
                }
            );
                var value = $(this).val().toLowerCase();
                (value != '' )? searching(value) : searching('xxxxxx');
                
            });
         });
         }
         else if(potensi == 4){
            $("#myInput").on("keyup", function() {
                
                removeAllChildNodes(list);
                searchTam.forEach(
                function (e){
                    // console.log(e.properties.search)
                    $("#myList").append(e.properties.search)
                }
            );
            var value = $(this).val().toLowerCase();
            (value != '' )? searching(value) : searching('xxxxxx');
            });
         }
         else if(potensi == 5){
            $("#myInput").on("keyup", function() {
                removeAllChildNodes(list);
                searchSos.forEach(
                function (e){
                    // console.log(e.properties.search)
                    $("#myList").append(e.properties.search)
                }
            );
                var value = $(this).val().toLowerCase();
                (value != '' )? searching(value) : searching('xxxxxx');
         });
         }

           
            
     
  
        
    });
 
    </script>


@endpush
