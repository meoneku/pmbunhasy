<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logindb extends CI_Model
{
    function auth($username,$password){
        $query=$this->db->query("SELECT * FROM tb_pendaftaran WHERE email='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    function authadmin($username,$password){
        $query=$this->db->query("SELECT * FROM tb_user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    function getData($no)
    {
        $query=$this->db->query("SELECT * FROM tb_pendaftaran WHERE nomor='$no'");
        return $query;
    }
}
?>