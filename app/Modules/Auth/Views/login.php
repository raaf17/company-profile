<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login | Company Profile</title>
  <link href="<?= base_url() ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url() ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b>Welcome Back!</b></h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                  </div>
                  <form action="<?= url_to('login') ?>" method="POST" class="user">
                    <?= csrf_field() ?>
                    <?php if ($config->validFields === ['email']) : ?>
                      <div class="form-group">
                        <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="inputEmail" aria-describedby="emailHelp" name="login" placeholder="<?= lang('Auth.email') ?>">
                        <div class="invalid-feedback">
                          <?= session('errors.login') ?>
                        </div>
                      </div>
                    <?php else : ?>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <div class="invalid-feedback">
                          <?= session('errors.login') ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" id="InputPassword" name="password" placeholder="Password">
                      <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                      </div>
                    </div>
                    <?php if ($config->allowRemembering) : ?>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?> class="form-check-input" id="customCheck">
                          <label class="form-check-label" for="customCheck"><?= lang('Auth.rememberMe') ?></label>
                        </div>
                      </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <?php if ($config->activeResetter) : ?>
                    <div class="text-center">
                      <a class="small" href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>
</body>

</html>