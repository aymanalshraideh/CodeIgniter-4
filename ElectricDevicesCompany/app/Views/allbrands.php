<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

  <!-- Section-->
  <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-6 p-5 bg-light border  justify-content-center">
            <div class="bg-light  m-1"><a class=" align-items-center nav-link" href="<?php echo current_url()?>?tag="><h1>ALL</h1></a></div>
            <?php foreach($brands as $brand): ?>  
            <div class="bg-light  m-1"><a class="" href="<?php echo current_url()?>?tag=<?php echo $brand->id ?>"><img src="<?php echo $brand->brand_image ?>" alt="" width="100px" style="border-radius: 50%;"></a></div>
              <?php endforeach; ?>
            </div> 
            <div class="row gx-4 gx-lg-5 row-cols-6 p-5 bg-light border  justify-content-center"><h1>Product</h1></div> 
                <div  class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    

              <?php  foreach($products as $product) : ?>

<div class="col mb-5">
    <div class="card h-100">
      
      <a href="singleProduct/<?php echo $product->product_id ?>"> 
      <img class="card-img-top " src="<?php echo $product->product_image1 ?>" alt="..." /></a> 
        <div class="card-body p-4">
            <div class="text-center">
                <h5 class="fw-bolder"><?php echo $product->product_name ?></h5>
                $<?php echo $product->product_price ?>    
            </div>
            <div class="text-center"><?php echo $product->brand_name ?>/<?php echo $product->category_name ?></div>
        </div>
         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
  
            <?php if(session()->get('isLoggedIn')==true){   ?>
            <div class="text-center">
                <a class="btn btn-outline-dark mt-auto" onclick="wishadd( <?php echo session()->get('id') ?>,<?php echo $product->product_id ?> )" href="#">Add to wish list <i class="bi bi-heart"></i></a></div>
        <?php }else{?>
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/signin">Login for Add to wish list <i class="bi bi-heart"></i></a></div>
            <?php } ?>
        </div>
    </div>
</div>


<?php endforeach; ?>






              
                
                </div>
            </div>
        </section>


<?= $this->endSection() ?>