<?php

namespace App\Controllers;

use App\Models\ModelLokasi;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lokasi extends BaseController
{
    protected $ModelLokasi;

    public function __construct() {
        $this->ModelLokasi = new ModelLokasi();
        helper('filesystem');
    }
    
    public function tabelData()
    {
        $data = [
            'judul' => 'Tabel Data Pelanggaran Laut',
            'page' => 'Lokasi/v_data_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function inputLokasi()
    {
        $data = [
            'judul' => 'Input Lokasi',
            'page' => 'Lokasi/v_input_lokasi',
        ];
        return view('v_template', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'tgl_kejadian' => [
                'label' => 'Tanggal Kejadian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'nm_kapal' => [
                'label' => 'Nama Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jenis_kapal' => [
                'label' => 'Jenis Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'imo' => [
                'label' => 'IMO',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'mmsi' => [
                'label' => 'MMSI',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'perusahaan_kapal' => [
                'label' => 'Perusahaan/Pemilik Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jenis_pelanggaran' => [
                'label' => 'Jenis Pelanggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'lokasi_kejadian' => [
                'label' => 'Lokasi Kejadian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jml_muatan' => [
                'label' => 'Jumlah Muatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jenis_muatan' => [
                'label' => 'Jenis Muatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'asal' => [
                'label' => 'Asal Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'bendera_kapal' => [
                'label' => 'Bendera Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'tujuan' => [
                'label' => 'Tujuan Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'asal_abk' => [
                'label' => 'Asal ABK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jumlah_abk' => [
                'label' => 'Jumlah ABK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'pelanggaran' => [
                'label' => 'Peraturan Yang Dilanggar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'kerugian_negara' => [
                'label' => 'Potensi Kerugian Negara',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'instansi_penangkap' => [
                'label' => 'Instansi Yang Menangkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'foto_lokasi' => [
                'label' => 'Foto Lokasi',
                'rules' => 'uploaded[foto_lokasi]|max_size[foto_lokasi,1024]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong!',
                    'max_size' => 'Ukuran {field} maksimal 1024 KB!',
                    'mime_in' => 'Format {field} harus jpg, jpeg, atau png!'
                ]
            ]
        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            $nama_file_foto = $foto_lokasi->getRandomName();
            // Jika lolos validasi

            $data = [
                'tgl_kejadian'=>$this->request->getPost('tgl_kejadian'),
                'nm_kapal'=>$this->request->getPost('nm_kapal'),
                'jenis_kapal'=>$this->request->getPost('jenis_kapal'),
                'imo'=>$this->request->getPost('imo'),
                'mmsi'=>$this->request->getPost('mmsi'),
                'perusahaan_kapal'=>$this->request->getPost('perusahaan_kapal'),
                'jenis_pelanggaran'=>$this->request->getPost('jenis_pelanggaran'),
                'lokasi_kejadian'=>$this->request->getPost('lokasi_kejadian'),
                'jml_muatan'=>$this->request->getPost('jml_muatan'),
                'jenis_muatan'=>$this->request->getPost('jenis_muatan'),
                'asal'=>$this->request->getPost('asal'),
                'bendera_kapal'=>$this->request->getPost('bendera_kapal'),
                'tujuan'=>$this->request->getPost('tujuan'),
                'latitude'=>$this->request->getPost('latitude'),
                'longitude'=>$this->request->getPost('longitude'),
                'asal_abk'=>$this->request->getPost('asal_abk'),
                'jumlah_abk'=>$this->request->getPost('jumlah_abk'),
                'pelanggaran'=>$this->request->getPost('pelanggaran'),
                'kerugian_negara'=>$this->request->getPost('kerugian_negara'),
                'instansi_penangkap'=>$this->request->getPost('instansi_penangkap'),
                'foto_lokasi'=>$nama_file_foto,
            ];
            $foto_lokasi->move('foto', $nama_file_foto);
            //kriim data ke function insert data di model Lokasi
            $this->ModelLokasi->insertData($data);
            //notifikasi berhasil
            session()->setFlashdata('pesan', 'Data Berhasil Disimpan.');

            return redirect()->to('Lokasi/inputLokasi');
        } else {
            return redirect()->to('Lokasi/inputLokasi')->withInput();
            // Jika tidak lolos validasi
        }
    }

    public function index()
    {
        $data = [
            'judul' => 'Pemetaan Lokasi',
            'page' => 'Lokasi/v_pemetaan_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function grafik()
    {
        $chartPelanggaran = $this->ModelLokasi->grafik(); // Call method grafik in Model_chart
        $data = [
            'judul' => 'Grafik',
            'page' => 'Lokasi/v_grafik',
            'grafik' => $chartPelanggaran // Include chart data
        ];
        return view('v_template', $data); // Passing data to v_template
    }

    public function editLokasi($id_lokasi)
    {
        $data = [
            'judul' => 'Edit Lokasi',
            'page' => 'Lokasi/v_edit_lokasi',
            'lokasi' => $this->ModelLokasi->getDataByID($id_lokasi),
        ];
        return view('v_template', $data);
    }

    public function updateData($id_lokasi)
    {
        if ($this->validate([
            'tgl_kejadian' => [
                'label' => 'Tanggal Kejadian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'nm_kapal' => [
                'label' => 'Nama Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jenis_kapal' => [
                'label' => 'Jenis Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'imo' => [
                'label' => 'IMO',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'mmsi' => [
                'label' => 'MMSI',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'perusahaan_kapal' => [
                'label' => 'Perusahaan/Pemilik Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jenis_pelanggaran' => [
                'label' => 'Jenis Pelanggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'lokasi_kejadian' => [
                'label' => 'Lokasi Kejadian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jml_muatan' => [
                'label' => 'Jumlah Muatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jenis_muatan' => [
                'label' => 'Jenis Muatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'asal' => [
                'label' => 'Asal Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'bendera_kapal' => [
                'label' => 'Bendera Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'tujuan' => [
                'label' => 'Tujuan Kapal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'asal_abk' => [
                'label' => 'Asal ABK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'jumlah_abk' => [
                'label' => 'Jumlah ABK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'pelanggaran' => [
                'label' => 'Peraturan Yang Dilanggar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'kerugian_negara' => [
                'label' => 'Potensi Kerugian Negara',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'instansi_penangkap' => [
                'label' => 'Instansi Yang Menangkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'foto_lokasi' => [
                'label' => 'Foto Lokasi',
                'rules' => 'max_size[foto_lokasi,1024]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1024 KB!',
                    'mime_in' => 'Format {field} harus jpg, jpeg, atau png!'
                ]
            ]
        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');

            $lokasi = $this->ModelLokasi->getDataByID($id_lokasi);

            if ($foto_lokasi->getError() == 4) {
                $nama_file_foto = $lokasi['foto_lokasi'];
                # code...
            } else {
                $nama_file_foto = $foto_lokasi->getRandomName();
                $foto_lokasi->move('foto', $nama_file_foto);
            }
            // Jika lolos validasi

            $data = [
                'id_lokasi' => $id_lokasi,
                'tgl_kejadian'=>$this->request->getPost('tgl_kejadian'),
                'nm_kapal'=>$this->request->getPost('nm_kapal'),
                'jenis_kapal'=>$this->request->getPost('jenis_kapal'),
                'imo'=>$this->request->getPost('imo'),
                'mmsi'=>$this->request->getPost('mmsi'),
                'perusahaan_kapal'=>$this->request->getPost('perusahaan_kapal'),
                'jenis_pelanggaran'=>$this->request->getPost('jenis_pelanggaran'),
                'lokasi_kejadian'=>$this->request->getPost('lokasi_kejadian'),
                'jml_muatan'=>$this->request->getPost('jml_muatan'),
                'jenis_muatan'=>$this->request->getPost('jenis_muatan'),
                'asal'=>$this->request->getPost('asal'),
                'bendera_kapal'=>$this->request->getPost('bendera_kapal'),
                'tujuan'=>$this->request->getPost('tujuan'),
                'latitude'=>$this->request->getPost('latitude'),
                'longitude'=>$this->request->getPost('longitude'),
                'asal_abk'=>$this->request->getPost('asal_abk'),
                'jumlah_abk'=>$this->request->getPost('jumlah_abk'),
                'pelanggaran'=>$this->request->getPost('pelanggaran'),
                'kerugian_negara'=>$this->request->getPost('kerugian_negara'),
                'instansi_penangkap'=>$this->request->getPost('instansi_penangkap'),
                'foto_lokasi'=>$nama_file_foto,
            ];

            //kriim data ke function insert data di model Lokasi
            $this->ModelLokasi->updateData($data);
            //notifikasi berhasil
            session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

            return redirect()->to('Lokasi');
        } else {
            return redirect()->to('Lokasi/editLokasi/' . $id_lokasi)->withInput();
            // Jika tidak lolos validasi
        }
    }

    public function deleteLokasi($id_lokasi){
        $data = [
            'id_lokasi' => $id_lokasi,
        ];

        //kriim data ke function insert data di model Lokasi
        $this->ModelLokasi->deleteData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus.');
        return redirect()->to('Lokasi/index');
    }

public function exportToExcel()
    {
        // Ambil data dari database
        $lokasi = $this->ModelLokasi->getAllData();

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Buat sheet baru
        $sheet = $spreadsheet->getActiveSheet();

        // Set header kolom
        $sheet->setCellValue('A1', 'Tanggal Kejadian');
        $sheet->setCellValue('B1', 'NAMA KAPAL');
        $sheet->setCellValue('C1', 'JENIS KAPAL');
        $sheet->setCellValue('D1', 'IMO');
        $sheet->setCellValue('E1', 'MMSI');
        $sheet->setCellValue('F1', 'PERUSAHAAN/PEMILIK KAPAL');
        $sheet->setCellValue('G1', 'JENIS PELANGGARAN');
        $sheet->setCellValue('H1', 'LOKASI KEJADIAN');
        $sheet->setCellValue('I1', 'JUMLAH MUATAN');
        $sheet->setCellValue('J1', 'JENIS MUATAN');
        $sheet->setCellValue('K1', 'ASAL');
        $sheet->setCellValue('L1', 'BENDERA KAPAL');
        $sheet->setCellValue('M1', 'TUJUAN');
        $sheet->setCellValue('N1', 'LONGITUDE');
        $sheet->setCellValue('O1', 'LATITUDE');
        $sheet->setCellValue('P1', 'ASAL ABK');
        $sheet->setCellValue('Q1', 'JUMLAH ABK');
        $sheet->setCellValue('R1', 'PERATURAN YANG DILANGGAR');
        $sheet->setCellValue('S1', 'POTENSI KERUGIAN NEGARA');
        $sheet->setCellValue('T1', 'INSTANSI/ KAPAL YANG MENANGKAP');
        $sheet->setCellValue('U1', 'DOKUMENTASI');
        // Lanjutkan dengan header kolom lainnya

        // Isi data dari database ke dalam sheet
        $row = 2;
        foreach ($lokasi as $data) {
            $sheet->setCellValue('A' . $row, $data['tgl_kejadian']);
            $sheet->setCellValue('B' . $row, $data['nm_kapal']);
            $sheet->setCellValue('C' . $row, $data['jenis_kapal']);
            $sheet->setCellValue('D' . $row, $data['imo']);
            $sheet->setCellValue('E' . $row, $data['mmsi']);
            $sheet->setCellValue('F' . $row, $data['perusahaan_kapal']);
            $sheet->setCellValue('G' . $row, $data['jenis_pelanggaran']);
            $sheet->setCellValue('H' . $row, $data['lokasi_kejadian']);
            $sheet->setCellValue('I' . $row, $data['jml_muatan']);
            $sheet->setCellValue('J' . $row, $data['jenis_muatan']);
            $sheet->setCellValue('K' . $row, $data['asal']);
            $sheet->setCellValue('L' . $row, $data['bendera_kapal']);
            $sheet->setCellValue('M' . $row, $data['tujuan']);
            $sheet->setCellValue('N' . $row, $data['longitude']);
            $sheet->setCellValue('O' . $row, $data['latitude']);
            $sheet->setCellValue('P' . $row, $data['asal_abk']);
            $sheet->setCellValue('Q' . $row, $data['jumlah_abk']);
            $sheet->setCellValue('R' . $row, $data['pelanggaran']);
            $sheet->setCellValue('S' . $row, $data['kerugian_negara']);
            $sheet->setCellValue('T' . $row, $data['instansi_penangkap']);
            $sheet->setCellValue('U' . $row, $data['foto_lokasi']);
            // Lanjutkan dengan kolom lainnya
            $row++;
        }

        // Set nama file dan jenis content type
        $filename = 'data_kejadian_2024.xlsx';

        // Buat writer untuk Excel
        $writer = new Xlsx($spreadsheet);

        // Simpan file Excel ke output buffer
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        // Atur header untuk respon HTTP
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Keluarkan output file Excel
        echo $excelOutput;
        exit();
    }

}
