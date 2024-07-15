<div id="map" style="width: 100%; height: 100vh;"></div>



<script>
    const map = L.map('map').setView([-4.303140075959234, 120.76132131051186], 5);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
</script>