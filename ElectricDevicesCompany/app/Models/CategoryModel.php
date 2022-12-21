<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    var $table = 'categories';

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('categories');
    }

    public function get_all_categories() {
//       $query = $this->db->table('books');
       $query = $this->db->query('select * from categories');
//      print_r($query->getResult());
       // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_by_id($id) {
      $sql = 'select * from categories where id ='.$id ;
      $query =  $this->db->query($sql);

      return $query->getRow();
    }

    public function category_add($data) {

        $query = $this->db->table($this->table)->insert($data);

        return $this->db->insertID();
    }

    public function category_update($id, $data) {
        $this->db->table($this->table)->update($data, ['id'=>$id]);
//        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }

    public function delete_by_id($id) {
        $this->db->table($this->table)->delete(array('id' => $id)); 
    }
}
