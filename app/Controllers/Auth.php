<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Auth extends BaseController
{
    public function __construct(){
        helper('form');
        $this->Model_Auth = new Model_Auth();
    }

    public function register(){
        $data = [
            'title' => 'Register',
        ];
        return view('v_register', $data);
    }

    public function save_register()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'email' => [
                'label' => 'Email User',
                'rules' => 'required|valid_email|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!',
                    'valid_email' => 'Format {field} tidak valid!',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!',
                    'matches' => '{field} Tidak Sama!'
                ]
            ]
        ])) {
            $nama_user = $this->request->getPost('nama_user');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
    
            $existingUser = $this->Model_Auth->where('email', $email)->orWhere('nama_user', $nama_user)->first();
    
            if ($existingUser) {
                session()->setFlashdata('errors', ['User dengan email atau nama pengguna yang sama sudah terdaftar!']);
                return redirect()->to(base_url('Auth/register'));
            } else {
                $data = [
                    'nama_user' => $nama_user,
                    'email' => $email,
                    'password' => $password, // Hashing dilakukan di model
                    'level' => 3
                ];
                $this->Model_Auth->save_register($data);
    
                session()->setFlashdata('pesan', 'Register Berhasil!');
                return redirect()->to(base_url('Auth/register'));
            }
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    public function login(){
        $data = [
            'title' => 'Login',
        ];
        return view('v_login', $data);
    }

    public function cek_login(){
        if ($this->validate([
            'email' => [
                'label' => 'Email User',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!',
                    'valid_email' => 'Format {field} tidak valid!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->Model_Auth->login($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('foto_user', $cek['foto_user']);
                return redirect()->to(base_url('Lokasi/v_pemetaan_lokasi'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal!, Cek Email atau Password kembali');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout(){
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('level');
        session()->remove('foto_user');
        session()->setFlashdata('pesan', 'Logout sukses!');
        return redirect()->to(base_url('index.php'));
    }
}
