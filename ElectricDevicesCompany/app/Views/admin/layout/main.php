
 <?= $this->include('admin/layout/header') ?>


<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('admin/components/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            
            <!-- End of Topbar -->


            <?= $this->include('admin/components/nav') ?>



            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?php echo $page_title ?></h1>
                   
                </div>

                <!-- Content Row -->
               

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    

                    <!-- Pie Chart -->
                    
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                   

                    <?= $this->renderSection('content') ?>

                    
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

       

<?= $this->include('admin/layout/footer') ?>