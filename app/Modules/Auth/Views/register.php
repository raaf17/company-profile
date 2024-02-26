<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register | Company Profile</title>

  <link href="<?= base_url() ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url() ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b>Create your Account!</b></h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                  </div>
                  <form action="<?= url_to('register') ?>" method="POST" class="user">
                    <?= csrf_field() ?>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="nputEmail" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                      <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </div>
                    <div class="form-group">
                      <input type="username" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="InputEmail" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="InputPassword" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                      </div>
                      <div class="col-sm-6">
                        <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="RepeatPassword" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      <?= lang('Auth.register') ?>
                    </button>
                  </form>
                  <hr>
                  <div class="text-center small">
                    <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                  </div>
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