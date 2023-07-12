<?php 

namespace App\Controllers;

use CodeIgniter\Controller;

class ubahPassword extends Controller
{
public function kirimOtp()
    {
        return view('auth.kirimotp');
    }

    public function verifikasiOtp(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
            ]
        );

        $otp = random_int(100000, 999999);
        $kirimOtp = User::where('username', $request->username)->update([
            'otp' => $otp,
        ]);
        if($kirimOtp) {
            $user = User::where('username', $request->username)->first();
            $request->session()->put('user_id', $user->id);

            if($user->jabatan == "admin") {
                $noTelp = Admin::where('id_user', $user->id)->first();
            } elseif($user->jabatan == "guru") {
                $noTelp = Guru::where('id_user', $user->id)->first();
            } elseif($user->jabatan == "siswa") {
                $noTelp = Siswa::where('id_user', $user->id)->first();
            }

            $message = "Hi, ".$noTelp->nama."!\n\nKode OTP Anda ".$otp.", masukkan kode OTP berikut untuk mengganti password Anda. Jangan bagikan kode OTP kepada siapapun\n\n-Admin";

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'target' => $noTelp->no_telp,
            'message' => $message,
            'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Uz@i_wGo9ETcb6aQS9Wx' //change TOKEN to your actual token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            return view('auth.verifikasiotp');
        }
    }
}