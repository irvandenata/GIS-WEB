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
    .leaflet-bar {
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

    .custom-padding {
        padding-top: 20px;
        padding-bottom: 80px;
    }

    .pading-none {
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

    .dot {
        height: 60px;
        width: 60px;
        background-color: white;
        border-radius: 50%;
        display: inline-block;
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
</nav>
@endsection
@section('content')
<div class="row  " style="z-index: 12; position: absolute; width:600px; margin-top:50px; margin-left:50px;">
    {{-- <div class="col-12"><h1 class="text-white" >Sebaran Potensi di Perbatasan</h1><h3>Provinsi Kalimantan Barat</h3></div> --}}
    <div class="col-7 elevation-2 pading-none">
        <div id="myDropdown" class="dropdown-content">
            <i class="fas fa-search fa-lg" style="z-index: 12; position: absolute; right: 30px; top: 23px;"
                aria-hidden="true"></i>
            <input autocomplete="off" class="form-control rounded" style="height:60px ;  " type="text"
                placeholder="Cari Data Potensi disini ..." id="myInput">
            <div class="list-group" id="myList" style="z-index: 11; position: absolute; ">
                {{-- <li class="list-group-item">Desa Berlistrik, Temajok, Paloh,
                    Sambas</li> --}}
            </div>
        </div>
    </div>
</div>
<div class="row  " style="z-index: 10; position: absolute; width:100px; right:0px; margin:40px;">
    {{-- <div class="col-12"><h1 class="text-white" >Sebaran Potensi di Perbatasan</h1><h3>Provinsi Kalimantan Barat</h3></div> --}}
    <div class="col-12  pading-none ">
        <div class="dot elevation-2">
            @guest
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fas fa-sign-in-alt fa-lg"
                    style="z-index: 12; position: absolute; margin-top: 15px; margin-left:2px;" aria-hidden="true"></i>
            </a>
            @endguest
            @auth
            <a href="{{ route('potensi.index') }}" class="nav-link">
                <i class="fas fa-sign-in-alt fa-lg"
                    style="z-index: 12; position: absolute; margin-top: 15px; margin-left:2px;" aria-hidden="true"></i>
            </a>
            @endauth
        </div>
    </div>
</div>
<div class="row" style="z-index: 10; position: absolute; width:350px; bottom:30px; margin-left:50px;">
    {{-- <div class="col-12"><h1 class="text-white" >Sebaran Potensi di Perbatasan</h1><h3>Provinsi Kalimantan Barat</h3></div> --}}
    <div class="col-12 pading-none">
        <div class="card elevation-2 " style="height: 350px;">
            <div class="card-header">
                <h5 class="card-title mb-2">Legenda</h5>
            </div>
            <div class="card-body scroll">
                <nav class="pading-none">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                        data-accordion="false">
                        @foreach ($potensi as $item)
                        <li class="nav-item has-treeview mb-2  ">
                            <a href="#" class="nav-link pb-2">
                                <i class="nav-icon fas fa-map"></i>
                                <p>
                                    {{ $item->nama }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview mb-2">
                                @foreach ($item->bangunans as $items)
                                <li class="nav-item" style="margin:0px !important;">
                                    <a href="#"
                                        class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' : null }} "
                                        style="padding:0px !important; margin-left:30px;">
                                        <div class="row padding-none">
                                            <div class="col-6">
                                                <div class="custom-control custom-checkbox checkbox-lg">
                                                    <input type="checkbox" class="custom-control-input "
                                                        id="{{ $items->nama }}" checked="">

                                                    <label class="custom-control-label"
                                                        for="{{ $items->nama }}">{{ $items->nama }}</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <img src="storage/{{ $items->icon }}" alt=""
                                                    style="width: 40px; margin-top:15px; margin-left:40px;" srcset="">
                                            </div>
                                        </div>



                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
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
        var ekonomi = L.layerGroup();
        var lingkungan = L.layerGroup();
        var listrik = L.layerGroup();
        var tambang = L.layerGroup();
        var sosial = L.layerGroup();
        var search;
        axios.get('{{ route('api.potensi.index' )}}')
        .then(function(response) {
                // console.log(response.data.features[0].properties.category_id);
               // console.log(response.data.features);
                search = response.data.features;
            })
            .catch(function(error) {
                console.log(error);
            });

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


            const list = document.querySelector('#myList');
            removeAllChildNodes(list);
            $(document).ready(function() {
                    $("#myInput").on("keyup", function() {

                        removeAllChildNodes(list);
                        search.forEach(
                            function(e) {
                                //console.log(e.properties.search)
                                $("#myList").append(e.properties.search)
                            }
                        );
                        var value = $(this).val().toLowerCase();
                        (value != '') ? searching(value): searching('xxxxxx');

                    });
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
