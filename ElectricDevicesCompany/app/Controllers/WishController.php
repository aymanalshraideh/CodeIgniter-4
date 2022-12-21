<?php

namespace App\Controllers;

use App\Models\WishModel;
use App\Controllers\BaseController;

class WishController extends BaseController
{
    public function index(){
        $this->WishModel = new WishModel();
        $wish= $this->WishModel->allwish();
        $data['wish'] = $wish;

        return view('wishList',$data);
    }
    public function  wishadd($u,$p,$c,$b)
    {

        
        $this->WishModel = new WishModel();

       
        $data = array(
            'user_id' => $u,
            'product_idd' => $p,
            'category_idd'=>$c,
            'brand_idd'=>$b
       
        );

         $this->WishModel->wish_add($data);
         echo json_encode(array("status" => TRUE));
    }
    public function wishfetch()
    {
        $this->WishModel = new WishModel();
        $wish= $this->WishModel->allwish();
        
        ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping Wish List</p>
                    <p class="mb-0">You have <?php echo count($wish) ?> items in your cart</p>
                  </div>
                  
                </div>
        <?php
        if($wish){
        foreach($wish as $w): ?> 

            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="d-flex flex-row align-items-center">
                    <div>
                        <a href="singleProduct/<?php echo $w->product_id ?>">
                      <img
                        src="/<?php echo $w->product_image1 ?>"
                        class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;"></a>
                    </div>
                    <div class="ms-3">
                      <h5><?php echo $w->product_name ?></h5>
                      <p class="small mb-0"><?php echo $w->product_color ?></p>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center">
                    <div style="width: 50px;">
                      <h5 class="fw-normal mb-0">1</h5>
                    </div>
                    <div style="width: 80px;">
                      <h5 class="mb-0">$<?php echo $w->product_price ?></h5>
                      
                    </div> <button type="button" onclick="delete_wish(<?php echo $w->user_id ?>,<?php echo $w->product_idd ?>)" class="btn btn-danger">X</button>
                    <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </div>
              </div>
            </div>

           <?php endforeach ;
    }else{
        ?>
        <div class="card mb-3">
              <div class="card-body">
        <h4> You Dont Have item in Wish List</h4>
              </div></div>
        <?php 
    }

}
    public function wish_delete($u,$p)
    {

        helper(['form', 'url']);
        $this->WishModel = new WishModel();
        $this->WishModel->delete_by_id($u,$p);
        echo json_encode(array("status" => TRUE));
    }
}
