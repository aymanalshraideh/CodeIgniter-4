<?php

namespace App\Controllers;

use App\Models\BrandModel;
use App\Controllers\BaseController;

class BrandsController extends BaseController
{
    
    public function admin()
    {
        helper(['form']);
        $data = [];
        $data['page_title'] = 'Dashboard';
        return view('admin/home', $data);
    }
    public function index()
    {
        helper(['form']);
        $data = [];
        $data['page_title'] = 'Brands';
        echo view('admin/brands', $data);
        // 
        // return view('admin/brands', $data);
    }

    public function brand_add()
    {

        helper(['form', 'url']);
        $this->BrandModel = new BrandModel();
        $file = $this->request->getFile('brand_image');
        $fileName = $file->getRandomName();
        $data = array(
            'brand_name' => $this->request->getPost('brand_name'),
            'brand_slogan' => $this->request->getPost('brand_slogan'),
            'brand_description' => $this->request->getPost('brand_description'),
            'brand_image' => 'uploads/images/' . $fileName,
        );
        $file->move('uploads/images', $fileName);
        $insert = $this->BrandModel->brand_add($data);
        return redirect()->to('brands');
    }
    public function fetch()
    {

        $this->BrandModel = new BrandModel();
        $brands = $this->BrandModel->get_all_brands();
        foreach ($brands as $brand) {
            echo '
                <tr>
                    <td>' . $brand->id . '</td>
                    <td>' . $brand->brand_name . '</td>
                            <td>' . $brand->brand_slogan . '</td>
                           <td>' . $brand->brand_description . '</td>
                           <td><img src="' . $brand->brand_image . '" alt="image" width="100px" height="50px"></td>
                           
                           <td>
                               <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editModal" onclick="edit_brand(' . $brand->id . ')">Edit</button>
                               <button class="btn btn-danger"  onclick="delete_brand(' . $brand->id . ')">Delete</button>
    
                           </td>
                 </tr>
                ';
        }
    }

    public function ajax_edit($id)
    {

        $this->BrandModel = new BrandModel();

        $data = $this->BrandModel->get_by_id($id);

        echo json_encode($data);
    }

    public function brand_update()
    {

        helper(['form', 'url']);
        $file = $this->request->getFile('brand_image');
        $fileName = $file->getRandomName();
        $this->BrandModel = new BrandModel();
        $data = array(
            'brand_name' => $this->request->getPost('brand_name'),
            'brand_slogan' => $this->request->getPost('brand_slogan'),
            'brand_description' => $this->request->getPost('brand_description'),
            'brand_image' => 'uploads/images/' . $fileName,
        );
        $id = $this->request->getPost('id');

        $this->BrandModel->brand_update($id, $data);
        $file->move('uploads/images', $fileName);
        return redirect()->to('brands');
    }
    public function brand_delete($id)
    {

        helper(['form', 'url']);
        $this->BrandModel = new BrandModel();
        $this->BrandModel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
