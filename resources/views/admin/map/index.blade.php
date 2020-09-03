@extends('layouts.app2')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
@endpush
<script>
    function showDetail() {
        $('#modalForm').modal('show');
    }

    

</script>
@push('css')
    <style>
        .leaflet-bar{
            margin-right: 50px !important;
            margin-bottom: 50px !important;
        }
        .icon-image {
            height: 20px;
            width: 20px;
        }

        .ting {
            min-height: 100vh;
            padding: 0;
    margin: 0;
        }

        .leaflet-tooltip {
        display: none;
}
.custom-padding{
    padding-top: 20px;
    padding-bottom: 80px;
}
.pading-none{
    padding: 0 !important;
    margin: 0 !important;
}

.checkbox-lg .custom-control-label::before, 
.checkbox-lg .custom-control-label::after {
  top: .8rem;
  width: 1.55rem;
  height: 1.55rem;
}

.checkbox-lg .custom-control-label {
  padding-top: 13px;
  padding-left: 6px;
}


/* h1 {
  text-shadow: 2px 2px #000000;
} */

.scroll {
    max-height: 300px;
    overflow-y: scroll;
}

    </style>
@endpush
@section('topbar')
    <nav class="main-header custom-padding">
        <div class="row justify-content-end ">
            <div class="col-8 mr-2 ">
                <div id="myDropdown" class="dropdown-content">
                    <input class="form-control" type="text" placeholder="Cari disini ..." id="myInput">
                    <div class="list-group" id="myList" style="z-index: 10; position: absolute;">
                        {{-- <li class="list-group-item">Desa Berlistrik, Temajok, Paloh,
                            Sambas</li> --}}

                    </div>
                </div>
            </div>
        </div>
        <!-- Right navbar links -->
    </nav>
@endsection
@section('content')

<div class="row  " style="z-index: 10; position: absolute; width:600px; margin-top:50px; margin-left:50px;" >
    {{-- <div class="col-12"><h1 class="text-white" >Sebaran Potensi di Perbatasan</h1><h3>Provinsi Kalimantan Barat</h3></div> --}}
    <div class="col-7 elevation-2 pading-none">
        <div id="myDropdown" class="dropdown-content">
            <i class="fas fa-search fa-lg" style="z-index: 12; position: absolute; right: 30px; top: 23px;" aria-hidden="true"></i>
            <input class="form-control rounded" style="height:60px ;  "type="text" placeholder="Cari Data Potensi disini ..." id="myInput">
            <div class="list-group" id="myList" style="z-index: 10; position: absolute; ">
                {{-- <li class="list-group-item">Desa Berlistrik, Temajok, Paloh,
                    Sambas</li> --}}
            </div>
        </div>
    </div>
