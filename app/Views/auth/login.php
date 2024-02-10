<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Sistema</title>
  <meta name="keywords" content="" />
  <meta name="description" content="">
  <meta name="author" content="Pet Attend">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#8320f9">


  <!-- Font CSS (Via CDN) -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/css/theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/css/admin-forms.css">

  <!-- Favicon -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body class="external-page external-alt sb-l-c sb-r-c">

  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Begin: Content -->
      <section id="content">

        <div class="admin-form theme-info mw500">

          <!-- Login Panel/Form -->
          <div class="panel mt30 mb25">

            <?php echo form_open("auth/login"); ?>
            <div class="panel-body bg-light p25 pb15">

              <!-- Divider -->
              <div class="section-divider mv30">
                <span>INSIRA SEUS DADOS PARA ACESSAR</span>
              </div>
              <?php if ($message) { ?>
                <div class="section">
                  <div class="alert alert-danger" id="infoMessage"><?php echo $message; ?></div>
                </div>
              <?php } ?>

              <!-- Username Input -->
              <div class="section">
                <label for="identity" class="field-label text-muted fs18 mb10">E-mail</label>
                <label for="identity" class="field prepend-icon">
                  <input type="text" name="identity" id="identity" class="gui-input" value="<?php echo set_value('identity') ?>" placeholder="Insira seu e-mail">
                  <label for="identity" class="field-icon">
                    <i class="fa fa-envelope-o"></i>
                  </label>
                </label>
              </div>

              <!-- Password Input -->
              <div class="section">
                <label for="password" class="field-label text-muted fs18 mb10">Senha</label>
                <label for="password" class="field prepend-icon">
                  <input type="password" name="password" id="password" class="gui-input" value="<?php echo set_value('password') ?>" placeholder="Insira sua senha">
                  <label for="password" class="field-icon">
                    <i class="fa fa-lock"></i>
                  </label>
                </label>
              </div>
            </div>

            <div class="panel-footer clearfix">
              <button type="submit" class="button btn-primary mr10 pull-right">Acessar</button>
              <label class="switch ib switch-primary mt10">
                <input type="checkbox" name="remember" id="remember" checked>
                <label for="remember" data-on="SIM" data-off="NÃO"></label>
                <span>Ficar conectado</span>
              </label>
            </div>

            <?php echo form_close(); ?>
          </div>

          <!-- Registration Links -->


          <!-- <div class="login-links">
            <p class="">
              <a href="#" id="limpar-cache" class="btn btn-alert" style="color: #eee" title="Sign In">Limpar cache</a>
            </p>
          </div> -->

        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->


  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/jquery-ui/jquery-ui.min.js"></script>


</body>

</html>