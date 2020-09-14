<script>
    var Icons = L.Icon.extend({
            options: {
                iconSize: [20, 20],
                popupAnchor: [0, -20],
                tooltipAnchor: [ 10, 0 ]
            }
        });
    var search;
   var ekonomi = L.layerGroup(),
        lingkungan = L.layerGroup(),
        listrik = L.layerGroup(),
        tambang = L.layerGroup(),
        sosial =L.layerGroup();
var potensi = ['Ekonomi','Lingkungan','Listrik','Tambang','Sosial']
    axios.get('{{ route('api.potensi.index')}}')
        .then(function(response) {
                // console.log(response.data.features[0].properties.category_id);
               // console.log(response.data);
                searchEko = response.data.features;

                for(var i in potensi){
                    //console.log(potensi[i])
                    L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng, {
                            icon: new Icons({
                            iconUrl: '{{ asset('storage')}}'+"/"+ geoJsonPoint.properties.icon
                             })
                        }).on('click', onClick).bindTooltip(geoJsonPoint.properties.lokasi+" <br> "+geoJsonPoint.properties.bangunan,
                        {
                            permanent: true,
                            direction: 'right'
                        }
                        );
                    },
                    filter: function (feature) {
                        if (feature.properties.potensi == potensi[i]) return true
                    }
                }).addTo((potensi[i]=='Ekonomi')? ekonomi : (potensi[i]=='Lingkungan')? lingkungan:(potensi[i]=='Listrik')? listrik : (potensi[i]=='Tambang') ? tambang : sosial);
                }

               //console.log(potensi)
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
</script>
