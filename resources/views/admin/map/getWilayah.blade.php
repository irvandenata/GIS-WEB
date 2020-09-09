<script>
    //garisbatas kabupaten

var batasNegara = L.layerGroup();
var batasProvinsi = L.layerGroup();
var batasKabupaten = L.layerGroup();
$.getJSON('assets/json/batasnegara/batasnegara.geojson', function(data){
L.geoJson(data,{
    style : function style(feature) {
    return {
       // fillColor: '#73ff9a',
        weight: 3,
        opacity: 1,
        color: 'red',
        dashArray: '4',
        fillOpacity: 0.2,

    };
}
}).addTo(batasNegara);
});
map.addLayer(batasNegara);


$.getJSON('assets/json/batasprovinsi/batasprovinsi.geojson', function(data){
L.geoJson(data,{
    style : function style(feature) {
    return {
       // fillColor: '#73ff9a',
        weight: 3,
        opacity: 1,
        color: 'yellow',
        dashArray: '1',
        fillOpacity: 0.2,

    };
}
}).addTo(batasProvinsi);
});
map.addLayer(batasProvinsi);

$.getJSON('assets/json/bataskabupaten/bataskabupaten.geojson', function(data){
L.geoJson(data,{
    style : function style(feature) {
    return {
       // fillColor: '#73ff9a',
        weight: 2,
        opacity: 1,
        color: 'black',
        dashArray: '1',
        fillOpacity: 0.2,

    };
}
}).addTo(batasKabupaten);
});
map.addLayer(batasKabupaten);


    axios.get('{{ route('api.potensi.index')}}')
        .then(function(response) {
                // console.log(response.data.features[0].properties.category_id);
                //console.log(response.data);
                searchEko = response.data.features;
                L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {

                        return L.marker(latlng, {
                            icon: new Icons({
                            iconUrl: '{{ asset('storage')}}'+"/"+ geoJsonPoint.properties.icon
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
</script>
