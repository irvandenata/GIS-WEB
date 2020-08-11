@extends('layouts.app2')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/leaflet/leaflet-search.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/leaflet/leaflet.css')}}"/>

<style>
    #mapid { min-height: 500px; }

   
 
    .leaflet-container .leaflet-control-search {
	position:relative;
	float:left;
	background:#fff;
	color:#1978cf;
	border: 2px solid rgba(0,0,0,0.2);
	background-clip: padding-box;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	background-color: rgba(255, 255, 255, 0.8);
	z-index:1000;	
	margin-left: 10px;
	margin-top: 10px;
}
.leaflet-control-search.search-exp {/*expanded*/
	background: #fff;
	border: 2px solid rgba(0,0,0,0.2);
	background-clip: padding-box;	
}
.leaflet-control-search .search-input {
	display:block;
	float:left;
	background: #fff;
	border:1px solid #666;
	border-radius:2px;
	height:22px;
	padding:0 20px 0 2px;
	margin:4px 0 4px 4px;
}
.leaflet-control-search.search-load .search-input {
	background: url('{{asset('assets/leaflet/images/loader.gif')}}') no-repeat center right #fff;
}
.leaflet-control-search.search-load .search-cancel {
	visibility:hidden;
}
.leaflet-control-search .search-cancel {
	display:block;
	width:22px;
	height:22px;
	position:absolute;
	right:28px;
	margin:6px 0;
	background: url('{{asset('assets/leaflet/images/search-icon.png')}}') no-repeat 0 -46px;
	text-decoration:none;
	filter: alpha(opacity=80);
	opacity: 0.8;		
}
.leaflet-control-search .search-cancel:hover {
	filter: alpha(opacity=100);
	opacity: 1;
}
.leaflet-control-search .search-cancel span {
	display:none;/* comment for cancel button imageless */
	font-size:18px;
	line-height:20px;
	color:#ccc;
	font-weight:bold;
}
.leaflet-control-search .search-cancel:hover span {
	color:#aaa;
}
.leaflet-control-search .search-button {
	display:block;
	float:left;
	width:30px;
	height:30px;	
	background: url('{{asset('assets/leaflet/images/search-icon.png')}}') no-repeat 4px 4px #fff;
	border-radius:4px;
}
.leaflet-control-search .search-button:hover {
	background: url('{{asset('assets/leaflet/images/search-icon.png')}}') no-repeat 4px -20px #fafafa;
}
.leaflet-control-search .search-tooltip {
	position:absolute;
	top:100%;
	left:0;
	float:left;
	list-style: none;
	padding-left: 0;
	min-width:120px;
	max-height:122px;
	box-shadow: 1px 1px 6px rgba(0,0,0,0.4);
	background-color: rgba(0, 0, 0, 0.25);
	z-index:1010;
	overflow-y:auto;
	overflow-x:hidden;
	cursor: pointer;
}
.leaflet-control-search .search-tip {
	margin:2px;
	padding:2px 4px;
	display:block;
	color:black;
	background: #eee;
	border-radius:.25em;
	text-decoration:none;	
	white-space:nowrap;
	vertical-align:center;
}
.leaflet-control-search .search-button:hover {
	background-color: #f4f4f4;
}
.leaflet-control-search .search-tip-select,
.leaflet-control-search .search-tip:hover {
	background-color: #fff;
}
.leaflet-control-search .search-alert {
	cursor:pointer;
	clear:both;
	font-size:.75em;
	margin-bottom:5px;
	padding:0 .25em;
	color:#e00;
	font-weight:bold;
	border-radius:.25em;
}



 
 .leaflet-control-search .search-cancel {
     display: block;
     width: 22px;
     height: 22px;
     position: absolute;
     right: 28px;
     margin: 6px 0;
     background: url('{{asset('assets/leaflet/images/search-icon.png')}}') no-repeat 0 -46px;
     text-decoration: none;
     filter: alpha(opacity=80);
     opacity: 0.8;
 }
</style>
@endpush

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                      <div class="col-10"><div id="findbox"></div></div>
                   
                     </div>
                    
                  </div>
                <div class="card-body">
                    <div id="mapid"></div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="{{asset('assets/leaflet/leaflet.js')}}"></script>
<script src="{{asset('assets/leaflet/leaflet-search.js')}}"></script>
<script>
var Icons = L.Icon.extend({
    options: {
        iconSize: [25, 25],
        popupAnchor:  [0, -20],
        iconAnchor : [12,20]
    }
});

var listrikIcon = new Icons({iconUrl: '{{asset('assets/images/listrik.png')}}'}),
    officeIcon = new Icons({iconUrl: '{{asset('assets/img/office.png')}}'});


   
    
    var bangunan = L.layerGroup();
    var kafe = L.layerGroup();



  



    axios.get('{{ route('api.place.index') }}')
    .then(function (response) {
        // console.log(response.data.features[0].properties.category_id);
       console.log(response.data);
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                console.log(geoJsonPoint.properties.nama);
                return L.marker(latlng,{icon:listrikIcon,title:geoJsonPoint.properties.nama });
            },  
        }
        ).bindPopup(function (layer) {
          
            
          return layer.feature.properties.map_popup_content;
      })
        .addTo(bangunan);
    })
    .catch(function (error) {
        console.log(error);
    });

    // axios.get('{{ route('api.place.index',['id' =>2]) }}')
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
       layers: [bangunan,kafe]
   }).setView([ 0.0528716965978, 110.73120117187], 7);
    



    var title = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

  
    

  

    $("#kantor").click(function(event) {
    
    if(map.hasLayer(bangunan)) {
        $(this).prop( "checked", false );
        map.removeLayer(bangunan);
    } else {
        map.addLayer(bangunan);        
        $(this).prop( "checked", true );
   }
});

// $("#kafe").click(function(event) {
    
//     if(map.hasLayer(kafe)) {
//         $(this).prop( "checked", false );
//         map.removeLayer(kafe);
//     } else {
//         map.addLayer(kafe);        
//         $(this).prop( "checked", true );
//    }
// });



map.on('popupopen', function(e) {
    
    map.setView([e.popup._latlng.lat+0.004,(e.popup._latlng.lng)],16);
} );


var baseMaps = {
    
};

var overlayMaps = {
    "Listrik": bangunan
};

L.control.layers(baseMaps, overlayMaps).addTo(map);


var controlSearch = new L.Control.Search({
		position:'topright',
		layer: bangunan,
		initial: false,
		zoom: 12,
        marker: false,
        initial: false,
       
        
	});

	map.addControl( controlSearch );






</script>
@endpush