</div>
<div class="row" style="z-index: 10; position: absolute; width:600px; bottom:30px; margin-left:50px;" >
    {{-- <div class="col-12"><h1 class="text-white" >Sebaran Potensi di Perbatasan</h1><h3>Provinsi Kalimantan Barat</h3></div> --}}
    <div class="col-7 pading-none">
        <div class="card elevation-2 " style="height: 350px;">
            <div class="card-header">
                <h5 class="card-title mb-2">Legenda</h5>
            </div>
            <div class="card-body scroll">
              
             
             
              <nav class="pading-none">
                <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview mb-2  ">
                        <a href="#" class="nav-link pb-2">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                           Potensi Ekonomi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                            <ul class="nav nav-treeview mb-2">
                                <li class="nav-item" style="margin:0px !important;">
                                    <a href="#" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' : null }} " style="padding:0px !important; margin-left:30px;">
                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" class="custom-control-input " id="checkbox-1" checked="">
                                            <label class="custom-control-label"  for="checkbox-1">Desa Mandiri</label>
                                            <img src="assets/leaflet/icon/maju.png" alt="" style="width: 30px; margin-top:10px; margin-left:100px" srcset="">  
                                    </a>
                                    </li>
                                </ul>
                        </li>
                        <li class="nav-item has-treeview mb-2  ">
                            <a href="#" class="nav-link pb-2">
                            <i class="nav-icon fas fa-map"></i>
                            <p>
                                Potensi Lingkungan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                                <ul class="nav nav-treeview mb-2">
                                    <li class="nav-item" style="margin:0px !important;">
                                        <a href="#" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' : null }} " style="padding:0px !important; margin-left:30px;">
                                            <div class="custom-control custom-checkbox checkbox-lg">
                                                <input type="checkbox" class="custom-control-input " id="checkbox-1" checked="">
                                                <label class="custom-control-label"  for="checkbox-1">Desa Mandiri</label>
                                                <img src="assets/leaflet/icon/maju.png" alt="" style="width: 30px; margin-top:10px; margin-left:100px" srcset="">  
                                        </a>
                                        </li>
                                    </ul>
                            </li>
                            <li class="nav-item has-treeview mb-2  ">
                                <a href="#" class="nav-link pb-2">
                                <i class="nav-icon fas fa-map"></i>
                                <p>
                                    Potensi Listrik
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                    <ul class="nav nav-treeview mb-2">
                                        <li class="nav-item" style="margin:0px !important;">
                                            <a href="#" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' : null }} " style="padding:0px !important; margin-left:30px;">
                                                <div class="custom-control custom-checkbox checkbox-lg">
                                                    <input type="checkbox" class="custom-control-input " id="checkbox-1" checked="">
                                                    <label class="custom-control-label"  for="checkbox-1">Desa Mandiri</label>
                                                    <img src="assets/leaflet/icon/maju.png" alt="" style="width: 30px; margin-top:10px; margin-left:100px" srcset="">  
                                            </a>
                                            </li>
                                        </ul>
                                </li>
                                <li class="nav-item has-treeview mb-2  ">
                                    <a href="#" class="nav-link pb-2">
                                    <i class="nav-icon fas fa-map"></i>
                                    <p>
                                        Potensi Tambang
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                    </a>
                                        <ul class="nav nav-treeview mb-2">
                                            <li class="nav-item" style="margin:0px !important;">
                                                <a href="#" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' : null }} " style="padding:0px !important; margin-left:30px;">
                                                    <div class="custom-control custom-checkbox checkbox-lg">
                                                        <input type="checkbox" class="custom-control-input " id="checkbox-1" checked="">
                                                        <label class="custom-control-label"  for="checkbox-1">Desa Mandiri</label>
                                                        <img src="assets/leaflet/icon/maju.png" alt="" style="width: 30px; margin-top:10px; margin-left:100px" srcset="">  
                                                </a>
                                                </li>
                                            </ul>
                                    </li>
                                    <li class="nav-item has-treeview mb-2  ">
                                        <a href="#" class="nav-link pb-2">
                                        <i class="nav-icon fas fa-map"></i>
                                        <p>
                                           Potensi Sosial
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                            <ul class="nav nav-treeview mb-2">
                                                <li class="nav-item" style="margin:0px !important;">
                                                    <a href="#" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' : null }} " style="padding:0px !important; margin-left:30px;">
                                                        <div class="custom-control custom-checkbox checkbox-lg">
                                                            <input type="checkbox" class="custom-control-input " id="checkbox-1" checked="">
                                                            <label class="custom-control-label"  for="checkbox-1">Desa Mandiri</label>
                                                            <img src="assets/leaflet/icon/maju.png" alt="" style="width: 30px; margin-top:10px; margin-left:100px" srcset="">  
                                                    </a>
                                                    </li>
                                                </ul>
                                        </li>
                                        
                            
                    </ul>
                </nav>
            </div>
          </div>
    </div>
