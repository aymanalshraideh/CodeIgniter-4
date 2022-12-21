 <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <?= $this->renderSection('script') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>function change_image(image){

var container = document.getElementById("main-image");

container.src = image.src;
}



document.addEventListener("DOMContentLoaded", function(event) {







});</script>
<script>
    console.log('hkja')
    function fetchdata() {
        $.ajax({
            url: url = "<?php echo site_url('fetchhome') ?>",
            type: "GET",
            cache: false,
            success: function(data) {
                // alert(data);
                // console.log(data);
                $('#data').html(data);
            }
        });
    }
    fetchdata()
    function wishadd(u,p,c,b){
        console.log(u,p,c,b)
        $.ajax({
          
                url: "<?php echo site_url('addwish') ?>/" + u + "/"+p+"/"+c+"/"+b
                ,
                type: "POST",
                dataType: "JSON",
                success: function(data) {

                    // fetchdata()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
    }
    </script>
    <script>
        
    </script>
    </body>
</html>