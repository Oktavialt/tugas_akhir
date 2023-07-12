<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasiModel;
use App\Models\SendMessageModel;
use App\Models\UserModel;
use App\Models\NotifikasiModel;
use Dompdf\Dompdf;
use DateTime;

class laporan extends Controller
{
    protected $laporanModel, $sendMessageModel, $userModel, $notifikasiModel;

    public function __construct(){
        $this->laporanModel = new laporan();
        $this->sendMessageModel = new SendMessageModel();
        $this->userModel = new UserModel();
        $this->notifikasiModel = new NotifikasiModel();
    }   

    public function index()
    {
        $isAdmin = $this->checkLogin();
        if(!$isAdmin) { return redirect()->to(base_url('layout/login')); }
        
        $getdata = $this->laporanModel->getdata();
        $notifikasi = $this->notifikasiModel->getData();
        $data = array(
            'dataReservasi' => $getdata,
            'notifikasi' => $notifikasi,
        );

        return view('Admin/Laporan', $data);
    }
}
