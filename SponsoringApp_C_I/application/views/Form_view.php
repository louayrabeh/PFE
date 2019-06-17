<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FUNDER</title>


  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets_sponsor/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="<?php echo base_url('assets_sponsor/css/freelancer.min.css');?>" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url('assets_sponsor/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="<?php echo base_url('assets_sponsor/vendor/magnific-popup/magnific-popup.css');?>" rel="stylesheet" type="text/css">

  

</head>

<body id="page-top" style="font-family:caviar dreams">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top text-uppercase" style="background-color:#2c3e50" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">FUNDER</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#inscription_sp">Inscription Sponsor</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      <img class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url('assets_sponsor/img/profile.png');?>" alt="">
      <h1 class="text-uppercase mb-0">FUNDER</h1>
      <hr class="star-light">
      <h2 class="font-weight-light mb-0">Web Developer - Graphic Artist - User Experience Designer</h2>
    </div>
  </header>
  <section class="bg-primary text-white mb-0" id="about">
    <div class="container">
      <h2 class="text-center text-uppercase text-white">About</h2>
      <hr class="star-light mb-5">
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae laboriosam excepturi, sed veritatis quod eos sit rerum est! Beatae facilis voluptas reiciendis non unde ducimus alias vero ratione at. Enim.</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, dolore id? Maxime ullam eaque exercitationem, similique temporibus nisi a nesciunt aperiam perspiciatis sit ipsam doloribus eligendi quisquam, accusantium minima! Laborum.</p>
        </div>
      </div>
      <div class="text-center mt-4">
        <button class="btn btn-xl btn-outline-light" href="#">
          <i class="fas fa-download mr-2"></i>
          Download App <br> NOW !
</button>
      </div><br>
    </div>
  </section>
  <section id="inscription_sp">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">Inscription <?php // echo $this->input->get_cookie('nom'); ?></h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-lg-8 mx-auto">
        <form method="post" id="upload_form" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/welcome/getdata/#inscription_sp">  
           <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Nom
                <input class="form-control" name="nom" id="nom" type="text" placeholder="Nom" value="<?php echo $this->session->userdata('nomSpons'); ?>">
                <?php echo "<span style=\"color:red;font-size:20px;\">".form_error('nom')."</span></br>"; ?>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Prénom
                <input class="form-control" id="prenom" name="prenom" type="text" placeholder="Prénom" value="<?php echo $this->session->userdata('prenomSpons'); ?>">
                <?php echo "<span style=\"color:red;font-size:20px;\">".form_error('prenom')."</span></br>"; ?>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Organisme
                <input class="form-control" id="organisme" name="organisme" type="text" placeholder="Organisme" value="<?php echo $this->session->userdata('organismeSpons'); ?>">
                <?php echo "<span style=\"color:red;font-size:20px;\">".form_error('org')."</span></br>"; ?>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Téléphone
                <input class="form-control" id="tel" name="tel" type="text" placeholder="Téléphone" value="<?php echo $this->session->userdata('telSpons'); ?>">
                <?php echo "<span style=\"color:red;font-size:20px;\">".form_error('tel')."</span></br>"; ?>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Adresse
                <input type="textarea" class="form-control" id="adr" name="adr" rows="3" placeholder="Adresse" value="<?php echo $this->session->userdata('adrSpons'); ?>">
                <?php echo "<span style=\"color:red;font-size:20px;\">".form_error('adr')."</span></br>"; ?>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Email
                <input class="form-control" id="email" name="email" type="email" placeholder="Email@example.ex" value="<?php echo $this->session->userdata('emailSpons'); ?>">
                <?php echo "<span style=\"color:red;font-size:20px;\">".form_error('email')."</span></br>"; ?>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Mot de passe
                <input class="form-control" id="mdp" name="mdp" type="password" placeholder="***********" value="<?php echo $this->session->userdata('emailSpons'); ?>">
                <?php echo "<span style=\"color:red;font-size:20px;\">".form_error('mdp')."</span></br>"; ?>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                Centre d'intéret
                <select class="form-control" name="centre" id="centre" value="<?php echo $this->session->userdata('mdpSpons'); ?>">
                  <option value="GameDev" >GameDev</option>
                  <option value="Sports">Sports</option>
                  <option value="Musiques">Musiques</option>
                  <option value="Cinéma">Cinéma</option>
                  <option value="Gaming">Gaming</option>
                </select>
              </div>
            </div>
            Le fichier image<br><br>
                <input type="file" name="image_file" id="image_file" />  
                <br />  
                <br />  
                <input type="submit" name="upload" id="upload" value="Envoyer" class="btn btn-info" />  
           </form>
        </div>
      </div>
    </div>
  </section>


  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets_sponsor/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets_sponsor/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url('assets_sponsor/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
  <script src="<?php echo base_url('assets_sponsor/vendor/magnific-popup/jquery.magnific-popup.min.js');?>"></script>

  <!-- Contact Form JavaScript -->
  <script src="<?php echo base_url('assets_sponsor/js/jqBootstrapValidation.js');?>"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url('assets_sponsor/js/freelancer.min.js');?>"></script>

</body>
<script>
    $(document).ready(function(){
    $("#ajouterbutt").click(function(){
        var nom=$("#nom").val();
        var prenom=$("#prenom").val();
        var org=$("#organisme").val();
        var adr=$("#adr").val();
        var tel=$("#tel").val();
        var email=$("#email").val();
        var centre=$("#centre").val();
        $.ajax({
          url:'<?php echo base_url(); ?>index.php/welcome/getdata',
          method:'POST',
          data:{nom:nom, prenom:prenom, org:org, adr:adr, tel:tel, email:email, centre:centre},
          success:function(){
            $('#inscriptionForm')[0].reset();
            $("#nom").val("<?php echo $this->session->userdata('nomSpons'); ?>");
            $("#prenom").val("<?php echo $this->session->userdata('prenomSpons'); ?>");
            $("#organisme").val("<?php echo $this->session->userdata('organismeSpons'); ?>");
            $("#adr").val("<?php echo $this->session->userdata('adrSpons'); ?>");
            $("#tel").val("<?php echo $this->session->userdata('telSpons'); ?>");
            $("#email").val("<?php echo $this->session->userdata('emailSpons'); ?>");
            $("#centre").val("<?php echo $this->session->userdata('mdpSpons'); ?>");
          }
        });
    });
  });
</script>
</html>