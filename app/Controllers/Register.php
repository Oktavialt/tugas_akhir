<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\SendMessageModel;
use CodeIgniter\Controller;
// use App\Models\usermodel;

class Register extends Controller
{
	protected  $sendMessageModel;

    public function __construct(){
        // $this->reservasiModel = new ReservasiModel();
        $this->sendMessageModel = new SendMessageModel();
        // $this->userModel = new UserModel();
        // $this->notifikasiModel = new NotifikasiModel();
    }   

	public function index()
	{
		//include helper form
		helper(['form']);
		$data = [];
		echo view('register', $data);
	}

	public function save()
	{
		//include helper form
		helper(['form']);
		//set rules validation form
		$rules = [
			'name' 			=> 'required|min_length[3]|max_length[20]',
		];
		// get method post
		if ($this->request->getMethod() == 'post') {
			$this->modelUser = new ModelUser();
			// data user dan password
			$nama_lengkap 	= htmlspecialchars($this->request->getPost('nama'));
			$username	= htmlspecialchars($this->request->getPost('username'));
			$password = htmlspecialchars(md5($this->request->getPost('password')));
			$alamat	= htmlspecialchars($this->request->getPost('alamat'));
			$nomor_telepon	= htmlspecialchars($this->request->getPost('nomor_telepon'));
			$level_user	= htmlspecialchars($this->request->getPost('level_user'));
			// $otp	= htmlspecialchars($this->request->getPost('otp'));
			// input data register ke dalam database user
			$otp = random_int(10000,99999);
			$this->modelUser->insert([
				'nama_lengkap' 	=> $nama_lengkap,
				'username' 	=> $username,
				'password' => $password,
				'alamat' 	=> $alamat,
				'nomor_telepon' 	=> $nomor_telepon,
				'level_user' => 'Pelanggan',
				'otp' => $otp,
			]);

			$message = ' Kode otp anda adalah '.$otp .'Masukkan kode ini untuk mengaktifkan akun anda.Jangan bagikan kode ini kepada siapapun!';
			
			$send = $this->sendMessageModel->kirimPesan($nomor_telepon, $message);
			$send = json_decode($send);
			session()->setFlashdata('pesan', 'Selamat Anda Berhasil Registrasi');
			return redirect()->to('/layout/otp');
		} else {
			$data['validation'] = $this->validator;
			echo view('register', $data);
		}
	}
	
}
