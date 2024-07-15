
<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Layers Control Tutorial - Leaflet</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>


</head>
<body>
<div id="map" style="width: 100%; height: 100vh;"></div>


<script>
//===marker===//

const cities = L.layerGroup();

const popupContent = `
    <div>
        <h3>Perampokan</h3>
        <img src="https://asset.kompas.com/crops/GX9agGYFMCe-kJw65hhTQVi6z7U=/0x0:0x0/750x500/data/photo/2024/02/09/65c5db789d4d3.jpg" alt="Pelaku perompakan kapal nelayan diamankan di Mapolres Bangka Barat, Babel" style="max-width: 100%;">
        <p>Additional information:</p>
        <ul>
            <li>TANGGAL KEJADIAN : 19/01/2024</li>
            <li>NAMA KAPAL : KM Mega Padang dan KM Guna 1</li>
            <li>JENIS KAPAL : KAPAL NELAYAN</li>
            <li>ASAL : Pulau Nangka, Bangka barat</li>
            <li>TUJUAN : Mentok, Bangka Barat</li>
            <li>KAPAL YANG MENANGKAP : Polres Bangka Barat</li>
        </ul>
    </div>
`;

const mBangkaBarat = L.marker([-1.902870827044658, 105.19256096442155])
    .bindPopup(popupContent)
    .addTo(cities);


    const popupContent2 = `
    <div>
        <h3>IUU Fishing</h3>
        <img src="https://cdn.antaranews.com/cache/800x533/2024/02/29/IMG-20240229-WA0009_2.jpg.webp" alt="Kapal Pengawas (KP) Orca 04 melakukan henrikhan (penghentian, pemeriksaan, dan penahanan) terhadap satu unit kapal ikan asing (KIA) berbendera Filipina berinisial FB. LB. JM A-2" style="max-width: 100%;">
        <p>Additional information:</p>
        <ul>
            <li>TANGGAL KEJADIAN : 16/03/2024</li>
            <li>NAMA KAPAL : FB. LB. JM A-2</li>
            <li>JENIS MUATAN : Ikan</li>
            <li>JENIS KAPAL : Kapal Ikan</li>
            <li>ASAL : Filipina</li>
            <li>TUJUAN : Filipina</li>
            <li>KAPAL YANG MENANGKAP : Kementerian Kelautan dan Perikanan (KKP) Kapal Pengawas Orca 04</li>
        </ul>
    </div>
`;

const mWPPNRI716LautSulawesi = L.marker([2.3335155389913274, 125.49997317790508])
    .bindPopup(popupContent2)
    .addTo(cities);

    const popupContent3 = `
    <div>
        <h3>IUU Fishing</h3>
        <img src="https://cdn.antaranews.com/cache/800x533/2024/01/09/psdkp_kapal_ikan_ilegal_sibolga_1.jpg.webp" alt="" style="max-width: 100%;">
        <p>Additional information:</p>
        <ul>
            <li>TANGGAL KEJADIAN : 09/01/2024</li>
            <li>NAMA KAPAL : KM Swarna</li>
            <li>JENIS MUATAN : Ikan</li>
            <li>JENIS KAPAL : Kapal Ikan</li>
            <li>ASAL : Indoenesia</li>
            <li>TUJUAN : - </li>
            <li>KAPAL YANG MENANGKAP : Pengawas (Satwas) PSDKP Sibolga menggunakan kapal KP Napoleon 036</li>
        </ul>
    </div>
`;

const mWPPNRI572Sibolga= L.marker([1.800177319977988, 97.55011678813105])
    .bindPopup(popupContent3)
    .addTo(cities);

    const popupContent4 = `
    <div>
        <h3>Pencurian</h3>
        <img src="data:image/jpeg;base64,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" alt="" style="max-width: 100%;">
        <p>Additional information:</p>
        <ul>
            <li>TANGGAL KEJADIAN : 29/02/2024</li>
            <li>NAMA KAPAL : MV African Halcyon</li>
            <li>JENIS MUATAN : -</li>
            <li>JENIS KAPAL : Kapal Kargo</li>
            <li>ASAL : Bahama</li>
            <li>TUJUAN : - </li>
            <li>KAPAL YANG MENANGKAP : Pangkalan TNI Angkatan Laut Dumai</li>
        </ul>
    </div>
`;
const mPerairanDumai = L.marker([1.8907763139268927, 101.9461720644167])
.bindPopup(popupContent4)
.addTo(cities);

//===Akhir marker===//

const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
});

const map = L.map('map', {
	center: [-4.303140075959234, 120.76132131051186],
	zoom: 5,
	layers: [osm, cities]
});

const baseLayers = {
	'OpenStreetMap': osm,
	'OpenStreetMap.HOT': osmHOT
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
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});
layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
layerControl.addOverlay(parks, 'Parks');
</script>



</body>
</html>
