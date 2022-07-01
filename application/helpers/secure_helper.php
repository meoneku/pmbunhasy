<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function url_encode($string) {

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */        
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv     = substr(hash("sha256", $secret_iv), 0, 16);

    //do the encryption given text/string/number
    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}


function url_decode($string) {

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */

    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);

    //do the decryption given text/string/number

    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}

function sendMail($email, $pesan, $subjek)
     {
          $config['mailtype'] = 'html';
          $config['protocol'] = 'smtp';
          $config['smtp_host'] = '';
          $config['smtp_user'] = '';
          $config['smtp_pass'] = '';
          $config['smtp_port'] = 587;
          $config['newline'] = "\r\n";

          $ci =& get_instance();

          $ci->load->library('email', $config);

          $ci->email->from('', 'Tim Sekretariat PMB');
          $ci->email->to($email);
          $ci->email->subject($subjek);
          $ci->email->message($pesan);

          if($ci->email->send()) {
               
          }
          else {
               //echo $ci->email->print_debugger();
          }
     }
