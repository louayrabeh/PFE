<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo base_url().'logodeg.png'; ?>" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>SponsoRise</title>
  <style>
      html,body {
  margin:0;
  font-family: Caviar Dreams, Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
  width:100%;
  height:100%;
  background-image: linear-gradient(60deg,#6b1288,rgb(190, 104, 240));
  background-repeat: no-repeat;
  background-size: 100%;
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
.wrapper{
    display: grid;
    grid-template-columns: 100% 100%;
    grid-template-rows: 10% 80%;
    grid-gap: 1%;
    height: 100%;
    width: 100%;
    grid-template-areas:"header"
                        "container";
}
.spinner-layer{
    border-color:purple;
}
.container{
    display: grid;
    grid-template-columns: 19.5% 79.5%;
    grid-template-rows: 100%;
    grid-gap: 1%;
    margin-left:5%;
    margin-right:5%;
    height: 100%;
    width: 90%;
    grid-template-areas:"side main";
    grid-area: container;
}
.header{
    position:sticky;
    margin: 0;
    height:100%;
    width: 100%;
    grid-area: header;
    overflow: auto;
}
.side{
    height: 100%;
    width:100%;
    overflow: auto;
    grid-area:side;
}
.main{
    height: 100%;
    width:100%;
    overflow: auto;
    grid-area:main;
}
.packs{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-gap: 1em;
}
.btnpack{
    border: 10px solid transparent;
    /*padding: 15px;*/
    border-image: linear-gradient(60deg,#9c27b0,rgb(190, 104, 240));
    border-image-slice: 1;
    border-width: 3px;
    border-radius: 5px;
}
@media screen and (max-width: 799px) {
    body,html{
        margin: 0;
        height:fit-content;
        width: 100%;
        background-image: linear-gradient(-60deg,#6b1288,rgb(190, 104, 240));
        background-repeat: no-repeat;
    }
      .wrapper
      {
          height: 100%;
        display: block;
        width: 100%;
      }
      .wrapper>.header
      {
          /*height:30px;*/
        width: 100%;
      }
      .wrapper>.container>.main
      {
          height: 720px;
        width: 95%;
      }
      .wrapper>.container>.side
      {
        display:block;
          height:fit-content;
        width: 95%;
        overflow:auto;
      }
      .wrapper>.container
      {
        display: block;
        width: 95%;
        height:100%;
      }
      
      .packs{
        display: block;
        width: 95%;
        height:100%;
      }
    }
    #alert_popover
  {
   display:block;
   position:absolute;
   bottom:50px;
   left:50px;
  }
  .wrapper1 {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:200px;
  }
  .alert_default
  {
   color: #333333;
   background-color: #f2f2f2;
   border-color: #cccccc;
  }
</style>
</head>
<body>
<div class="wrapper">
            
            <ul class="sidenav" id="mobile-demo">
                <li><a href="<?php echo base_url(); ?>index.php/welcome/" style="color:#000;">Home</a></li>
                <li><a href="badges.html" style="color:#000;">Services</a></li>
                <li><a href="collapsible.html" style="color:#000;">Sponsorship</a></li>
                <li><a href="mobile.html" style="color:#000;">Contact</a></li>
            </ul> 
    <div class="header">
        <nav style="background: #fff;width: 100%">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><img src="<?php echo base_url().'logo_Sponsorise.png' ; ?>" style="margin-left:10%;width:60px;height:60px;"/></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons"  style="color:#000;">menu</i></a>
                <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo base_url(); ?>index.php/welcome/" style="color:#000;">Home</a></li>
                <li><a href="badges.html" style="color:#000;">Services</a></li>
                <li><a href="collapsible.html" style="color:#000;">Sponsorship</a></li>
                <li><a href="mobile.html" style="color:#000;">Contact</a></li>
                </ul>
            </div>
        </nav> 
    </div>
    <div class="container">
    <?php 
    $this->db->where("idEvent",$id);
    $q=$this->db->get("evenement");
    ?>
        <div class="side card white center-align">
        <div class="card-content">
        <?php
        foreach ($q->result() as $row) {
            echo '<a class="waves-effect waves-light modal-trigger" href="#modal1">
            <img src="data:image/jpeg;base64,'.$row->URL_Image.'"style="width: 150px;height: 150px;border-radius: 50%;margin: 20px;" class="card hoverable img-thumbnail"/>
            </a>';
        }
        ?>
        
            
            <?php
        foreach ($q->result() as $row) {
            echo "<div class='center-align'><h4>".$row->nomEvent."</h4>";
            if($row->isvalid ==1){
                echo "<img src='".base_url()."blue-tick.png'  style='width:20px;height:20px'/></div>";
                }
            $this->db->where("idOrg", $this->session->userdata("idOrg"));
            $query=$this->db->get("organisateur");
            if($query->num_rows()>0){
            echo "<button class='btn invitSpons modal-trigger' id='invitSpons' href='#modal2'
                     style='background-color:#5f1782;color:#fff;'>
                          inviter <b>sponsors</b>
                        </button>";
            }
            $this->db->where("idSpons", $this->session->userdata("idSpons"));
            $query=$this->db->get("sponsor");
            if($query->num_rows()>0){
                $this->db->where("idEvent", $row->idEvent);
                $this->db->where("idSpons", $this->session->userdata("idSpons"));
                $query=$this->db->get("interesse");
                
                if($query->num_rows()>0)
                {
                    echo "<input type='button' id='".$id."' class='interesse btn' style='background-color:#9c27b0' value='interessé(e)'/>";
                }
                else{
                    echo "<input type='button' id='".$id."' class='interesse btn' style='background-color:#888' value='interessé(e)?'/>";
                }
            }
            $this->db->where("idOrg",$row->idOrg);
            $q1=$this->db->get("organisateur");
            foreach ($q1->result() as $row1) {
                echo "<div class='left-align'><b>Organisé par</b> <a href='#".$row1->idOrg."'>".$row1->nomOrg." ".$row1->prenomOrg."</a></div>";
            }
            echo "<div class='left-align'><b>Du </b> ".$row->dateDeb." <b>à</b> ".$row->dateFin."</div>";
            echo "<div class='left-align'><b>Heure </b> ".$row->heureEvent."</div>";
            echo "<div class='left-align'><b>Lieu </b> ".$row->lieuEvent."</div>";
            echo "<div class='left-align'><b>Catégorie </b> ".$row->categ."</div>";
            echo "<div class='left-align'><b>Sous-catégorie </b> ".$row->sous_categ."</div>";
            echo "<div class='left-align'><b>Budget </b> ".$row->budget." TND</div>";
            if($row->isfree==0)
			{
                echo "<div class='left-align'><b>L'entrée est </b> gratuite</div>";
			}else
			{
                echo "<div class='left-align'><b>L'entrée est </b> payante</div>";
			}
        }
        ?>
        </div>
    </div>
        <div class="main card white">
        <?php
        foreach ($q->result() as $row) {
            echo "<div class='left-align card-content'><h4>Description</h4>".$row->descriptionEvent."</div>";
        }
        ?>
            <div class="packs">
                <?php
                $this->db->where("idEvent",$id);
                    $q1=$this->db->get("pack");
                    foreach ($q1->result() as $row1) {
                        ?>
                        <div class="pack card-content">
                        <?php
                        echo "<div class='left-align'><h4>Pack <b>".$row1->nomPack."</b></h4></div>";
                        ?>
                        <ul>
                        <?php
                          echo "<li><b>Description</b><br>   ".$row1->descriptionPack."</li>";
                          echo "<li><b>Type</b><br>";
                          if($row1->typePack==1){
                              echo "Subvention</li>";
                          }else{
                            echo "Service</li>";
                        }
                        echo "<li><b>Montant</b><br>   ".$row1->montant."</li>";
                        echo "<li><b>Audience</b><br>   ".$row1->audience."</li>";
                        ?>
                        </ul>
                        <div class='center-align'><a href="#<?php echo $row1->idPack; ?>"><input type="button" id="<?php echo $row1->idPack; ?>" style="text-align:center;margin:auto;font-weight:bolder;color:white;background-image: linear-gradient(-60deg,rgb(43, 9, 43),rgb(190, 104, 240));font-size:20px;font-family:caviar dreams;-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="btnpack" Value="Acheter pack" ></a></div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div id="modal1" class="modal">
    <div class="modal-content center-align">
    <?php
        foreach ($q->result() as $row) {
            echo '<img src="data:image/jpeg;base64,'.$row->URL_Image.'"style="width: 50%;height: 50%;" class="card hoverable img-thumbnail"/>';
        }
        ?>
    </div>
</div>
<div id="modal2" class="modal">
    <div class="sponsorslist">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
$(document).ready(function(){
    $('.collapsible').collapsible({
        accordion : false
    });
});

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  $(document).ready(function(){
    $('.modal').modal();
  });


  $(document).ready(function(){
$('.interesse').click(function(){
    var id = $(this).attr('id');
   if($(this).val()=="interessé(e)")
   {
       $(this).css('background-color', '#888');
       $(this).val("interessé(e)?");
    }else{
        $(this).css('background-color', '#9c27b0');
        $(this).val("interessé(e)");
    }
    val=$(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>index.php/event/interesse/",
        method:"POST",
        data:{id:id}
    });
});

$(document).ready(function(){
        $(".invitSpons").click(function(event){
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/org/loadSponsor/",
                method:"POST",
                data:{id:<?php echo $id; ?>},
                success:function(data){
                    $('.sponsorslist').html(data);
                    $(document).ready(function(){
                        $(".inviter").click(function(event){
                            var idSpons=$(this).attr('id');
                            var id=<?php echo $id; ?>;
                            $.ajax({
                                url:"<?php echo base_url(); ?>index.php/org/invitersponsor/",
                                method:"POST",
                                data:{id:<?php echo $id; ?>,idSpons:idSpons},
                                success:function(data){
                                    console.log(data);
                                }
                            });
                        });
                    });
                }
            });
        });
    });


$('.btnpack').click(function(){
    var id = $(this).attr('id');
    val=$(this).val();
    $.ajax({
        url:"<?php echo base_url(); ?>index.php/event/achatpack/",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data){
            console.log(data.idPack);
            console.log(data.idSpons);
        }
    });
});
});
</script>
</body>
</html>