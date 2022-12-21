<?php

namespace App\Models;

use CodeIgniter\Model;
class BrandModel extends Model {

    var $table = 'brands';

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('brands');
    }

    public function get_all_Brands() {
//       $query = $this->db->table('books');
       $query = $this->db->query('select * from brands');
//      print_r($query->getResult());
       // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_by_id($id) {
      $sql = 'select * from brands where id ='.$id ;
      $query =  $this->db->query($sql);

      return $query->getRow();
    }

    public function brand_add($data) {

        $query = $this->db->table($this->table)->insert($data);

        return $this->db->insertID();
    }

    public function brand_update($id, $data) {
        $this->db->table($this->table)->update($data, ['id'=>$id]);
//        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }

    public function delete_by_id($id) {
        $this->db->table($this->table)->delete(array('id' => $id)); 
    }

}