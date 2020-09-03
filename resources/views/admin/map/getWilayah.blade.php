<script>

//garisbatas kabupaten

var batasSambas = L.layerGroup();
var batasBengkayang = L.layerGroup();
var batasSanggau = L.layerGroup();
var batasSintang = L.layerGroup();
var batasKapuashulu = L.layerGroup();
        $.getJSON('assets/json/sambas/wilayah.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        fillColor: '#73ff9a',
        weight: 2,
        opacity: 1,
        color: 'yellow',
        dashArray: '2',
        fillOpacity: 0.2,
       
    };
}
            }).addTo(batasSambas);
        });
        map.addLayer(batasSambas);

        $.getJSON('assets/json/bengkayang/wilayah.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        fillColor: '#ff0000',
        weight: 2,
        opacity: 1,
        color: 'red',
        dashArray: '2',
        fillOpacity: 0.2,
       
    };
}
            }).addTo(batasBengkayang);
        });
        map.addLayer(batasBengkayang);


        $.getJSON('assets/json/sanggau/wilayah.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        fillColor: '#00ff2f',
        weight: 2,
        opacity: 1,
        color: 'green',
        dashArray: '2',
        fillOpacity: 0.2,
       
    };
}
            }).addTo(batasSanggau);
        });
        map.addLayer(batasSanggau);



        $.getJSON('assets/json/sintang/wilayah.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        fillColor: '#0a16ff',
        weight: 2,
        opacity: 1,
        color: 'blue',
        dashArray: '2',
        fillOpacity: 0.2,
       
    };
}
            }).addTo(batasSintang);
        });
        map.addLayer(batasSintang);


        

        $.getJSON('assets/json/kapuashulu/wilayah.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        fillColor: '#ff7700',
        weight: 2,
        opacity: 1,
        color: 'brown',
        dashArray: '2',
        fillOpacity: 0.2,
       
    };
}
            }).addTo(batasKapuashulu);
        });
        map.addLayer(batasKapuashulu);
    //Kabupaten Sambas
    
    function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: 'brown',
        dashArray: '2',
        fillOpacity: 0
    };
}
    var paloh = L.layerGroup();
    var sajinganBesar = L.layerGroup();
   $.getJSON('assets/json/sambas/paloh.geojson', function(data){
       console.log(data)
            L.geoJson(data,{
                style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: '#fcab14',
        dashArray: '2',
        fillOpacity: 0
    };
}
            }).addTo(paloh);
        });
    $.getJSON('assets/json/sambas/sajinganBesar.geojson', function(data){
        console.log(data)
        L.geoJson(data,{
            style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: '#fcab14',
        dashArray: '2',
        fillOpacity: 0
    };
},
            
        }).addTo(sajinganBesar)
    });

    map.addLayer(paloh);
    map.addLayer(sajinganBesar);

// bengkayang

    var siding = L.layerGroup();
    var jagoibabang = L.layerGroup();
   $.getJSON('assets/json/bengkayang/siding.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: 'red',
        dashArray: '2',
        fillOpacity: 0
    };
}
            }).addTo(siding);
        });
        $.getJSON('assets/json/bengkayang/jagoibabang.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: 'red',
        dashArray: '2',
        fillOpacity: 0
    };
}
            }).addTo(jagoibabang);
        });
    //     var label = new L.Label()
    // label.setContent("static label")
    // label.setLatLng(jagoibabang.getBounds().getCenter())
    // map.showLabel(label);

        map.addLayer(siding);
        map.addLayer(jagoibabang);

//sanggau

var entikong = L.layerGroup();
    var sekayam = L.layerGroup();
   $.getJSON('assets/json/sanggau/entikong.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: 'green',
        dashArray: '2',
        fillOpacity: 0
    };
}
            }).addTo(entikong);
        });
        $.getJSON('assets/json/sanggau/sekayam.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: 'green',
        dashArray: '2',
        fillOpacity: 0
    };
}
            }).addTo(sekayam);
        });
    //     var label = new L.Label()
    // label.setContent("static label")
    // label.setLatLng(jagoibabang.getBounds().getCenter())
    // map.showLabel(label);

        map.addLayer(entikong);
        map.addLayer(sekayam);

//sintang
var ketungauhulu = L.layerGroup();
    var ketungautengah = L.layerGroup();
   $.getJSON('assets/json/sintang/ketungauhulu.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: 'blue',
        dashArray: '2',
        fillOpacity: 0
    };
}
            }).addTo(ketungauhulu);
        });
        $.getJSON('assets/json/sintang/ketungautengah.geojson', function(data){
            L.geoJson(data,{
                style : function style(feature) {
    return {
        
        weight: 2,
        opacity: 1,
        color: 'blue',
        dashArray: '2',
        fillOpacity: 0
    };
}
            }).addTo(ketungautengah);
        });
    //     var label = new L.Label()
    // label.setContent("static label")
    // label.setLatLng(jagoibabang.getBounds().getCenter())
    // map.showLabel(label);

        map.addLayer(ketungauhulu);
        map.addLayer(ketungautengah);


//kapuas hulu
    var badau = L.layerGroup();
    var puringkencana = L.layerGroup();
    var batanglupar = L.layerGroup();
    var embalohhulu = L.layerGroup();
    var putussibauutara = L.layerGroup();
    var putussibauselatan = L.layerGroup();
   $.getJSON('assets/json/kapuashulu/badau.geojson', function(data){
            L.geoJson(data,{
                style : style
            }).addTo(badau);
        });
      

        $.getJSON('assets/json/kapuashulu/puringkencana.geojson', function(data){
            L.geoJson(data,{
                style : style
            }).addTo(puringkencana);
        });

        $.getJSON('assets/json/kapuashulu/batanglupar.geojson', function(data){
            L.geoJson(data,{
                style : style
            }).addTo(batanglupar);
        });

        $.getJSON('assets/json/kapuashulu/embalohhulu.geojson', function(data){
            L.geoJson(data,{
                style : style
            }).addTo(embalohhulu);
        });
        $.getJSON('assets/json/kapuashulu/putussibauselatan.geojson', function(data){
            L.geoJson(data,{
                style : style
            }).addTo(putussibauselatan);
        });
        $.getJSON('assets/json/kapuashulu/putussibauutara.geojson', function(data){
            L.geoJson(data,{
                style : style
            }).addTo(putussibauutara);
        });
    //     var label = new L.Label()
    // label.setContent("static label")
    // label.setLatLng(jagoibabang.getBounds().getCenter())
    // map.showLabel(label);

        map.addLayer(badau);
        map.addLayer(puringkencana);
        map.addLayer(batanglupar);
        map.addLayer(embalohhulu);
        map.addLayer(putussibauutara);
        map.addLayer(putussibauselatan);




</script>
