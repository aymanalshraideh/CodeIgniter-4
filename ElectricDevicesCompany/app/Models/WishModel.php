<?php

namespace App\Models;

use CodeIgniter\Model;

class WishModel extends Model
{
    var $table = 'wish';

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('products');
    }


    public function wish_add($data) {

    $query = $this->db->table($this->table)->insert($data);

    return $this->db->insertID();
}

    public function allwish() {
        $sql='SELECT * FROM wish
       
        LEFT JOIN products
        ON products.product_id =  wish.product_idd 
        where wish.user_id='.session()->get('id');
        $query = $this->db->query($sql);
        
                return $query->getResult();
    }
    public function delete_by_id($u,$p)
    {
        $this->db->table($this->table)->delete(array('product_idd' => $p , 'user_id' => $u));
    }
}
