<?php


class Model_invoice extends CI_Model{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $kurir = $this->input->post('kurir');
        $bank = $this->input->post('bank');
        $total_belanja = $this->input->post('total_belanja');
        $invoice = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'),
            date('i') + 120, date('s'), date('m'), date('d'), date('Y'))),
            'status' => 0,
            'email' => $email,
            'kurir' => $kurir,
            'bank' => $bank,
            'total_belanja' => $total_belanja
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();
        foreach ($this->cart->contents() as $item)
        {
            $data = array(
                'id_invoice'    => $id_invoice,
                'id_brg'        => $item['id'],
                'nama_brg'      => $item['name'],
                'jumlah'        => $item['qty'],
                'harga'         => $item['price'],
            );
            $this->db->insert('tb_pesanan', $data);
        }
        return TRUE;
    }
    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
    public function tampil_data_user($user) {
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->where('nama', $user['name']); // Pastikan kolom 'nama' ada di tabel tb_invoice
        $query = $this->db->get();
        return $query;
    }
    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if($result->num_rows() > 0)
        { return $result->row();}
        else{return false;}
    }
    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if($result->num_rows() > 0)
        {return $result->result();}
        else{return false;}
    }
    public function get_all_invoices($table) 
    {
        return $this->db->get($table)->result_array();
    }
    public function get_data_user($user)
    {
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->where('nama', $user['name']); // Pastikan kolom 'nama' ada di tabel tb_invoice
        $query = $this->db->get();
        return $query;
    }
}