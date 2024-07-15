<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<div class="row">
    <div class="col-sm-8">
        <div id="map" style="width: 100%; height: 150vh;"></div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <?php

use Kint\Zval\Value;

            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } 
            ?>
            <?php $errors =  validation_errors()?>
            <?php echo form_open_multipart('Lokasi/updateData/'.$lokasi['id_lokasi'])?>
                
            <div class="form-group">
                    <label>Tanggal Kejadian</label>
                    <input class="form-control datepicker" type="text" name="tgl_kejadian" placeholder="YYYY/MM/DD" value="<?= set_value('tgl_kejadian'), $lokasi['tgl_kejadian']?>" id="datepicker">
                    <p class="text-danger"><?= isset($errors['tgl_kejadian']) == isset($errors['tgl_kejadian']) ? validation_show_error('tgl_kejadian') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Nama Kapal</label>
                    <input class="form-control" name="nm_kapal" value="<?= set_value('nm_kapal'), $lokasi['nm_kapal'] ?>">
                    <p class="text-danger"><?= isset($errors['nm_kapal']) == isset($errors['nm_kapal']) ? validation_show_error('nm_kapal') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Jenis kapal</label>
                    <input class="form-control" name="jenis_kapal" value="<?= set_value('jenis_kapal'), $lokasi['jenis_kapal'] ?>">
                    <p class="text-danger"><?= isset($errors['jenis_kapal']) == isset($errors['jenis_kapal']) ? validation_show_error('jenis_kapal') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>IMO</label>
                    <input class="form-control" name="imo" value="<?= set_value('imo'), $lokasi['imo'] ?>">
                    <p class="text-danger"><?= isset($errors['imo']) == isset($errors['imo']) ? validation_show_error('imo') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>MMSI</label>
                    <input class="form-control" name="mmsi" value="<?= set_value('mmsi'), $lokasi['mmsi'] ?>">
                    <p class="text-danger"><?= isset($errors['mmsi']) == isset($errors['mmsi']) ? validation_show_error('mmsi') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Perusahaan/Pemilik Kapal</label>
                    <input class="form-control" name="perusahaan_kapal" value="<?= set_value('perusahaan_kapal'), $lokasi['perusahaan_kapal'] ?>">
                    <p class="text-danger"><?= isset($errors['perusahaan_kapal']) == isset($errors['perusahaan_kapal']) ? validation_show_error('perusahaan_kapal') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Jenis Pelanggaran</label>
                    <select class="form-control select2" aria-label="jenis Pelanggaran" size="5" name="jenis_pelanggaran">
                        <option value="" disabled selected>Pilih Jenis Pelanggaran</option>
                        <option value="Perampokan" <?= set_select('jenis_pelanggaran', 'Perampokan') ?>>Perampokan</option>
                        <option value="Pencurian" <?= set_select('jenis_pelanggaran', 'Pencurian') ?>>Pencurian</option>
                        <option value="Penyelundupan Barang" <?= set_select('jenis_pelanggaran', 'Penyelundupan Barang') ?>>Penyelundupan Barang</option>
                        <option value="Penyelundupan Kayu" <?= set_select('jenis_pelanggaran', 'Penyelundupan Kayu') ?>>Penyelundupan Kayu </option>
                        <option value="Penyelundupan Hewan" <?= set_select('jenis_pelanggaran', 'Penyelundupan Hewan') ?>>Penyelundupan Hewan </option>
                        <option value="Penyelundupan BBM" <?= set_select('jenis_pelanggaran', 'Penyelundupan BBM') ?>>Penyelundupan BBM </option>
                        <option value="Penyelundupan Senjata" <?= set_select('jenis_pelanggaran', 'Penyelundupan Senjata') ?>>Penyelundupan Senjata </option>
                        <option value="Kerusakan Ekosistem" <?= set_select('jenis_pelanggaran', 'Kerusakan Ekosistem') ?>>Kerusakan Ekosistem </option>
                        <option value="Penyelundupan Narkoba" <?= set_select('jenis_pelanggaran', 'Penyelundupan Narkoba') ?>>Penyelundupan Narkoba </option>
                        <option value="Penyelundupan Manusia" <?= set_select('jenis_pelanggaran', 'Penyelundupan Manusia') ?>>Penyelundupan Manusia </option>
                        <option value="IUU Fishing" <?= set_select('jenis_pelanggaran', 'IUU Fishing') ?>>IUU Fishing </option>
                        <option value="BMKT Illegal" <?= set_select('jenis_pelanggaran', 'BMKT Illegal') ?>>BMKT Illegal </option>
                        <option value="Tanpa Izin/Dokumen" <?= set_select('jenis_pelanggaran', 'Tanpa Izin/Dokumen') ?>>Tanpa Izin/Dokumen </option>
                        <option value="Pelanggaran Wilayah" <?= set_select('jenis_pelanggaran', 'Pelanggaran Wilayah') ?>>Pelanggaran Wilayah </option>
                        <option value="Penambangan Illegal" <?= set_select('jenis_pelanggaran', 'Penambangan Illegal') ?>>Penambangan Illegal </option>
                        <!-- Tambahkan opsi lainnya di sini -->
                    </select>
                    <p class="text-danger"><?= isset($errors['jenis_pelanggaran']) ? validation_show_error('jenis_pelanggaran') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Lokasi Kejadian</label>
                    <input class="form-control" name="lokasi_kejadian" value="<?= set_value('lokasi_kejadian'), $lokasi['lokasi_kejadian'] ?>">
                    <p class="text-danger"><?= isset($errors['lokasi_kejadian']) == isset($errors['lokasi_kejadian']) ? validation_show_error('lokasi_kejadian') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Longitude</label>
                    <input class="form-control" name="longitude" id="Longitude" value="<?= set_value('longitude'), $lokasi['longitude'] ?>">
                    <p class="text-danger"><?= isset($errors['longitude']) == isset($errors['longitude']) ? validation_show_error('longitude') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Latitude</label>
                    <input class="form-control" name="latitude" id="Latitude" value="<?= set_value('latitude'), $lokasi['latitude'] ?>">
                    <p class="text-danger"><?= isset($errors['latitude']) == isset($errors['latitude']) ? validation_show_error('latitude') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Jumlah Muatan</label>
                    <input class="form-control" name="jml_muatan" value="<?= set_value('jml_muatan'), $lokasi['jml_muatan'] ?>">
                    <p class="text-danger"><?= isset($errors['jml_muatan']) == isset($errors['jml_muatan']) ? validation_show_error('jml_muatan') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Jenis Muatan</label>
                    <input class="form-control" name="jenis_muatan" value="<?= set_value('jenis_muatan'), $lokasi['jenis_muatan'] ?>">
                    <p class="text-danger"><?= isset($errors['jenis_muatan']) == isset($errors['jenis_muatan']) ? validation_show_error('jenis_muatan') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Asal Kapal</label>
                    <input class="form-control" name="asal" value="<?= set_value('asal'), $lokasi['asal'] ?>">
                    <p class="text-danger"><?= isset($errors['asal']) == isset($errors['asal']) ? validation_show_error('asal') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Bendera Kapal</label>
                    <input class="form-control" name="bendera_kapal"value="<?= set_value('bendera_kapal'), $lokasi['bendera_kapal'] ?>">
                    <p class="text-danger"><?= isset($errors['bendera_kapal']) == isset($errors['bendera_kapal']) ? validation_show_error('bendera_kapal') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Tujuan Kapal</label>
                    <input class="form-control" name="tujuan" value="<?= set_value('tujuan'), $lokasi['tujuan'] ?>">
                    <p class="text-danger"><?= isset($errors['tujuan']) == isset($errors['tujuan']) ? validation_show_error('tujuan') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Asal ABK</label>
                    <input class="form-control" name="asal_abk" value="<?= set_value('asal_abk'), $lokasi['asal_abk'] ?>">
                    <p class="text-danger"><?= isset($errors['asal_abk']) == isset($errors['asal_abk']) ? validation_show_error('asal_abk') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Jumlah ABK</label>
                    <input class="form-control" name="jumlah_abk" value="<?= set_value('jumlah_abk'), $lokasi['jumlah_abk'] ?>">
                    <p class="text-danger"><?= isset($errors['jumlah_abk']) == isset($errors['jumlah_abk']) ? validation_show_error('jumlah_abk') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Peraturan Yang Dilanggar</label>
                    <input class="form-control" name="pelanggaran"value="<?= set_value('pelanggaran'), $lokasi['pelanggaran'] ?>">
                    <p class="text-danger"><?= isset($errors['pelanggaran']) == isset($errors['pelanggaran']) ? validation_show_error('pelanggaran') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Potensi Kerugian Negara</label>
                    <input class="form-control" name="kerugian_negara" value="<?= set_value('kerugian_negara'), $lokasi['kerugian_negara'] ?>">
                    <p class="text-danger"><?= isset($errors['kerugian_negara']) == isset($errors['kerugian_negara']) ? validation_show_error('kerugian_negara') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Instansi Yang Menangkap</label>
                    <input class="form-control" name="instansi_penangkap" value="<?= set_value('instansi_penangkap'), $lokasi['instansi_penangkap'] ?>">
                    <p class="text-danger"><?= isset($errors['instansi_penangkap']) == isset($errors['instansi_penangkap']) ? validation_show_error('instansi_penangkap') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Foto Lokasi</label>
                    <input type="file" class="form-control" name="foto_lokasi" accept="image/*">
                    <p class="text-danger"><?= isset($errors['foto_lokasi']) == isset($errors['foto_lokasi']) ? validation_show_error('foto_lokasi') : '' ?></p>
                    <img src="<?= base_url('foto/' . $lokasi['foto_lokasi'])?>" width="200px">
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>

            <?php echo form_close() ?>
        </div>
    </div>
