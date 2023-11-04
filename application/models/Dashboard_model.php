<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_all_count()       
    {
        $obat = $this->db->get('obat')->num_rows();
        $transaksi = $this->db->get('transaksi')->num_rows();
        $supplier = $this->db->get('supplier')->num_rows();
        $total = $this->db->select_sum('total_bayar')->from('transaksi')->get()->row();
        $count = [
            'obat' => $obat,
            'transaksi' => $transaksi,
            'supplier' => $supplier,
            'total' => $total->total_bayar,
        ];
        return $count;
    }
}
