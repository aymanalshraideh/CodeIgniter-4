<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-6 mb-2 mt-2">
        <!-- Add Brand Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Category
        </button>

        <!-- Modal Add Brand -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>/categorystore" method="post" id="formadd" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="" name="category_name" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Show Room </label>
                                <input type="text" class="form-control" id="" name="show_room" required>
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea2">Cateory Description </label>
                                <textarea class="form-control" name="category_description" id="" style="height: 100px" required>
                <?= set_value('brand_description') ?>
              </textarea>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Category Image </label>
                                <input type="file" class="form-control" id="" name="category_image" required>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>/categoryedit" method="post" id="formedit" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name" value="" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Show Room </label>
                                <input type="text" class="form-control" name="show_room" id="show_room" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea2">Category Description </label>
                                <textarea class="form-control" name="category_description" id="category_description" required></textarea>


                            </div>
                            <input type="hidden" name="id" id="category_id">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Category Image </label>
                                <input type="file" class="form-control" id="" name="category_image" value="" required>
                                <img src="" id="category_image" alt="nnn" width="100px">
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
                <th>ID</th>
                <th>Category Name</th>
                <th>Category Show Room</th>
                <th>Category Description</th>
                <th>Category Image</th>
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
            url: url = "<?php echo site_url('fetchcategory') ?>",
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






    function edit_category(id) {

        $('#formedit')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('ajax_edit_category/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#category_id').val(data.id);
                $('#category_name').val(data.category_name);
                $('#show_room').val(data.show_room);
                $('#category_description').val(data.category_description);
                // $('#brand_image').val(data.brand_image);
                $('#category_image').attr('src', data.category_image);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Category'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    function delete_category(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo site_url('category_delete') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {

                    fetchdata()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('You Can\'t delete this Category  ');
                }
            });

        }
    }
</script>


<?= $this->endSection() ?>
<?= $this->endSection() ?>