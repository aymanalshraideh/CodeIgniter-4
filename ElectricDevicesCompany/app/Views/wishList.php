<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- <pre>
<?php var_dump($wish) ?></pre> -->
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-12">
                <h5 class="mb-3"><a href="allproduct" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                

                

                <div id="fetch"></div>





              </div>
              <div class="col-lg-5">







                

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->section('script') ?>

<script>

function fetchdata2(){
    $.ajax({
		url:  url = "<?php echo site_url('fetchwish')?>",
		type: "GET",
		cache: false,
		success: function(data){
			// alert(data);
      // console.log(data);
			$('#fetch').html(data); 
		}
	});
}
fetchdata2()
function delete_wish(u,p)
    {
        console.log(u,p)
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('wishdelete')?>/"+u+"/"+p,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

                fetchdata2()
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }
</script>


<?= $this->endSection() ?>
<?= $this->endSection() ?>