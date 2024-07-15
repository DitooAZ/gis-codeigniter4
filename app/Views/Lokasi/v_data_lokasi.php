<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Kejadian</title>
    <!-- CSS DataTables -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="datatableSimple">
                    <thead>
                        <tr>
                <th>No</th>
                <th>TANGGAL KEJADIAN</th>
                <th>NAMA KAPAL</th>
                <th>JENIS KAPAL</th>
                <th>IMO</th>
                <th>MMSI</th>
                <th>PERUSAHAAN/PEMILIK KAPAL</th>
                <th>JENIS PELANGGARAN</th>
                <th>LOKASI KEJADIAN</th>
                <th>JUMLAH MUATAN</th>
                <th>JENIS MUATAN</th>
                <th>ASAL</th>
                <th>BENDERA KAPAL</th>
                <th>TUJUAN</th>
                <th>LONGITUDE</th>
                <th>LATITUDE</th>
                <th>ASAL ABK</th>
                <th>JUMLAH ABK</th>
                <th>PERATURAN YANG DILANGGAR</th>
                <th>POTENSI KERUGIAN NEGARA</th>
                <th>INSTANSI/ KAPAL YANG MENANGKAP</th>
                <th>DOKUMENTASI</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($lokasi as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['tgl_kejadian']?></td>
                    <td><?= $value['nm_kapal']?></td>
                    <td><?= $value['jenis_kapal']?></td>
                    <td><?= $value['imo']?></td>
                    <td><?= $value['mmsi']?></td>
                    <td><?= $value['perusahaan_kapal']?></td>
                    <td><?= $value['jenis_pelanggaran']?></td>
                    <td><?= $value['lokasi_kejadian']?></td>
                    <td><?= $value['jml_muatan']?></td>
                    <td><?= $value['jenis_muatan']?></td>
                    <td><?= $value['asal']?></td>
                    <td><?= $value['bendera_kapal']?></td>
                    <td><?= $value['tujuan']?></td>
                    <td><?= $value['longitude']?></td>
                    <td><?= $value['latitude']?></td>
                    <td><?= $value['asal_abk']?></td>
                    <td><?= $value['jumlah_abk']?></td>
                    <td><?= $value['pelanggaran']?></td>
                    <td><?= $value['kerugian_negara']?></td>
                    <td><?= $value['instansi_penangkap']?></td>
                    <td><img src="<?= base_url('foto/'.$value['foto_lokasi'])?>" width="200px"></td>
                    <td>
                        <!-- Tombol Edit hanya ditampilkan jika level pengguna bukan 'user' -->
                        <?php if (session()->get('level') != '3'): ?>
                            <a href="<?= base_url('Lokasi/editLokasi/' . $value['id_lokasi']) ?>" class="btn btn-warning">Edit</a>
                        <?php endif; ?>
                        <!-- Tombol Delete hanya ditampilkan jika level pengguna bukan 'user' -->
                        <?php if (session()->get('level') != '3'): ?>
                            <a href="<?= base_url('Lokasi/deleteLokasi/' . $value['id_lokasi']) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>

    <div class="col-md-2 mb-3">
            <!-- Tombol untuk Ekspor Excel -->
            <a href="<?= base_url('lokasi/exportToExcel') ?>" class="btn btn-success btn-block">Export to Excel</a>
        </div>
        
</div>
<script>
        $(document).ready(function() {
            $('#datatableSimple').DataTable({
                "scrollX": true // Aktifkan fitur slider ke samping
            });
        });
    </script>