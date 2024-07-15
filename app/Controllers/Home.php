<?php

namespace App\Controllers;

use App\Controllers\Lokasi;

class Home extends BaseController
{
    // 
    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard',
            'page' => 'v_dashboard',
        ];
        return view('v_template', $data);
    }

    public function viewMap(): string
    {
        $data = [
            'judul' => 'View Map',
            'page' => 'v_view_map',
        ];
        return view('v_template', $data);
    }

    public function baseMap(): string
    {
        $data = [
            'judul' => 'Base Map',
            'page' => 'v_base_map',
        ];
        return view('v_template', $data);
    }

    public function marker(): string
    {
        $data = [
            'judul' => 'Marker',
            'page' => 'v_marker',
        ];
        return view('v_template', $data);
    }

    public function getcoordinat()
    {
        $data = [
            'judul' => 'Get Coordinat',
            'page' => 'v_get_coordinat',
        ];
        return view('v_template', $data);
    }

    public function dashboard()
    {
        $data = [
            'judul' => 'Dashboard',
            'page' => 'v_dashboard',
        ];
        return view('v_template', $data);
    }

}
