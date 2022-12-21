<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    var $table = 'products';

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('products');
    }

    public function get_all_products()
    {
        //       $query = $this->db->table('books');
        //    $query = $this->db->query('select * from products');
        $query = $this->db->query('SELECT * FROM products
       LEFT JOIN brands
       ON brands.id = products.brand_id
       LEFT JOIN categories
       ON categories.id =  products.category_id  
       ORDER BY `products`.`product_id` DESC
       ');




        //      print_r($query->getResult());
        // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_by_id($id)
    {
        $sql = 'select * from products where product_id=' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function product_add($data)
    {

        $query = $this->db->table($this->table)->insert($data);

        return $this->db->insertID();
    }

    public function product_update($id, $data)
    {
        $this->db->table($this->table)->update($data, ['product_id' => $id]);
        //        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }

    public function delete_by_id($id)
    {
        $this->db->table($this->table)->delete(array('product_id' => $id));
    }
    public function search($keyword)
    {

        $query = $this->db->query("SELECT * FROM products
        LEFT JOIN brands
        ON brands.id = products.brand_id
        LEFT JOIN categories
        ON categories.id =  products.category_id
      
         WHERE `product_name` LIKE '%$keyword%'");
        // $this->db->table($this->table);
        // $this->db->select('*');
        // $this->db->from('products');
        // $this->db->like('product_name', $keyword);
        return $query->getResult();
    }
    public function tag($id)
    {

        $query = $this->db->query("SELECT * FROM products
        LEFT JOIN brands
        ON brands.id = products.brand_id
        LEFT JOIN categories
        ON categories.id =  products.category_id
      
         WHERE `brand_id` = '$id'");
        // $this->db->table($this->table);
        // $this->db->select('*');
        // $this->db->from('products');
        // $this->db->like('product_name', $keyword);
        return $query->getResult();
    }
}
