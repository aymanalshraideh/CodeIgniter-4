<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

    
</style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Electric Devices</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link  <?= (current_url()==base_url('/'))?'active':'' ?>" aria-current="page" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?= (current_url()==base_url('/allbrands'))?'active':'' ?>" href="/allbrands">Brands</a></li>
                    <li class="nav-item"><a class="nav-link <?= (current_url()==base_url('/allproduct'))?'active':'' ?>" href="/allproduct">Products</a></li>

                </ul>
                
<?php if (current_url()==base_url('/allproduct')) {?>

    <form action="" method="get" class="form-control">
                    <div class="input-group ">
                        <input type="text" class="form-control" name="search" placeholder="Search ....">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
<?php
} ?>
                <a class="btn btn-outline-dark  form-control w-25" href="wishlist">
                    <i class="bi bi-heart"></i> Wish List


                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <?php if(session()->get('isLoggedIn')==true){   ?>
                    <li class="nav-item"><a class="nav-link" href="/logout">Signout</a></li>
                    <?php }elseif(session()->get('isAdmin')==true){ 

                        ?>
                        <li class="nav-item"><a class="nav-link" href="/Dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logout">Signout</a></li>
                        <?php
                    }else{?>
                        <li class="nav-item"><a class="nav-link" href="/signin">Signin</a></li>
                        <li class="nav-item"><a class="nav-link" href="/signup">Signup</a></li>
                        <?php } ?>
                      

                </ul>
            </div>
        </div>
    </nav>