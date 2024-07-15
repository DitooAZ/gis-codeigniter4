<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model
{
    protected $table = 'tbl_user'; // Menentukan nama tabel
    protected $allowedFields = ['nama_user', 'email', 'password', 'level'];

    public function save_register($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); // Hash password sebelum menyimpan
        $this->insert($data);
    }

    public function login($email, $password)
    {
        $user = $this->where('email', $email)->first();
        if ($user) {
            // Jika password di database tidak di-hash, periksa apakah password yang diinput cocok
            if (password_verify($password, $user['password']) || $user['password'] === $password) {
                return $user;
            }
        }
        return false;
    }
}
