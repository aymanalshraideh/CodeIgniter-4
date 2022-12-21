<?php

namespace App\Controllers;

use App\Models\BrandModel;
use App\Models\productModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

class ProductsController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        $data['page_title'] = 'Products';

        $this->CategoryModel = new CategoryModel();
        $categories = $this->CategoryModel->get_all_categories();
        $this->BrandModel = new BrandModel();
        $brands = $this->BrandModel->get_all_brands();
        $data['brands'] = $brands;
        $data['categories'] = $categories;





        $this->ProductModel = new ProductModel();
        $products = $this->ProductModel->get_all_products();


        $data['products'] = $products;
        echo view('admin/products', $data);
        // 
        // return view('admin/brands', $data);
    }
    public function  product_add()
    {

        helper(['form', 'url']);
        $this->ProductModel = new ProductModel();
        $file1 = $this->request->getFile('product_image1');
        $fileName1 = $file1->getRandomName();
        $file2 = $this->request->getFile('product_image2');
        $fileName2 = $file2->getRandomName();
        $file3 = $this->request->getFile('product_image3');
        $fileName3 = $file3->getRandomName();
        $file4 = $this->request->getFile('product_image4');
        $fileName4 = $file4->getRandomName();

        $data = array(
            'product_name' => $this->request->getPost('product_name'),
            'product_model' => $this->request->getPost('product_model'),
            'product_color' => $this->request->getPost('product_color'),
            'product_specification' => $this->request->getPost('product_specification'),
            'product_price' => $this->request->getPost('product_price'),
            'product_count' => $this->request->getPost('product_count'),
            'brand_id' => $this->request->getPost('brand_id'),
            'category_id' => $this->request->getPost('category_id'),
            'product_image1' => 'uploads/images/product/' . $fileName1,
            'product_image2' => 'uploads/images/product/' . $fileName2,
            'product_image3' => 'uploads/images/product/' . $fileName3,
            'product_image4' => 'uploads/images/product/' . $fileName4,
        );
        if ($data) {
            $file1->move('uploads/images/product', $fileName1);
            $file2->move('uploads/images/product', $fileName2);
            $file3->move('uploads/images/product', $fileName3);
            $file4->move('uploads/images/product', $fileName4);
        }
        $insert = $this->ProductModel->product_add($data);
        return redirect()->to('products');
    }
    public function fetch()
    {

        $this->ProductModel = new ProductModel();
        $products = $this->ProductModel->get_all_products();
        foreach ($products as $product) {
            echo '
                <tr>
               
                    <td>' . $product->product_name . '</td>
                            <td>' . $product->product_model . '</td>
                           <td>' . $product->product_color . '</td>
                           <td>' . $product->product_specification . '</td>
                           <td>' . $product->product_price . '</td>
                           <td>' . $product->product_count . '</td>
                           <td>' . $product->brand_name . '</td>
                           <td>' . $product->category_name . '</td>
                           <td><img src="' . $product->product_image1 . '" alt="image" width="100px" height="50px"></td>
                           <td><img src="' . $product->product_image2 . '" alt="image" width="100px" height="50px"></td>
                           <td><img src="' . $product->product_image3 . '" alt="image" width="100px" height="50px"></td>
                           <td><img src="' . $product->product_image4 . '" alt="image" width="100px" height="50px"></td>
                           
                           <td>
                               <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editModal" onclick="edit_product(' . $product->product_id . ')">Edit</button>
                               <button class="btn btn-danger"  onclick="product_delete(' . $product->product_id . ')">Delete</button>
    
                           </td>
                 </tr>
                ';
        }
    }

    public function ajax_edit($id)
    {

        $this->ProductModel = new ProductModel();

        $data = $this->ProductModel->get_by_id($id);

        echo json_encode($data);
    }

    public function product_update()
    {

        helper(['form', 'url']);

        $this->ProductModel = new ProductModel();

        $id = $this->request->getPost('product_id');
        $data3 = $this->ProductModel->get_by_id($id);


        $file1 = $this->request->getFile('product_image1');
        // $fileName1 = $file1->getRandomName();
        $file2 = $this->request->getFile('product_image2');
        // $fileName2 = $file2->getRandomName();
        $file3 = $this->request->getFile('product_image3');
        // $fileName3 = $file3->getRandomName();
        $file4 = $this->request->getFile('product_image4');
        // $fileName4 = $file4->getRandomName();


        if ($file1 == '') {
            $fileName1 = $data3->product_image1;
        } else {
            $fileName1 = $file1->getRandomName();
            $file1->move('uploads/images/product', $fileName1);
        }
        if ($file2 == '') {
            $fileName2 = $data3->product_image2;
        } else {
            $fileName2 = $file2->getRandomName();
            $file2->move('uploads/images/product', $fileName2);
        }
        if ($file3 == '') {
            $fileName3 = $data3->product_image3;
        } else {
            $fileName3 = $file3->getRandomName();
            $file3->move('uploads/images/product', $fileName3);
        }
        if ($file4 == '') {
            $fileName4 = $data3->product_image4;
        } else {
            $fileName4 = $file4->getRandomName();
            $file4->move('uploads/images/product', $fileName4);
        }

        $data = array(
            'product_name' => $this->request->getPost('product_name'),
            'product_model' => $this->request->getPost('product_model'),
            'product_color' => $this->request->getPost('product_color'),
            'product_specification' => $this->request->getPost('product_specification'),
            'product_price' => $this->request->getPost('product_price'),
            'product_count' => $this->request->getPost('product_count'),

            'product_image1' => 'uploads/images/product/' . $fileName1,
            'product_image2' => 'uploads/images/product/' . $fileName2,
            'product_image3' => 'uploads/images/product/' . $fileName3,
            'product_image4' => 'uploads/images/product/' . $fileName4,
        );
        if ($data) {
        }


        $this->ProductModel->product_update($id, $data);

        return redirect()->to('products');
    }
    public function product_delete($id)
    {

        helper(['form', 'url']);
        $this->ProductModel = new ProductModel();
        $this->ProductModel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