</>

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
	'OpenStreetMap': osm,
};

const overlays = {

};

const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

const Stadia_AlidadeSatellite = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_satellite/{z}/{x}/{y}{r}.{ext}', {
	minZoom: 0,
	maxZoom: 20,
	attribution: '&copy; CNES, Distribution Airbus DS, © Airbus DS, © PlanetObserver (Contains Copernicus Data) | &copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	ext: 'jpg'
});
layerControl.addBaseLayer(Stadia_AlidadeSatellite, 'AlidadeSatellite')


//Get Coordinate

var latInput = document.querySelector("[name=longitude]");
var lngInput = document.querySelector("[name=latitude]");
var Posisi = document.querySelector("[name=posisi]");
var curLocation = [-4.303140075959234, 120.76132131051186];
map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation,{
    draggable : true,
}).addTo(map);

//mengambil koordinat saat marker di geser
marker.on('dragend', function(e){
    var position = marker.getLatLng();
    latInput.value = position.lat.toFixed(6); // membatasi jumlah angka di belakang koma menjadi enam digit
    lngInput.value = position.lng.toFixed(6); // membatasi jumlah angka di belakang koma menjadi enam digit
    Posisi.value = position.lat.toFixed(6) + ',' + position.lng.toFixed(6); // membatasi jumlah angka di belakang koma menjadi enam digit
});

