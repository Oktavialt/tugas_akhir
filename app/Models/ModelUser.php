<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['nama_lengkap','aktif', 'username', 'alamat', 'nomor_telepon', 'password', 'level_user', 'otp'];

    public function login($username, $password)
    {
        return $this->where(['username' => $username, 'password' => $password])->first();
    }
    public function otp($username, $otp){
        return $this->where(['username' => $username, 'otp' => $otp])->first();
    }
    // Fungsi untuk mendapatkan seluruh data user
    public function getUsers()
    {
        return $this->findAll();
    }

    // Fungsi untuk mendapatkan data user berdasarkan id
    public function getUserById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk menyimpan data user baru
    public function saveUser($data)
    {
        $this->insert($data);
    }

    // Fungsi untuk mengupdate data user
    public function updateUser($id, $data)
    {
        $this->update($id, $data);
    }

    // Fungsi untuk menghapus data user
    public function deleteUser($id)
    {
        $this->delete($id);
    }

    public function totalUser()
    {
        $query = $this->db->query("SELECT * FROM user WHERE level_user = 'Pelanggan'");
        return $query->getNumRows();
    }
}
