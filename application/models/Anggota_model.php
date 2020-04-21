<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota_model extends CI_Model
{

    public $table = 'anggota';
    public $id = 'noanggota';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('noanggota', $q);
	$this->db->or_like('namaanggota', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('hp', $q);
	$this->db->or_like('noidentitas', $q);
	//$this->db->or_like('pwd', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('noanggota', $q);
	$this->db->or_like('namaanggota', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('hp', $q);
	$this->db->or_like('noidentitas', $q);
	//$this->db->or_like('pwd', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Anggota_model.php */
/* Location: ./application/models/Anggota_model.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-12-05 08:26:53 */
/* http://bhas.web.id */