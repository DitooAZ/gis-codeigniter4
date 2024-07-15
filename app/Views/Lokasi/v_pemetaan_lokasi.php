<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-layers-expanded/css/leaflet-control-layers-expanded.css" />
    <style>
        #map { width: 100%; height: 100vh; }
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-layers-expanded/js/leaflet-control-layers-expanded.js"></script>
    <script>
        const baseUrl = "<?= base_url() ?>";

        // Array untuk menyimpan URL ikon untuk setiap jenis pelanggaran
        const markerIcons = {
            "Perampokan": baseUrl + "img/bad-person.png",
            "Pencurian": baseUrl + "img/thief.png",
            "Penyelundupan Barang": baseUrl + "img/illegal.png",
            "Penyelundupan Kayu": baseUrl + "img/woods.png",
            "Penyelundupan Hewan": baseUrl + "img/cat-face.png",
            "Penyelundupan BBM": baseUrl + "img/gasoline.png",
            "Penyelundupan Senjata": baseUrl + "img/machine-gun.png",
            "Kerusakan Ekosistem": baseUrl + "img/prevention.png",
            "Penyelundupan Narkoba": baseUrl + "img/no-drugs.png",
            "Penyelundupan Manusia": baseUrl + "img/group.png",
            "IUU Fishing": baseUrl + "img/kayak.png",
            "BMKT Illegal": baseUrl + "img/vase.png",
            "Tanpa Izin/Dokumen": baseUrl + "img/no-document.png",
            "Pelanggaran Wilayah": baseUrl + "img/barrier.png",
            "Penambangan Illegal": baseUrl + "img/pickaxe.png"
        };

        // Define tile layers
        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        const Stadia_AlidadeSatellite = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_satellite/{z}/{x}/{y}{r}.{ext}', {
            minZoom: 0,
            maxZoom: 20,
            attribution: '&copy; CNES, Distribution Airbus DS, © Airbus DS, © PlanetObserver (Contains Copernicus Data) | &copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            ext: 'jpg'
        });

        const map = L.map('map', {
            center: [-0.7893, 113.9213],
            zoom: 5,
            layers: [osm]
        });

//        var southWest = L.latLng (-24.841080494693983, 88.62448916512614),
//            northEast = L.latLng (25.533367076168684, 133.8946512476971),
//            bounds = L.latLngBounds (southWest, northEast);
//
//            map.setMaxBounds(bounds);
//            map.fitBounds (bounds);


        const baseLayers = {
            "OpenStreetMap": osm,
            "Alidade Satellite": Stadia_AlidadeSatellite
        };

        const layers = {};

        // Initialize layers for each type of violation
        Object.keys(markerIcons).forEach(type => {
            layers[type] = L.layerGroup().addTo(map);
        });

        // Pemetaan lokasi
        <?php foreach ($lokasi as $key => $value): ?>
            var iconUrl = markerIcons["<?= $value['jenis_pelanggaran'] ?>"];
            var markerIcon = L.icon({
                iconUrl: iconUrl,
                iconSize: [32, 32], // Sesuaikan ukuran ikon
                iconAnchor: [16, 32], // Titik di mana ikon akan berada
                popupAnchor: [0, -32] // Titik di mana popup akan muncul
            });

            var marker = L.marker([<?= $value['longitude'] ?>, <?= $value['latitude'] ?>], {icon: markerIcon})
                .bindPopup(
                    '<h2><?= $value['jenis_pelanggaran'] ?></h2><br>'+
                    '<img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" width="175px"><br><br>'+
                    'Tanggal Kejadian : <?= $value['tgl_kejadian'] ?><br>'+
                    'Nama Kapal : <?= $value['nm_kapal'] ?><br>'+
                    'Jenis Kapal : <?= $value['jenis_kapal'] ?><br>'+
                    <?php if (session()->get('level') == 1 || session()->get('level') == 3): ?>
                        'IMO : <?= $value['imo'] ?><br>'+
                        'MMSI : <?= $value['mmsi'] ?><br>'+
                        'Perusahaan/Pemilik Kapal : <?= $value['perusahaan_kapal'] ?><br>'+
                        'Lokasi Kejadian  : <?= $value['lokasi_kejadian'] ?><br>'+
                        'Jumlah Muatan : <?= $value['jml_muatan'] ?><br>'+
                        'Jenis Muatan : <?= $value['jenis_muatan'] ?><br>'+
                        'Asal Kapal : <?= $value['asal'] ?><br>'+
                        'Bendera Kapal : <?= $value['bendera_kapal'] ?><br>'+
                        'Tujuan Kapal : <?= $value['tujuan'] ?><br>'+
                        'Longitude : <?= $value['longitude'] ?><br>'+
                        'Latitude : <?= $value['latitude'] ?><br>'+
                        'Asal ABK : <?= $value['asal_abk'] ?><br>'+
                        'Jumlah ABK : <?= $value['jumlah_abk'] ?><br>'+
                        'Undang - Undang Pelanggaran : <?= $value['pelanggaran'] ?><br>'+
                        'Kerugian Negara : <?= $value['kerugian_negara'] ?><br>'+
                    <?php endif; ?>
                    'Instansi Penangkap : <?= $value['instansi_penangkap'] ?><br>'
                );

            // Add marker to the appropriate layer group
            layers["<?= $value['jenis_pelanggaran'] ?>"].addLayer(marker);
        <?php endforeach; ?>

        const overlayMaps = {};
        Object.keys(layers).forEach(type => {
            overlayMaps[type] = layers[type];
        });

        L.control.layers(baseLayers, overlayMaps).addTo(map);

        // Menambahkan overlay gambar
        var imageUrl = baseUrl + 'img/Batas Laut NKRI 2017.png';
        var errorOverlayUrl = 'https://cdn-icons-png.flaticon.com/512/110/110686.png'; // Contoh URL untuk gambar error
        var altText = 'Image of NKRI Sea Boundaries';
        var latLngBounds = L.latLngBounds([
            [8.745054, 91.305756], // Koordinat barat laut Indonesia
            [-14.209615, 141.579662] // Koordinat tenggara Indonesia
        ]);

        var imageOverlay = L.imageOverlay(imageUrl, latLngBounds, {
            opacity: 0.8,
            errorOverlayUrl: errorOverlayUrl,
            alt: altText,
            interactive: false
        }).addTo(map);

        // Event listener untuk menangani kesalahan saat memuat gambar overlay
        imageOverlay.on('error', function() {
            console.error("Error loading image overlay:", imageUrl);
        });
    </script>
</body>
</html>
