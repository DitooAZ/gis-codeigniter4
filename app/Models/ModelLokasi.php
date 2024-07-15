<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    //fungsi insert data
    public function insertData($data)
    {
        $this->db->table('tbl_lokasi')->insert($data);
    }

    //fungsi mengambil seluruh data
    public function getAllData()
    {
        return $this->db->table('tbl_lokasi')
        ->get()->getResultArray();
    }

    //fungsi mengambil seluruh data berdasarkan ID
    public function getDataByID($id_lokasi)
    {
        return $this->db->table('tbl_lokasi')
        ->where('id_lokasi', $id_lokasi)
        ->get()->getRowArray();
    }

        //fungsi update data
        public function updateData($data)
        {
            $this->db->table('tbl_lokasi')
            ->where('id_lokasi',$data['id_lokasi'])
            ->update($data);
        }

        //fungsi delete data
        public function deleteData($data)
        {
            $this->db->table('tbl_lokasi')
            ->where('id_lokasi',$data['id_lokasi'])
            ->delete($data);
        }

    public function grafik()
    {
        // Kueri untuk pie chart (pelanggaran)
        $queryPieChart = "SELECT jenis_pelanggaran AS PELANGGARAN, COUNT(*) AS total_pelanggaran 
                          FROM tbl_lokasi
                          GROUP BY jenis_pelanggaran";
    
        // Kueri untuk bar chart (waktu pelanggaran)
        $queryBarChart = "SELECT MONTH(tgl_kejadian) AS BULAN, COUNT(*) AS total_pelanggaran 
                          FROM tbl_lokasi
                          GROUP BY MONTH(tgl_kejadian)";
    
        $result['pieChart'] = $this->db->query($queryPieChart)->getResultArray();
        $result['barChart'] = $this->db->query($queryBarChart)->getResultArray();
    
        return $result;
    }
    
    
}
