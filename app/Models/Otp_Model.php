<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp_model extends CI_Model {

    public function save_otp($phone_number, $otp_code, $otp_expiration)
    {
        $data = array(
            'phone_number' => $phone_number,
            'otp_code' => $otp_code,
            'otp_expiration' => $otp_expiration
        );

        $this->db->insert('users', $data);
    }

    public function verify_otp($phone_number, $otp_code)
    {
        $current_datetime = date('Y-m-d H:i:s');

        $this->db->where('phone_number', $phone_number);
        $this->db->where('otp_code', $otp_code);
        $this->db->where('otp_expiration >', $current_datetime);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return true; // OTP verification success
        } else {
            return false; // OTP verification failed
        }
    }

}