</div>
       
            {{-- <div class="col-3">
                 <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Simbol</h3>
                    </div>
                    <div class="card-body">
                      
                        <div class="row">
                            <div class="col-12">


                                <ul class="list-group" data-widget="todo-list">
                                    <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->
                                        <input type="checkbox" value="" name="todo1" id="ekonomi" checked>
                                        <span class="text">Ekonomi</span>
                                        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"
                                            class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                    </li>
                                    <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->

                                        <input type="checkbox" value="" name="todo1" id="lingkungan" checked>
                                        <span class="text">Lingkungan</span>
                                        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"
                                            class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                    </li>
                                    <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->

                                        <input type="checkbox" value="" name="todo1" id="listrik" checked>
                                        <label for="todoCheck1"></label>
                                        <span class="text">Listrik</span>
                                        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"
                                            class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                    </li>
                                    <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->

                                        <input type="checkbox" value="" name="todo1" id="tambang" checked>
                                        <label for="todoCheck1"></label>

                                        <!-- todo text -->
                                        <span class="text">Tambang</span>
                                        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"
                                            class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                    </li>
                                    <li class="list-group-item p-1 pl-2" style="padding: 0;">
                                        <!-- checkbox -->

                                        <input type="checkbox" value="" name="todo1" id="sosial" checked>
                                        <label for="todoCheck1"></label>

                                        <!-- todo text -->
                                        <span class="text">Sosial</span>
                                        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"
                                            class="img-thumbnail icon-image mb-1 ml-4 float-right">
                                    </li>



                                </ul>



                            </div>
                        </div>
                      


                    </div>
                    <!-- /.card-body -->
                </div> 

            
            </div> --}}
            
                <div id="mapid" class="ting" style="z-index: 0;"></div>
          
       

   
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
                iconSize: [20, 20],
                popupAnchor: [0, -20],
                tooltipAnchor: [ 10, 0 ]
            }
        });
        var ekonomiIcon = new Icons({
                iconUrl: '{{ asset('assets/leaflet/icon/maju.png ') }}'
            }),
            lingkunganIcon = new Icons({
                iconUrl: '{{ asset('assets/img/lingkungan.png ') }}'
            }),
            listrikIcon = new Icons({
                iconUrl: '{{ asset('assets/img/listrik.png ') }}'
            }),
            tambangIcon = new Icons({
                iconUrl: '{{ asset('assets/img/tambang.png ') }}'
            }),
            sosialIcon = new Icons({
                iconUrl: '{{ asset('assets/img/sosial.png ') }}'
            });

        var ekonomi = L.layerGroup();
        var lingkungan = L.layerGroup();
        var listrik = L.layerGroup();
        var tambang = L.layerGroup();
        var sosial = L.layerGroup();
        var searchLis, searchEko, searchLin, searchTam, searchSos;
        var dataGrafik = [];
        // axios.
        // get('{{ route('api.potensi.index') }}').then(function(e) {


        //     dataGrafik = e.data;
        //     console.log(dataGrafik)

        //     var donutData = {
        //         labels: dataGrafik.nama,
        //         datasets: [{
        //             data: dataGrafik.jumlah,
        //             backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        //         }]
        //     }

        //     var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        //     var stackedBarChartData = jQuery.extend(true, {}, donutData)

        //     var stackedBarChartOptions = {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         legend: {
        //             display: false
        //         },
        //         scales: {
        //             xAxes: [{
        //                 stacked: true,
        //             }],
        //             yAxes: [{
        //                 stacked: true
        //             }]
        //         }
        //     }

        //     var stackedBarChart = new Chart(stackedBarChartCanvas, {
        //         type: 'bar',
        //         data: stackedBarChartData,
        //         options: stackedBarChartOptions
        //     })


        // });
        axios.get('{{ route('api.potensi.show',1)}}')
        .then(function(response) {
                // console.log(response.data.features[0].properties.category_id);
                //console.log(response.data);
                searchEko = response.data.features;
                L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        console.log(geoJsonPoint.properties)
                        return L.marker(latlng, {
                            icon: new Icons({
                            iconUrl: '{{ asset('assets/leaflet/icon')}}'+"/"+ geoJsonPoint.properties.icon
                             })
                        }).on('click', onClick).bindTooltip(geoJsonPoint.properties.desa+" : <br> "+geoJsonPoint.properties.bangunan, 
                        {
                            permanent: true, 
                            direction: 'right'
                        }
                        );
                    },

                }).addTo(ekonomi);
            })
            .catch(function(error) {
                console.log(error);
            });

        // axios.get('{{ route('api.potensi.show',2 )}}')
        // .then(function(response) {
        //         // console.log(response.data.features[0].properties.category_id);
        //         // console.log(response.data);
        //         searchLin = response.data.features;
        //         L.geoJSON(response.data, {
        //             pointToLayer: function(geoJsonPoint, latlng) {
        //                 return L.marker(latlng, {
        //                     icon: sosialIcon
        //                 }).on('click', onClick);
        //             },
        //         }).addTo(lingkungan);

        //     })
        //     .catch(function(error) {
        //         console.log(error);
        //     });
        // var searchLis;
        // axios.get('{{ route('api.potensi.show',3)}}')
        // .then(function(response) {
        //         // console.log(response.data.features[0].properties.category_id);
        //         searchLis = response.data.features;



        //         L.geoJSON(response.data, {
        //                 pointToLayer: function(geoJsonPoint, latlng) {
        //                     return L.marker(latlng, {
        //                         icon: listrikIcon
        //                     }).on('click', onClick);
        //                 },
        //             }

        //         ).addTo(listrik);

        //         $("#myList li").toggle();
        //     })
        //     .catch(function(error) {
        //         console.log(error);
        //     });

        // axios.get('{{ route('api.potensi.show',4 )}}')
        // .then(function(response) {
        //         // console.log(response.data.features[0].properties.category_id);
        //         // console.log(response.data);
        //         searchTam = response.data.features;
        //         L.geoJSON(response.data, {
        //             pointToLayer: function(geoJsonPoint, latlng) {
        //                 return L.marker(latlng, {
        //                     icon: lingkunganIcon
        //                 }).on('click', onClick);
        //             },
        //         }).addTo(tambang);
        //     })
        //     .catch(function(error) {
        //         console.log(error);
        //     });

        // axios.get('{{ route('api.potensi.show', 5)}}')
        // .then(function(response) {
        //         // console.log(response.data.features[0].properties.category_id);
        //         // console.log(response.data);
        //         searchSos = response.data.features;
        //         L.geoJSON(response.data, {
        //             pointToLayer: function(geoJsonPoint, latlng) {
        //                 return L.marker(latlng, {
        //                     icon: sosialIcon
        //                 }).on('click', onClick);
        //             },
        //         }).addTo(sosial);
        //     })
        //     .catch(function(error) {
        //         console.log(error);
        //     });
        var map = L.map('mapid', {
            layers: [ekonomi, lingkungan, listrik, tambang, sosial]
        }).setView([0.0528716965978, 110.73120117187], 7);


        var title = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $("#ekonomi").click(function(event) {

            if (map.hasLayer(ekonomi)) {
                $(this).prop("checked", false);
                map.removeLayer(ekonomi);
            } else {
                map.addLayer(ekonomi);
                $(this).prop("checked", true);
            }
        });

        $("#lingkungan").click(function(event) {

            if (map.hasLayer(lingkungan)) {
                $(this).prop("checked", false);
                map.removeLayer(lingkungan);
            } else {
                map.addLayer(lingkungan);
                $(this).prop("checked", true);
            }
        });

        $("#listrik").click(function(event) {

            if (map.hasLayer(listrik)) {
                $(this).prop("checked", false);
                map.removeLayer(listrik);
            } else {
                map.addLayer(listrik);
                $(this).prop("checked", true);
            }
        });

        $("#tambang").click(function(event) {

            if (map.hasLayer(tambang)) {
                $(this).prop("checked", false);
                map.removeLayer(tambang);
            } else {
                map.addLayer(tambang);
                $(this).prop("checked", true);
            }
        });

        $("#sosial").click(function(event) {

            if (map.hasLayer(sosial)) {
                $(this).prop("checked", false);
                map.removeLayer(sosial);
            } else {
                map.addLayer(sosial);
                $(this).prop("checked", true);
            }
        });

        map.on('click', function(e) {
            map.setView(e.popup._latlng, 20);
        });

        function onClick(e) {

            console.log(e)
            map.setView(e.latlng, 13);
            $('.modal-body h3').text(e.target.feature.properties.nama);
            $('.modal-body p').text(e.target.feature.properties.bangunan);
            $('ul li .kab').text(e.target.feature.properties.kabupaten);
            $('ul li .kec').text(e.target.feature.properties.kecamatan);
            $('ul li .des').text(e.target.feature.properties.desa);
            $('textarea[name=deskripsi]').val(e.target.feature.properties.deskripsi);
            $('#modalFormTitle').text("Potensi " + e.target.feature.properties.potensi);

            $('#modalForm').modal('show');
        }


        function goTo(lat, lng) {
            map.setView([lat, lng], 13);
        }



        function searching(value) {

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
            if (potensi == 1) {
                $("#myInput").on("keypress", function() {
                    console.log()
                    removeAllChildNodes(list);
                    searchEko.forEach(
                        function(e) {
                            // console.log(e.properties.search)
                            $("#myList").append(e.properties.search)
                        }
                    );
                });
                var value = $(this).val().toLowerCase();
                (value != '') ? searching(value): searching('xxxxxx');
            } else if (potensi == 2) {
                $("#myInput").on("keyup", function() {
                    removeAllChildNodes(list);
                    searchLin.forEach(
                        function(e) {
                            // console.log(e.properties.search)
                            $("#myList").append(e.properties.search)
                        }
                    );
                    var value = $(this).val().toLowerCase();
                    (value != '') ? searching(value): searching('xxxxxx');
                });
            } else if (potensi == 3) {
                $(document).ready(function() {
                    $("#myInput").on("keyup", function() {

                        removeAllChildNodes(list);
                        searchLis.forEach(
                            function(e) {
                                // console.log(e.properties.search)
                                $("#myList").append(e.properties.search)
                            }
                        );
                        var value = $(this).val().toLowerCase();
                        (value != '') ? searching(value): searching('xxxxxx');

                    });
                });
            } else if (potensi == 4) {
                $("#myInput").on("keyup", function() {

                    removeAllChildNodes(list);
                    searchTam.forEach(
                        function(e) {
                            // console.log(e.properties.search)
                            $("#myList").append(e.properties.search)
                        }
                    );
                    var value = $(this).val().toLowerCase();
                    (value != '') ? searching(value): searching('xxxxxx');
                });
            } else if (potensi == 5) {
                $("#myInput").on("keyup", function() {
                    removeAllChildNodes(list);
                    searchSos.forEach(
                        function(e) {
                            // console.log(e.properties.search)
                            $("#myList").append(e.properties.search)
                        }
                    );
                    var value = $(this).val().toLowerCase();
                    (value != '') ? searching(value): searching('xxxxxx');
                });
            }
        });

var lastZoom;
var tooltipThreshold = 12;
map.on('zoomend', function() {
    var zoom = map.getZoom();
    if (zoom < tooltipThreshold && (!lastZoom || lastZoom >= tooltipThreshold)) {
        $(".leaflet-tooltip").css("display","none")
    } else if (zoom >= tooltipThreshold && (!lastZoom || lastZoom < tooltipThreshold)) { 
        $(".leaflet-tooltip").css("display","block")
    }
    lastZoom = zoom;
})

map.zoomControl.setPosition('bottomright');
    </script>
    @include('admin.map.getWilayah')


@endpush
