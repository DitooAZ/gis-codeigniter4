<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude" id="Latitude">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" id="Longitude">
            <br>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Posisi</label>
            <input class="form-control" name="posisi" id="Posisi">
            <br>
        </div>
    </div>

    <div class="col-sm-12">
    	<div id="map" style="width: 100%; height: 100vh;"></div>
    </div>
</div>

<script>
const cities = L.layerGroup();

const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

const map = L.map('map', {
	center: [-4.303140075959234, 120.76132131051186],
	zoom: 5,
	layers: [osm, cities]
});

const baseLayers = {
	'OpenStreetMap': osm
};

const overlays = {
	'Cities': cities
};

const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

const crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.');
const rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');

const parks = L.layerGroup([crownHill, rubyHill]);

const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
layerControl.addOverlay(parks, 'Parks');

//Get Coordinate

var latInput = document.querySelector("[name=latitude]");
var lngInput = document.querySelector("[name=longitude]");
var Posisi = document.querySelector("[name=posisi]");
var curLocation = [-4.303140075959234, 120.76132131051186];
map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation,{
    draggable : true,
}).addTo(map);

//mengambil koordinat saat marker di geser
marker.on('dragend', function(e){
    var position = marker.getLatLng();
    latInput.value = position.lat;
    lngInput.value = position.lng;
    Posisi.value = position.lat + ',' + position.lng;
});

//mengambil koordinat saat di klik
map.on('click', function(e){
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    marker.setLatLng(e.latlng);
    latInput.value = lat;
    lngInput.value = lng;
    Posisi.value = lat + ',' + lng;
});

</script>
