<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SponsoRise-Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>
<style>
</style>
<body class="bg-gradient-primary" style="background-image: linear-gradient(90deg,rgb(43, 9, 43),#9c27b0);">

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block" style="text-align:center;top:50"><img src="<?php echo base_url().'logodeg.png' ; ?>" style="width:auto;height:auto;"/></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                <form class="user" method="POST" action="<?php echo base_url() ; ?>/index.php/welcome/valideradmin">
                  <div class="form-group">
                    <input type="text" name="loginadmin" class="form-control form-control-user" id="login">
                    <span style="color:#036;font-size:20px;"><?php echo form_error('loginadmin'); ?></span>
                  </div>
                  <div class="form-group">
                    <input type="password" name="pdadmin" class="form-control form-control-user" id="pdadmin">
                    <span style="color:#036;font-size:20px;"><?php echo form_error('pdadmin'); ?></span>
                  </div>
                  <div class="sub"><input type="submit" value="LOGIN" class="btn btn-user btn-block" style='background-color:#9c27b0;color:#fff'></div>
                  <?php
                    echo $this->session->flashdata('error');
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>


<?php 
/*
<form method="POST" action="<?php echo base_url() ; ?>/index.php/welcome/valideradmin">
    <label for="loginadmin">Login</label>
    <input type="text" name="loginadmin" id="loginadmin" style="height: 30px; text-align:center"></br>
    <span style="color:red;font-size:20px;"><?php echo form_error('loginadmin'); ?></span>
    <label for="pdadmin">Password</label>
    <input type="password" id="pdadmin" name="pdadmin" style="height: 30px; text-align:center"><br>
    <span style="color:red;font-size:20px;"><?php echo form_error('pdadmin'); ?></span>
    <br>
    <div class="sub"><input type="submit" value="CONNEXION" style="height: 40px; width:100px; text-align:center"></div>
    <?php
    echo $this->session->flashdata('error');
    ?>
</form>*/
?>