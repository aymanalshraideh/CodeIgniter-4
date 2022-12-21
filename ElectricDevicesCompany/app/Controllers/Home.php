<?php

namespace App\Controllers;

use App\Models\WishModel;
use App\Models\BrandModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $search;

    public function indexAdmin()
    {
        helper(['form']);
        $data = [];
        $data['page_title'] = 'Dashboard';
        return view('admin/home', $data);
    }


    public function index()
    {
        $this->BrandModel = new BrandModel();
        $brands = $this->BrandModel->get_all_brands();
        $data['brands'] = $brands;


        $this->ProductModel = new ProductModel();
        $products = $this->ProductModel->get_all_products();
        $data['products'] = $products;





        return view('home', $data);
    }
    public function single($id)
    {
        $this->ProductModel = new ProductModel();

        $data['product'] = $this->ProductModel->get_by_id($id);
        return view('singleProduct', $data);
    }
    public function fetch()
    {
        global  $search;
        $this->ProductModel = new ProductModel();

        if ($search) {


            $products = $this->ProductModel->search($search);
        } else {
            $products = $this->ProductModel->get_all_products();
        }

        foreach ($products as $product) : ?>

            <div class="col mb-5">
                <div class="card h-100">

                    <a href="singleProduct/<?php echo $product->product_id ?>">
                        <img class="card-img-top" src="<?php echo $product->product_image1 ?>" alt="..." /></a>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder"><?php echo $product->product_name ?></h5>
                            $<?php echo $product->product_price ?>
                        </div>
                        <div class="text-center"><?php echo $product->brand_name ?>/<?php echo $product->category_name ?></div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <?php if (session()->get('isLoggedIn') == true) {   ?>
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" onclick="wishadd( <?php echo session()->get('id') ?>,<?php echo $product->product_id ?> ,<?php echo $product->category_id ?>,<?php echo $product->brand_id ?>)" href="#">Add to wish list <i class="bi bi-heart"></i></a></div>
                        <?php } else { ?>
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/signin">Login for Add to wish list <i class="bi bi-heart"></i></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>


<?php endforeach;
    }


    public function allProduct()
    {

        $this->ProductModel = new ProductModel();
        // $this->WishModel = new WishModel();
        // $wish= $this->WishModel->allwish();
        if ($this->request->getGet('search')) {

            $search = $this->request->getGet('search');
            $products = $this->ProductModel->search($search);
        } else {
            $products = $this->ProductModel->get_all_products();
        }

        $data['products'] = $products;
        // $data['wish'] = $wish;
        return view('allproduct', $data);
    }
    public function allBrands()
    {
        $this->BrandModel = new BrandModel();
        $brands = $this->BrandModel->get_all_brands();
        $data['brands'] = $brands;
        $this->ProductModel = new ProductModel();
        if ($this->request->getGet('tag')) {

            $id = $this->request->getGet('tag');
            $products = $this->ProductModel->tag($id);
        } else {
            $products = $this->ProductModel->get_all_products();
        }

        $data['products'] = $products;
        return view('allbrands',$data);
    }
}
