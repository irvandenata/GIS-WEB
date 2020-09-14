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


</script>
