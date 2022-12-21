<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row">
  <div class="col-md-6 mb-2 mt-2">
    <!-- Add Brand Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Brand
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
            <form action="<?php echo base_url(); ?>/brandstore" method="post" id="formadd" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="" name="brand_name" required>

              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Brand Slogan </label>
                <input type="text" class="form-control" id="" name="brand_slogan" required>
              </div>
              <div class="mb-3">
                <label for="floatingTextarea2">Brand Description </label>
                <textarea class="form-control" name="brand_description" id="" style="height: 100px" required>
                <?= set_value('brand_description') ?>
              </textarea>

              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Brand Image </label>
                <input type="file" class="form-control" id="" name="brand_image" required>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <?php if (isset($validation)) : ?>
            <div class="alert alert-warning">
              <?= $validation->listErrors() ?>
            </div>
          <?php endif; ?>
          <div class="modal-body">
            <form action="<?php echo base_url(); ?>/brandedit" method="post" id="formedit" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                <input type="text" class="form-control"  name="brand_name" id="brand_name" value=" " required> 

              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Brand Slogan </label>
                <input type="text" class="form-control"  name="brand_slogan" id="brand_slogan" value="" required>
              </div>
              <div class="mb-3">
                <label for="floatingTextarea2">Brand Description </label>
                <textarea class="form-control" name="brand_description" id="brand_description" required></textarea>         
             

              </div>
              <input type="hidden" name="id" id="brand_id">
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Brand Image </label>
                <input type="file" class="form-control" id="image" name="brand_image" value="" required>
                <img src="" id="brand_image" alt="nnn" width="100px">
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
        <th>Brand Name</th>
        <th>Brand Slogan</th>
        <th>Brand Description</th>
        <th>Brand Image</th>
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

function fetchdata(){
    $.ajax({
		url:  url = "<?php echo site_url('fetchdata')?>",
		type: "GET",
		cache: false,
		success: function(data){
			// alert(data);
      // console.log(data);
			$('#table').html(data); 
		}
	});
}
fetchdata()



function add_brand()
    {
      $.ajax({
            url : url,
            type: "POST",
            data: $('#formadd').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }



    function edit_brand(id)
    {
      
      $('#formedit')[0].reset(); // reset form on modals
      <?php header('Content-type: application/json'); ?>
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#brand_id').val(data.id);
            $('#brand_name').val(data.brand_name);
            $('#brand_slogan').val(data.brand_slogan);
            $('#brand_description').val(data.brand_description);
            $('#brand_description').val(data.brand_description);
            // $('#brand_image').val(data.brand_image);
            $('#brand_image').attr('src',data.brand_image);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Brand'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            alert('Error get data from ajax');
        }
    });
    }

    function delete_brand(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('brand_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

                fetchdata()
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('You Can\'t delete this Brand ');
            }
        });

      }
    }
  </script>


<?= $this->endSection() ?>
<?= $this->endSection() ?>