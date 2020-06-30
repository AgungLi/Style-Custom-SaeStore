<?php

class Produk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all produk
    public function listing()
    {
        $this->db->select('produk.*,
                            users.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // END JOIN
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing all produk home
    public function home()
    {
        $this->db->select(
            'produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori'
        );
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();
    }

    // Read Produk
    public function read($slug_produk)
    {
        $this->db->select(
            'produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori'
        );
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->where('produk.slug_produk', $slug_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // tampilkan data produk
    public function produk($limit, $start)
    {
        $this->db->select(
            'produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori'
        );
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    // total produk
    public function total_produk()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $query = $this->db->get();
        return $query->row();
    }

    // tampilkan data kategori produk
    public function kategori($id_kategori, $limit, $start)
    {
        $this->db->select(
            'produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori'
        );
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->where('produk.id_kategori', $id_kategori);
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    // total kategori produk
    public function total_kategori($id_kategori)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->row();
    }

    // listing kategori
    public function listing_kategori()
    {
        $this->db->select('produk.*,
                            users.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori');
        $this->db->from('produk');
        // JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        // END JOIN
        $this->db->group_by('produk.id_kategori');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // detail produk
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Login produk
    public function login($produk, $password)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where(array(
            'produk' => $produk,
            'password' => SHA1($password)
        ));
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //tambah
    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    //  edit
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }

    //  delete
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data);
    }
}
