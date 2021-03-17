<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if ($this->session->userdata('inbound') != TRUE) {
            redirect(base_url('webmin/login'));
        } elseif ($role != "admin" && $role != "petugas" && $role != "keuangan") {
            show_404();
        } else {
        }
        $this->load->model('admin_model');
        $this->load->helper('kode');
    }

    public function index()
    {
        show_404();
    }

    public function daftar()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }

        $valid_columns = array(
            0 => 'nomor',
            1 => 'nama',
            2 => 'jalur',
            3 => 'pil1',
            4 => 'keterangan_pendaftaran',
            5 => 'status',
            6 => 'status_berkas',
        );
        if (!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }
        if ($order != null) {
            $this->db->order_by($order, $dir);
        }

        if (!empty($search)) {
            $x = 0;
            foreach ($valid_columns as $sterm) {
                if ($x == 0) {
                    $this->db->like($sterm, $search);
                } else {
                    $this->db->or_like($sterm, $search);
                }
                $x++;
            }
        }
        $this->db->limit($length, $start);
        $pendaftar = $this->db->get("tb_pendaftaran");
        $data = array();
        foreach ($pendaftar->result() as $rows) {
            $aksi  = '<div class="dropdown">
					<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						Aksi
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/detil_daftar/') . url_encode($rows->nomor) . ' "><i class="fas fa-edit"></i> Edit / lihat Detail Camaba</a></a></li>
						<li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/kwitansi/') . url_encode($rows->nomor) . '" target="_blank"><i class="fas fa-money-bill-wave-alt"></i> Cetak Kwitansi</a></li>
						<li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/bukti/') . url_encode($rows->nomor) . '" target="_blank"><i class="fas fa-credit-card"></i> Cetak Bukti Pendaftaran</a></li>
						<li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/bdaftar/') . url_encode($rows->nomor) . '" target="_blank"><i class="fas fa-file"></i> Cetak Bukti / Berkas Pendaftaran</a></li>
						<div class="dropdown-divider"></div>
						<li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/verifi/') . url_encode($rows->nomor) . '"><i class="fas fa-hands-helping"></i> Verifikasi Pendaftaran</a></li>
						<li><a class="dropdown-item" tabindex="1" href="#" data-toggle="modal" data-target="#modal-danger" data-id="' . url_encode($rows->nomor) . '"><i class="fas fa-key"></i> Reset Password</a></li>
						<li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/berkas/') . url_encode($rows->nomor) . '"><i class="fas fa-eye"></i> Cek Berkas</a></li>
						<li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/uploadberkas/') . url_encode($rows->nomor) . '"><i class="fas fa-upload"></i> Upload Berkas</a></li>
						<div class="dropdown-divider"></div>
						<li><a class="dropdown-item" tabindex="1" href="#" data-toggle="modal" data-target="#modal-his" data-id="' . url_encode($rows->nomor) . '"><i class="fas fa-history"></i> Riwayat Perubahan</a></li>
					</ul>
				  </div>';
            $cekberkas = $this->admin_model->getBerkas($rows->nomor);
            if (empty($cekberkas)) {
                $rberkas = '<a href="' . base_url('webmin/admin/berkas/') . url_encode($rows->nomor) . '" type="button" class="btn btn-block btn-primary">-</a>';
            } else {
                $rberkas = '<a href="' . base_url('webmin/admin/berkas/') . url_encode($rows->nomor) . '" type="button" class="btn btn-block btn-success">On</a>';
            }

            $data[] = array(
                $rows->nomor,
                $rows->nama,
                $rows->jalur,
                getSingkatanProdi($rows->pil1),
                $rows->keterangan_pendaftaran,
                $aksi,
                getStatusPendaftaran($rows->status),
                getStatusBerkas($rows->status_berkas, $rows->nomor),
                $rberkas
            );
        }
        $total_pendaftar = $this->totalDaftar();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_pendaftar,
            "recordsFiltered" => $total_pendaftar,
            "data" => $data
        );
        echo json_encode($output);
        //print_r($data);
        //echo $order;
        exit();
    }


    public function totalDaftar()
    {
        $query = $this->db->select("COUNT(*) as num")->get("tb_pendaftaran");
        $result = $query->row();
        if (isset($result)) return $result->num;
        return 0;
    }

    public function bayar_du()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }

        $valid_columns = array(
            0 => 'tanggal_verifikasi_du',
            1 => 'nomor',
            2 => 'nama',
            3 => 'jalur',
            4 => 'prodi',
        );
        if (!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }
        if ($order != null) {
            $this->db->order_by($order, $dir);
        }

        if (!empty($search)) {
            $x = 0;
            foreach ($valid_columns as $sterm) {
                if ($x == 0) {
                    $this->db->where(["daftar_ulang !=" => 0]);
                    $this->db->like($sterm, $search);
                } else {
                    $this->db->where(["daftar_ulang !=" => 0]);
                    $this->db->or_like($sterm, $search);
                }
                $x++;
            }
        }
        $this->db->where(["daftar_ulang !=" => 0]);
        $this->db->limit($length, $start);
        $pendaftar = $this->db->get("tb_pendaftaran");
        $data = array();
        $no   = 1;
        foreach ($pendaftar->result() as $rows) {
            $aksi  = '<div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                        Aksi
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/du/cetak_kuwi/') . url_encode($rows->nomor) . '"><i class="fas fa-credit-card"></i> Cetak Kwitansi Daftar Ulang</a></a></li>
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/du/list_edit_du/') . url_encode($rows->nomor) . '"><i class="fas fa-edit"></i> Edit Pembayaran</a></a></li>
                    </ul>
                  </div>';

            $data[] = array(
                $no,
                $rows->nomor,
                $rows->nama,
                $rows->jalur,
                getSingkatanProdi($rows->prodi),
                $aksi,
                getStatusDaftarUlang($rows->daftar_ulang),
            );
            $no++;
        }
        $total_pendaftar = $this->totalBayarDU();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_pendaftar,
            "recordsFiltered" => $total_pendaftar,
            "data" => $data
        );
        echo json_encode($output);
        //print_r($data);
        //echo $order;
        exit();
    }


    public function totalBayarDU()
    {
        $this->db->where(["daftar_ulang !=" => 0]);
        $query = $this->db->select("COUNT(*) as num")->get("tb_pendaftaran");
        $result = $query->row();
        if (isset($result)) return $result->num;
        return 0;
    }

    public function lulus_seleksi()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }

        $valid_columns = array(
            0 => 'tanggal_verifikasi_du',
            1 => 'nomor',
            2 => 'nama',
            3 => 'jalur',
            4 => 'prodi',
        );
        if (!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }
        if ($order != null) {
            $this->db->order_by($order, $dir);
        }

        if (!empty($search)) {
            $x = 0;
            foreach ($valid_columns as $sterm) {
                if ($x == 0) {
                    $this->db->where(["lulus_seleksi" => 1]);
                    $this->db->like($sterm, $search);
                } else {
                    $this->db->where(["lulus_seleksi" => 1]);
                    $this->db->or_like($sterm, $search);
                }
                $x++;
            }
        }
        $this->db->where(["lulus_seleksi" => 1]);
        $this->db->limit($length, $start);
        $pendaftar = $this->db->get("tb_pendaftaran");
        $data = array();
        $no   = 1;
        foreach ($pendaftar->result() as $rows) {
            $aksi  = '<div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                        Aksi
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/detil_daftar/') . url_encode($rows->nomor) . '"><i class="fas fa-edit"></i> Edit / lihat Detail Camaba</a></a></li>
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/du/') . url_encode($rows->nomor) . '"><i class="fas fa-users-cog"></i> Daftar Ulang</a></a></li>
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/admin/ubahprodi/') . url_encode($rows->nomor) . '"><i class="fas fa-columns"></i> Ubah Prodi</a></a></li>';
            if ($this->session->userdata('role') == 'keuangan' or $this->session->userdata('role') == 'admin') {
                $aksi  .= '<div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/du/offlinedu/') . url_encode($rows->nomor) . '"><i class="fas fa-wallet"></i> Pembayaran Offline</a></li>
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/du/cetak_kuwi/') . url_encode($rows->nomor) . '"><i class="fas fa-credit-card"></i> Cetak Kwitansi Daftar Ulang</a></li>
                        <li><a class="dropdown-item" tabindex="1" href="' . base_url('webmin/du/ubah_nim/') . url_encode($rows->nomor) . '"><i class="fas fa-edit"></i> Ubah NIM</a></li>';
            }
            $aksi  .= '<div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" tabindex="1" href="#" data-toggle="modal" data-target="#modal-his" data-id="' . url_encode($rows->nomor) . '"><i class="fas fa-history"></i> Riwayat Perubahan</a></li>
                    </ul>
                  </div>';

            $data[] = array(
                $no,
                $rows->nomor,
                $rows->nama,
                $rows->jalur,
                getSingkatanProdi($rows->prodi),
                $aksi,
                getStatusDaftarUlang($rows->daftar_ulang),
            );
            $no++;
        }
        $total_pendaftar = $this->totalLulusSeleksi();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_pendaftar,
            "recordsFiltered" => $total_pendaftar,
            "data" => $data
        );
        echo json_encode($output);
        //print_r($data);
        //echo $order;
        exit();
    }


    public function totalLulusSeleksi()
    {
        $this->db->where(["lulus_seleksi" => 1]);
        $query = $this->db->select("COUNT(*) as num")->get("tb_pendaftaran");
        $result = $query->row();
        if (isset($result)) return $result->num;
        return 0;
    }
}
