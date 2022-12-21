<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>


<section class="py-5">


    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">

                                <div class="text-center p-4"> <img id="main-image" src="/<?php echo $product->product_image1 ?>" width="250" /> </div>
                                <div class="thumbnail text-center">
                                    <img onclick="change_image(this)" src="/<?php echo $product->product_image1 ?>" width="70">
                                    <img onclick="change_image(this)" src="/<?php echo $product->product_image2 ?>" width="70">
                                    <img onclick="change_image(this)" src="/<?php echo $product->product_image3 ?>" width="70">
                                    <img onclick="change_image(this)" src="/<?php echo $product->product_image2 ?>" width="70">
                                    <img onclick="change_image(this)" src="/<?php echo $product->product_image4 ?>" width="70">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i><a href="/"> <span class="ml-1">Back</span></a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Model:<?php  echo $product->product_model?></span>
                                    <h5 class="text-uppercase"><?php  echo $product->product_name?></h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">$<?php  echo $product->product_price?></span>
                                        
                                    </div>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php  echo $product->product_color?></span>
                                        
                                    </div>
                                </div>
                                <p class="about"><?php  echo $product->product_specification?></p>
                               
                                <?php if(session()->get('isLoggedIn')==true){   ?>
            <div class="text-center">
                <a class="btn btn-outline-dark mt-auto" onclick="wishadd( <?php echo session()->get('id') ?>,<?php echo $product->product_id ?> ,<?php echo $product->category_id ?>,<?php echo $product->brand_id ?>)" href="#">Add to wish list <i class="bi bi-heart"></i></a></div>
        <?php }else{?>
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/signin">Login for Add to wish list <i class="bi bi-heart"></i></a></div>
            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>