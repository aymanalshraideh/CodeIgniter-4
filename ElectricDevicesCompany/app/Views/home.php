<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- <pre>
<?php var_dump($products)?>
</pre> -->


<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <img src="./assets/2022-11-28-083312m5wy8FdspKJZEiUk.jpeg" alt="" width="100%">
            </div>
        </header>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-6 p-5 bg-light border  justify-content-center"><h1>Brands</h1></div> 
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                
                
                <?php foreach($brands as $brand): ?>
                
                <div class="col mt-5 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo $brand->brand_image ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body ">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $brand->brand_name ?></h5>
                                  
                                </div>
                            </div>
                            <!-- Product actions-->
                            <!-- <div class="card-footer   border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div> -->
                        </div>
                    </div>
                    
                    
                    <?php endforeach ?> 
                    
                   
                    
                    
                </div>
            </div>
        </section>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-6 p-5 bg-light border  justify-content-center"><h1>Products</h1></div> 
                <div id="data" class="row gx-4 gx-lg-5 mt-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    








              
                
                </div>
            </div>
        </section>


        <?= $this->section('script') ?>


    <?= $this->endSection() ?>
<?= $this->endSection() ?>