//mengambil koordinat saat di klik
map.on('click', function(e){
    var lat = e.latlng.lat.toFixed(6); // membatasi jumlah angka di belakang koma menjadi enam digit
    var lng = e.latlng.lng.toFixed(6); // membatasi jumlah angka di belakang koma menjadi enam digit
    marker.setLatLng(e.latlng);
    latInput.value = lat;
    lngInput.value = lng;
    Posisi.value = lng + ',' + lat;
});


    // Fungsi untuk menginisialisasi datepicker
    function initDatepicker() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd' // Format tanggal yang diinginkan
        });
    }

    // Panggil fungsi inisialisasi datepicker dan Select2 saat halaman dimuat
    $(document).ready(function() {
        initDatepicker(); // Inisialisasi datepicker
        $('.select2').select2({ // Inisialisasi Select2
            placeholder: "Pilih Jenis Pelanggaran",
            allowClear: true
        });
    });

    // Panggil fungsi inisialisasi datepicker saat layar diubah ukurannya
    $(window).on('resize', function(){
        initDatepicker();
    });

    // Mendapatkan URL dasar proyek menggunakan CodeIgniter 4 URL Helper
    var baseUrl = "<?= base_url() ?>";

    // Menambahkan overlay gambar
    var imageUrl = baseUrl + 'img/Batas Laut NKRI 2017.png';
    var errorOverlayUrl = 'https://cdn-icons-png.flaticon.com/512/110/110686.png'; // Contoh URL untuk gambar error
    var altText = 'Image of NKRI Sea Boundaries';
    var latLngBounds = L.latLngBounds([
        [8.845054, 91.305756], // Koordinat barat laut Indonesia
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
