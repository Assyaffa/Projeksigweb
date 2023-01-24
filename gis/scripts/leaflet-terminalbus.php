<script type="text/javascript" src="assets/geojson/jkt-terminalbus.js"></script>
<script>
            var centerLatLng = [-6.172064426851854, 106.82797304774769];
            var mapOptions = {
                center: centerLatLng,
                zoom: 10
            }
            var map = L.map('map', mapOptions);

            var tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href = "http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            });
            tileLayer.addTo(map);
            var geojson;

            var geojsonMarkerOptions = {
                radius: 6,
                fillColor: "#ff7800",
                color: "#000",
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            };  

            function setCircleMarker(feature, latlng) {
                return L.circleMarker(latlng, geojsonMarkerOptions);
            }


            function getDescription(feature, layer) {
                var popupContent = "";
                if (feature.properties && feature.properties.NAMOBJ) {
                popupContent += feature.properties.NAMOBJ;
                }
                layer.bindPopup(popupContent);
            }

            geojson = L.geoJSON(data, {
                pointToLayer: setCircleMarker,
                onEachFeature: getDescription

            }).addTo(map);
</script>