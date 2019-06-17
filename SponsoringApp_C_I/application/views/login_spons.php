<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="icon" href="<?php echo base_url().'logodeg.png'; ?>" />
  <title>SponsoRise</title>
  <style>
      html,body {
  margin:0;
  font-family: Caviar Dreams, Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
  height:100%
}
      .wrapper{
  display: grid;
  grid-template-columns: 50% 50%;
  grid-gap: 0;
  height: 100%;
  width: 100%;
  background-color: rgb(255, 255, 255);
  grid-template-areas:"right left";
  position:absolute;
}
::-webkit-scrollbar {
  width: 5px;
  height: 0px;
  display: none
}

/* Track */
::-webkit-scrollbar-track:hover {
  box-shadow: inset 0 0 5px #B784A7; 
  border-radius: 10px;
  background: transparent;
}
.leftpart{
    background-image: linear-gradient(60deg,rgb(43, 9, 43),rgb(190, 104, 240));
    width:100%;
    height:auto;
    grid-area:left;
    overflow: scroll;
}
.rightpart{
    /*background-color: black;*/
    width:100%;
    height:auto;
    grid-area:right;
    overflow: scroll;
}
.input-field input:focus{
    color:#4a148c !important;
    border-bottom: 1px solid #4a148c !important;
    box-shadow: 0 1px 0 0 #4a148c !important;
}
.input-field label, .input-field i{
    color: #4a148c !important;
}
.btn-sub{
    border: 10px solid transparent;
    padding: 15px;
    border-image: linear-gradient(60deg,rgb(43, 9, 43),rgb(190, 104, 240));
    border-image-slice: 1;
    border-width: 3px;
    border-radius: 5px;
}
.manette{
    display: none;
}
.tabs .indicator{
      background-color: #4a148c ;
}
.tabs .tab a:focus, .tabs .tab a:focus.active{
    background: #e1bee7;
}


.leftpart img, .rightpart .img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 0.5s infinite  alternate;
    animation: mover 0.5s infinite  alternate;
    overflow: scroll;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}



@media screen and (max-width: 799px) {
    
.manette{
    display: block;
}
  .wrapper
  {
    display: block;
    height: 100%;
    width: 100%;
  }
  .wrapper>.leftpart
  {
    height:fit-content;
    width: 100%;
  }
  .wrapper>.rightpart
  {
    height:fit-content;
    width: 100%;
  }
  #signup{
      display: block;
  }
}
@media screen and (max-width: 320px) {
  .wrapper
  {
    display: block;
    height: 100%;
    width: 100%;
  }
  .wrapper>.leftpart
  {
    height:fit-content;
    width: fit-content;
  }
  .wrapper>.rightpart
  {
    height:fit-content;
    width: fit-content;
  }
  #signup{
      display: block;
  }
}
  </style>
