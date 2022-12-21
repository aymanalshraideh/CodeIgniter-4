<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <!-- <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-warning">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Register User</h2>
                                <p class="text-white-50 mb-5">Please enter your Information!</p>
                                <?php if (isset($validation)) : ?>
                                    <div class="alert alert-warning">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                <?php endif; ?>
                                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailXx">Name</label>

                                        <input type="text" id="typeEmailXx" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control form-control-lg">

                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Email</label>
                                        <input type="email" id="typeEmailX" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control form-control-lg">

                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Password</label>
                                        <input type="password" name="password" placeholder="Password" id="typePasswordX" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordXc">Confirm Password</label>


                                        <input type="password" name="confirmpassword" placeholder="Confirm Password" id="typePasswordXc" class="form-control form-control-lg" />
                                    </div>



                                    <button type="submit" class="btn btn-outline-light btn-lg px-5">Signup</button>

                                </form>


                            </div>

                            <div>
                                <p class="mb-0">have an account? <a href="/signin" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection() ?>