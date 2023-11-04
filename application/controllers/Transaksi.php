<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

    private $array_obat = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
    }

    public function index()
	{
        $m = $this->input->post('min');
        $s = $this->input->post('max');

        if ($m && $s !== null) {

                $transaksi = $this->Transaksi_model->get_sc($m, $s)->result();
                foreach ($transaksi as $key => $value) {
                    $transaksi[$key]->obat = $this->Transaksi_model->get_obat($value->id)->result();
                }

        }else{

            $transaksi = $this->Transaksi_model->get_all()->result();
            foreach ($transaksi as $key => $value) {
                $transaksi[$key]->obat = $this->Transaksi_model->get_obat($value->id)->result();
            }
        }

        $data['transaksi'] = $transaksi;
        $this->layout->set_title('Data transaksi'); 
        return $this->layout->load('template', 'transaksi/index', $data);
    }
    
    public function tambah()
    {
        $this->load->model('Obat_model');
        $data['obat'] = $this->Obat_model->get_all();
        $this->layout->set_title('Tambah transaksi');
        return $this->layout->load('template', 'transaksi/tambah', $data);
    }

    // public function sc()
    // {
    //     $m = $this->input->post('min');
    //     $s = $this->input->post('max');

    //     $trans = $this->Transaksi_model->get_sc($m, $s)->result();
    //     foreach ($trans as $key => $value) {
    //         $trans[$key]->obat = $this->Transaksi_model->get_obat($value->id)->result();
    //     }
    //     $data['transaksi'] = $trans;
    //     $this->layout->set_title('Data transaksi'); 
    //     return $this->layout->load('template', 'transaksi/index', $data);
    // }

    public function store()
    {
        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required|trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('data_obat', 'Obat', 'callback__data_obat_check');
        $this->form_validation->set_rules('bayar', 'bayar', 'required|greater_than_equal_to['.$this->input->post('tot').']',
            ['greater_than_equal_to' => 'Uang Bayar Lebih Sedikit dari Total Bayar']);
        if ($this->form_validation->run() == FALSE)
        {
            $response = [
                'status' => false,
                'message' => 'form error',
                'error' => validation_errors('<div class="alert alert-danger">', '</div>'),
            ];
            echo json_encode($response);
            return;


        }
            $data_transaksi = [
                'tgl' => date('Y-m-d h:i:s'),
                'total_bayar' => $this->input->post('tot'),
                'uang_bayar' => $this->input->post('bayar'),
                'kembalian' => ($this->input->post('bayar'))-($this->input->post('tot')),
                'nama_pembeli' => $this->input->post('nama_pembeli'),
                'admin_id' => $this->session->userdata('user_id'),
            ];
            $tambah = $this->Transaksi_model->create($data_transaksi);
            $transaksi_id = $this->db->insert_id();

            $detail_transaksi = [];
            foreach ($this->array_obat as $key => $ob) {
                $detail_transaksi[$key] = [
                    'transaksi_id' => $transaksi_id,
                    'kode_obat' => $ob->kode,
                    'jumlah' => $ob->jumlah,
                ];
            }
            $this->Transaksi_model->create_detail($detail_transaksi);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $response = [
                'status' => true,
                'message' => $msg,
            ];
            echo json_encode($response);
            return;

        
    }


    public function _data_obat_check($value)
    {
        $this->array_obat = json_decode($value);
        if (empty($this->array_obat)) 
        {
            $this->form_validation->set_message('_data_obat_check', 'The {field} can not be empty');
            return false;
        }
        foreach ($this->array_obat as $ob) 
        {
            $obat = $this->db->get_where('obat', ['kode' => $ob->kode])->row();
            if (! $obat) 
            {
                $this->form_validation->set_message('_data_obat_check', 'Data {field} tidak ditemukan');
                return false;
            }
            if ((int)$obat->stok < $ob->jumlah) 
            {
                $this->form_validation->set_message('_data_obat_check', "Gagal!, Stok Obat {$obat->nama_obat} Sudah Habis");
                // $this->form_validation->set_message('_data_obat_check', "Gagal!, Stok Obat {$obat->nama_obat} tersisa {$obat->stok} anda menginput {$ob->jumlah}");
                return false;
            }
        }
        return true;
    }

    public function print($id)
    {

            $transaksi = $this->Transaksi_model->get_id($id)->result();
            foreach ($transaksi as $key => $value) {
                $transaksi[$key]->obat = $this->Transaksi_model->get_obat($value->id)->result();
            }
            $tanggal = new DateTime($transaksi[$key]->tgl);

            $data['tr'] = $transaksi;
            $data = [
                'tgl' => $transaksi[$key]->tgl,
                'total_bayar' => $transaksi[$key]->total_bayar,
                'uang_bayar' => $transaksi[$key]->uang_bayar,
                'kembalian' => $transaksi[$key]->kembalian,
                'nama_pembeli' => $transaksi[$key]->nama_pembeli,
                'admin' => $transaksi[$key]->admin,
                'obat' => $transaksi[$key]->obat];
                // 'nama_obat' => $transaksi[$key]->nama_obat,
            // ];
            // var_dump($data['tgl'],$data['total_bayar'],$data['uang_bayar'],$data['kembalian'],$data['obat']);
            //     var_dump($data['obat']);
            // die();
            $this->load->view('transaksi/print', $data);
    }

    public function hapus($id = null)
    {
        if (! $id) return show_404();
        $this->db->delete('transaksi', ['id' => $id]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('transaksi');
    }
}
