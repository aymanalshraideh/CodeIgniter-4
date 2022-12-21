<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Controllers\BaseController;

class CategoriesController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        $data['page_title'] = 'Categories';
        echo view('admin/categories', $data);
        // 
        // return view('admin/brands', $data);
    }
    public function  category_add()
    {

        helper(['form', 'url']);
        $this->CategoryModel = new CategoryModel();
        $file = $this->request->getFile('category_image');
        $fileName = $file->getRandomName();
        $data = array(
            'category_name' => $this->request->getPost('category_name'),
            'show_room' => $this->request->getPost('show_room'),
            'category_description' => $this->request->getPost('category_description'),
            'category_image' => 'uploads/images/category/' . $fileName,
        );
        $file->move('uploads/images/category', $fileName);
        $insert = $this->CategoryModel->category_add($data);
        return redirect()->to('categories');
    }
    public function fetch()
    {

        $this->CategoryModel = new CategoryModel();
        $categories = $this->CategoryModel->get_all_categories();
        foreach ($categories as $category) {
            echo '
                <tr>
                    <td>' . $category->id . '</td>
                    <td>' . $category->category_name . '</td>
                            <td>' . $category->show_room . '</td>
                           <td>' . $category->category_description . '</td>
                           <td><img src="' . $category->category_image . '" alt="image" width="100px" height="50px"></td>
                           
                           <td>
                               <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editModal" onclick="edit_category(' . $category->id . ')">Edit</button>
                               <button class="btn btn-danger"  onclick="delete_category(' . $category->id . ')">Delete</button>
    
                           </td>
                 </tr>
                ';
        }
    }

    public function ajax_edit($id)
    {

        $this->CategoryModel = new CategoryModel();

        $data = $this->CategoryModel->get_by_id($id);

        echo json_encode($data);
    }

    public function category_update()
    {

        helper(['form', 'url']);
        $file = $this->request->getFile('brand_image');
        $fileName = $file->getRandomName();
        $this->CategoryModel = new CategoryModel();
        $data = array(
            'brand_name' => $this->request->getPost('brand_name'),
            'brand_slogan' => $this->request->getPost('brand_slogan'),
            'brand_description' => $this->request->getPost('brand_description'),
            'brand_image' => 'uploads/images/' . $fileName,
        );
        $id = $this->request->getPost('id');

        $this->CategoryModel->category_update($id, $data);
        $file->move('uploads/images', $fileName);
        return redirect()->to('categories');
    }
    public function category_delete($id)
    {

        helper(['form', 'url']);
        $this->CategoryModel = new CategoryModel();
        $this->CategoryModel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
