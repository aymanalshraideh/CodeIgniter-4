<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                <?php if (session()->getFlashdata('msg')) : ?>
                  <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                  </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                  <div class="form-outline form-white mb-4">

                    <input type="email" id="typeEmailX" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control form-control-lg">
                    <label class="form-label" for="typeEmailX">Email</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" name="password" placeholder="Password" class="form-control form-control-lg">
                    <label class="form-label" for="typePasswordX">Password</label>
                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                  <button type="submit" class="btn btn-outline-light btn-lg px-5">Signin</button>
                </form>


              </div>

              <div>
                <p class="mb-0">Don't have an account? <a href="/signup" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?= $this->endSection() ?>