</head>
<body>
    <div class="wrapper">
        <div class="leftpart" style="color:white">
            <div class="content">
                    <div class="row" style="text-align:center">
                        <div class="col-md-3 register-left">
                                <img src="https://images.vexels.com/media/users/3/152646/isolated/preview/da1bf3f73dea5bb9a781e7174e6cbbdc-space-shuttle-cartoon-icon-by-vexels.png" alt=""/>
                        </div>
                    </div>
                    <div class="title" style="font-size: 3em;text-align:center;font-weight:bold">Devenir Sponsor</div>
                    <div class="textorg" style="padding-left:10%;padding-right:10%;">
                        <div class="row"><h5><i class="material-icons prefix">event_available</i> Contacter des organisateurs</h5></div>
                        <div class="row"><h5><i class="material-icons prefix">search</i> Découvrir des événements</h5></div>
                        <div class="row"><h5><i class="material-icons prefix">flash_on</i> Sponsoriser des événements</h5></div>
                    </div>
                        <p>
                            <div class="title" style="text-align:center">
                                <span style="text-align:center;margin:auto;color:white;border:2px solid #fff;border-radius:5px;font-size:20px;font-family:caviar dreams;-webkit-background-clip: text;padding: 2%"><i class="material-icons prefix">expand_more</i> DOWNLOAD THE APP</span>
                            </div>
                        </p>
            </div>
        </div>
        <div class="rightpart">
            <div class="container section" id="services">
                <div class="col s12 l6 offset-l2">
                    <ul class="tabs">
                        <li class="tab col s6">
                            <a href="#signup" style="font-size:30px;" class="purple-text text-darken-4">Sign up</a>
                        </li>
                        <li class="tab col s6">
                            <a href="#login" style="font-size:30px;" class="purple-text text-darken-4">Log in</a>
                        </li>
                    </ul>
                    <div class="col s12" id="signup"style="width:100%">
                        <p class="flow-text purple-text text-darken-4">Sign up</p>
                        <form method="POST" action="<?php echo base_url() ; ?>index.php/sponsor/getdata#signup" enctype="multipart/form-data" id="signup">
                            
                            <div class="purple-text text-darken-4">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input id="nomspons" name="nomspons" type="text" class="validate" value="<?php echo $this->session->userdata('nomSpons'); ?>" >
                                    <label for="nomspons">Nom</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_box</i>
                                    <input id="prenomspons" name="prenomspons" type="text" class="validate" value="<?php echo $this->session->userdata('prenomSpons'); ?>" >
                                    <label for="prenomspons">Prénom</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">local_activity</i>
                                    <input id="organismespons" name="organismespons" type="text" class="validate" value="<?php echo $this->session->userdata('organismeSpons'); ?>" required>
                                    <label for="organismespons">Organisme</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">home</i>
                                    <textarea id="adrspons" name="adrspons" class="materialize-textarea validate" value="<?php echo $this->session->userdata('adrSpons'); ?>" ></textarea>
                                    <label for="adrspons">Adresse</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">smartphone</i>
                                    <input id="telspons" type="text" name="telspons" class="validate" value="<?php echo $this->session->userdata('telSpons'); ?>" >
                                    <label for="telspons">Téléphone</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">album</i>
                                    <select name="centre" id="cat">
                                        <option class="purple-text" value="">Sélectionner un centre d'intérêt</option>
                                        <?php
                                        
                                        foreach($cat as $row)
                                        {
                                        ?>><option id="centre" name="centre" value="<?php echo $row->libCateg; ?>"><?php echo $row->libCateg; ?></option>;
                                    <?php }
                                        ?>
                                    </select>
                                    <label for="centre">Centre d'intéret</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="emailspons" name="emailspons" type="email" class="validate" value="<?php echo $this->session->userdata('emailSpons'); ?>" >
                                    <label for="emailspons">Email</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">enhanced_encryption</i>
                                    <input id="passwordspons" name="passwordspons" type="password" class="validate" value="<?php echo $this->session->userdata('passowrdSpons'); ?>" >
                                    <label for="passwordspons">Password</label>
                                </div>
                                
                                <div class="file-field input-field col s6">
                                    <input type="file" name="image_file" multiple required>
                                    <div class="file-path-wrapper">
                                        <i class="material-icons prefix">add_a_photo</i>
                                        <input class="file-path validate" type="text" placeholder="Upload photo">
                                    </div>
                                </div>
                            </div>
                                <div style="text-align: center"><input class="btn-sub" type="submit" style="text-align:center;margin:auto;font-weight:bolder;color:white;background-image: linear-gradient(-60deg,rgb(43, 9, 43),rgb(190, 104, 240));font-size:20px;font-family:caviar dreams;-webkit-background-clip: text;-webkit-text-fill-color: transparent;" value="Se connecter"></div>
                        </form>
                    </div>
                    <div class="col s12" id="login"style="width:100%;">
                        <p class="flow-text purple-text text-darken-4">Log in</p>
                        <form method="POST" action="<?php echo base_url() ; ?>/index.php/welcome/loginspons" id="login">
                            <div class="purple-text text-darken-4">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="emaillog" name="emaillog" type="email" class="validate" required>
                                    <label for="emaillog">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <div id="sous" style="height:fit-content">
                                    </div>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">enhanced_encryption</i>
                                    <input id="passwordlog" name="passwordlog" type="password" class="validate" required>
                                    <label for="passwordlog">Password</label>
                                </div>
                            </div>
                                <div style="text-align: center"><input class="btn-sub" type="submit" style="text-align:center;margin:auto;font-weight:bolder;color:white;background-image: linear-gradient(-60deg,rgb(43, 9, 43),rgb(190, 104, 240));font-size:20px;font-family:caviar dreams;-webkit-background-clip: text;-webkit-text-fill-color: transparent;" value="Se connecter"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row manette" style="text-align: center">
                <p>
                    <div class="col-md-3 register-left">
                        <i class="material-icons prefix large img" style="background-image: linear-gradient(-60deg,rgb(43, 9, 43),rgb(190, 104, 240));-webkit-background-clip: text;-webkit-text-fill-color: transparent;">videogame_asset</i>
                    </div>
                </p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        /*$('.sidenav').sidenav();
        $('.materialboxed').materialbox();
        $('.parallax').parallax();*/
        $('.tabs').tabs();
      });
      console.log("<?php  echo "http://localhost".$_SERVER['REQUEST_URI']; ?>" );
      $(document).ready(function(){
 $('#cat').change(function(){
  var cat = $('#cat').val();
  $.ajax({
    url:"<?php echo base_url(); ?>index.php/welcome/fetch_sous",
    method:"POST",
    data:{cat:cat},
    success:function(data)
    {
     $('#sous').html(data);
     console.log(data);
    }
   });
 });

 
});
$(document).ready(function(){
    $('select').formSelect();
  });
    </script>
</body>
</html>