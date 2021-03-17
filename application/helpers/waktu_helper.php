<?php
if ( ! function_exists('getSelisihWaktu'))
{
	function getSelisihWaktu($awal)
    {
        $begin      = date_create($awal);
        $end        = date_create();
        $diff       = date_diff($begin, $end);

        if ($diff->y != 0){
            $result = $diff->y.' Tahun Yang Lalu';
        } elseif ($diff->m != 0){
            $result = $diff->m.' Bulan Yang Lalu';
        } elseif ($diff->d != 0){
            $result = $diff->d.' Hari Yang Lalu';
        } elseif ($diff->h != 0){
            $result = $diff->h.' Jam Yang Lalu';
        } elseif ($diff->m != 0){
            $result = $diff->m.' Bulan Yang Lalu';
        } elseif ($diff->i != 0){
            $result = $diff->i.' Menit Yang Lalu';
        } elseif ($diff->s != 0){
            $result = $diff->s.' Detik Yang Lalu';
        } 
        return $result;
    }
}

if ( ! function_exists('getTanggalIndo'))
{
    function getTanggalIndo($tanggal)
    {
        if ($tanggal == "" OR $tanggal == "0" OR $tanggal == "0000-00-00") {
            $result = "";
        } else {
            $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $split = explode('-', $tanggal);
            $result = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        }
        return $result;
    }   
}
?>