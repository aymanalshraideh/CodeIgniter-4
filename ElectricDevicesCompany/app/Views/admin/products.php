<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-6 mb-2 mt-2">
        <!-- Add Brand Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Product
        </button>

        <!-- Modal Add Brand -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>/productstore" method="post" id="formadd" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="" name="product_name" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Model </label>
                                <input type="text" class="form-control" id="" name="product_model" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Color </label>
                                <input type="text" class="form-control" id="" name="product_color" required>
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea2">Product Specification </label>
                                <textarea class="form-control" name="product_specification" id="" style="height: 100px" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Count </label>
                                <input type="number" class="form-control" id="" name="product_count" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Price </label>
                                <input type="text" class="form-control" id="" name="product_price" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Brand </label>
                                <select class="form-select" aria-label="Default select example" name="brand_id" required>
                                    <option value="">None</option>
                                    <?php foreach ($brands as $brand) : ?>
                                        <option value="<?php echo $brand->id ?>"><?php echo $brand->brand_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Category</label>
                                <select class="form-select" aria-label="Default select example" name="category_id" required>
                                    <option value="">None</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option>
                                    <?php endforeach; ?>


                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 1 </label>
                                <input type="file" class="form-control" id="" name="product_image1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 2 </label>
                                <input type="file" class="form-control" id="" name="product_image2" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 3 </label>
                                <input type="file" class="form-control" id="" name="product_image3" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 4 </label>
                                <input type="file" class="form-control" id="" name="product_image4" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Brand -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>/productedit" method="post" id="formedit" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Model </label>
                                <input type="text" class="form-control" id="product_model" name="product_model" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Color </label>
                                <input type="text" class="form-control" id="product_color" name="product_color" required>
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea2">Product Specification </label>
                                <textarea class="form-control" name="product_specification" id="product_specification" style="height: 100px" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Price </label>
                                <input type="text" class="form-control" id="product_price" name="product_price" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Count </label>
                                <input type="text" class="form-control" id="product_count" name="product_count" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Brand </label>
                                <select class="form-select" aria-label="Default select example" required>
                                    <option value="">None</option>
                                    <?php foreach ($brands as $brand) : ?>
                                        <option value="1"><?php echo $brand->brand_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> -->
                            <!-- <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Category</label>
                                <select class="form-select" aria-label="Default select example" required>
                                    <option value="">None</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="1"><?php echo $category->category_name ?></option>
                                    <?php endforeach; ?>


                                </select>
                            </div> -->

                            <input type="hidden" name="product_id" id="product_id">
                            <input type="hidden" name="category_id" id="category_id">
                            <input type="hidden" name="brand_id" id="brand_id">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 1 </label>
                                <input type="file" class="form-control" id="" name="product_image1" required>
                                <img src="" alt="" width="100px" id="product_image1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 2 </label>
                                <input type="file" class="form-control" id="" name="product_image2" required>
                                <img src="" alt="" width="100px" id="product_image2">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 3 </label>
                                <input type="file" class="form-control" id="" name="product_image3" required >
                                <img src="" alt="" width="100px" id="product_image3">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Product Image 4 </label>
                                <input type="file" class="form-control" id="" name="product_image4" required>
                                <img src="" alt="" width="100px" id="product_image4">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">

            <tr>
                
                <th>Product Name</th>
                <th>Product Model</th>
                <th>Product Color</th>
              
                <th>Product Specification</th>
                
                <th>Product Price</th>
                <th>Product Count</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Image 1</th>
                <th>Image 2</th>
                <th>Image 3</th>
                <th>Image 4</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider" id="table">

        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>

<?= $this->section('script') ?>

<script>
    function fetchdata() {
        $.ajax({
            url: url = "<?php echo site_url('fetchproducts') ?>",
            type: "GET",
            cache: false,
            success: function(data) {
                // alert(data);
                // console.log(data);
                $('#table').html(data);
            }
        });
    }
    fetchdata()






    function edit_product(id) {
console.log(id)
        $('#formedit')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('ajax_edit_product/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#product_id').val(data.product_id);
                $('#product_name').val(data.product_name);
                $('#product_model').val(data.product_model);
                $('#product_color').val(data.product_color);
                $('#product_price').val(data.product_price);
                $('#product_specification').val(data.product_specification);
                $('#product_count').val(data.product_count);
                $('#category_id').val(data.category_id);
                $('#brand_id').val(data.brand_id);
              
                // $('#brand_image').val(data.brand_image);
                // $('[name="product_image1"]').val(data.product_image1);
                // $('[name="product_image2"]').val(data.product_image2);
                // $('[name="product_image3"]').val(data.product_image3);
                // $('[name="product_image4"]').val(data.product_image4);

                $('#product_image1').attr('src', data.product_image1);
                $('#product_image2').attr('src', data.product_image2);
                $('#product_image3').attr('src', data.product_image3);
                $('#product_image4').attr('src', data.product_image4);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Product'); // Set title to Bootstrap modal title

            }
          
            ,
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    function product_delete(id) {
      
        console.log(id);
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo site_url('product_delete') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {

                    fetchdata()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }
</script>


<?= $this->endSection() ?>
<?= $this->endSection() ?>