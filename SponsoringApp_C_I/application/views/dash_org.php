
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->

    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/bootstrap.min.css">

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/meanmenu.min.css">
    
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/main.css">
   
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css_dash/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!-- Start Header menu area -->
<div class="left-sidebar-pro">
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href=""><img class="main-logo" src="<?php echo base_url(); ?>logo_SponsoRise.png" style="height: 50px;width: 50px"alt="" /></a>
                <strong><a href="<?php echo base_url(); ?>index.php/welcome/dash_org"><img src="<?php echo base_url(); ?>logo_SponsoRise.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                    
                        <li >
                            <a title="profil" href="<?php echo base_url(); ?>index.php/welcome/dash_org" aria-expanded="false"  >
                              <span class="fa fa-user fa-lg" aria-hidden="true">
                              </span>
                               <span class="mini-click-non" >Modifier profil</span></a>
                        </li>
              
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/welcome/dash_orgEvent" aria-expanded="false">
                                <span class="fa fa-desktop"></span> 
                                <span class="mini-click-non">Evénements</span></a>
                            
                        </li>  
                        
                        <li>
                            <a  href="<?php echo base_url(); ?>index.php/welcome/dash_orgStat" aria-expanded="false">
                              <span class="fa fa-align-left fa-lg" aria-hidden="true">
                              </span>       
                               <span class="mini-click-non">Statistiques</span></a>
                        </li>

                        <li>
                            <a  href="<?php echo base_url(); ?>index.php/welcome/dash_orgDemande" aria-expanded="false">
                              <span class="fa fa-rocket fa-lg" aria-hidden="true">
                              </span>       
                               <span class="mini-click-non">Demandes <sup class="countdem" style="color: red"></sup></span></a>
                        </li>

                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Header menu area -->
    


        <!-- Mobile Menu start -->
        <div class="mobile-menu-area" style="background:  linear-gradient(to right ,#356acc ,#5f1782 )">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Dashboard <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li>
                                                <a href="<?php echo base_url();?>index.php/welcome/dash_org" aria-expanded="false">
                                                    <span class="fa fa-desktop"></span>
                                                    <span class="mini-click-non">Modifier profil</span>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/welcome/dash_orgEvent" aria-expanded="false">
                                                    <span class="fa fa-desktop"></span>
                                                    <span class="mini-click-non">Evénements</span>
                                                </a>
                                            </li>  
                                            <li><a href="<?php echo base_url(); ?>index.php/welcome/dash_orgStat">Statistiques</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/welcome/dash_orgDemande">Demandes <sup class="countdem" style="color: red"></sup></a></li>
                                        </ul>
                                    </li>
                                    
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>   
        </div>

    <div class="all-content-wrapper" >
        <div class="header-advance-area" >
            <div class="header-top-area" style="background:  linear-gradient(to right ,#356acc ,#5f1782 )">
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wrxaper" >
                                <div class="row">
                                
                                   <!-- notifications-->
                                    <div class="col-lg-11 col-xs-6 col-md-2">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <span class="badge badge-danger badge-counter count" style="border-radius:10px;"></span>
                                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                    </a>
                                                    <div role="menu" style="font-size:15px;overflow:scroll;height:300px;color:#000" class="author-message-top dropdown-menu animated zoomIn">
                                                        
                                                        <ul style="font-size:15px;height:300px;color:#000" class="dropdown-menu-notif">
                                                          
                                                     </ul>
                                                </div>
                                             </li>
                                                
                                             
                                             <!-- profil params -->
                                             <li class="nav-item">
                                                 
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <?php 
                                                $this->db->where("idOrg",$this->session->userdata("idOrg"));
                                                $q=$this->db->get("organisateur");
                                                foreach($q->result() as $row){
                                                ?>
                                                <img style="width:30px;height:30px;border-radius:50%" src="data:image/png;base64,<?php echo $row->img; ?>">
                                                <span class="admin-name"><?php echo $row->nomOrg." ".$row->prenomOrg; }
                                                ?></span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="<?php echo base_url(); ?>index.php/welcome/dashboard_spon"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                    </li>
                                                    <li><a href="<?php echo base_url(); ?>index.php/welcome/index"><span class="edu-icon edu-settings author-log-ic"></span>Go to website</a>
                                                    </li>
                                                    <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                    </li>
                                                </ul>
                                            </li>
                                                                                         
                                       </ul>
                                 </div>
  
                                </div>
                            </div>
                       </div>
                     </div>
                  </div>
                </div>
           </div>

           <div class="breadcome-area">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5%;">
                          <div class="breadcome-list">
                              <div class="row">
                                  <div class="col-lg-2 ">
                                      <div class="breadcome-heading">
                                    
                                            <ul class="breadcome-menu">
                                                <li><a href="#">Dashboard</a> <span class="bread-slash active">/</span>
                                                </li>
                                                <li><span class="bread-blod">Profil</span>
                                                </li>
                                            </ul>
                                      </div>
                                  </div>


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

<!-- profil content-->
          <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row" style="margin-top: 5%">
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Modifier profil</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                         
                                                <div id="dropzone1" class="pro-ad">
                                                <?php $this->db->where("idOrg",$this->session->userdata("idOrg"));
                                                    $q=$this->db->get("organisateur");
                                                    foreach($q->result() as $row){
                                                        ?>
                                                    <form action="<?php echo base_url();?>index.php/org/updateinfo" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick " id="demo1-upload" method="post">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="nomOrg" type="text" class="form-control" value="<?php echo $row->nomOrg; ?>" placeholder="Nom">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" name="prenomOrg" class="form-control" placeholder="Prénom" value="<?php echo $row->prenomOrg; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" name="organismeOrg" class="form-control" placeholder="Organisme" value="<?php echo $row->organismeOrg; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" name="telOrg" class="form-control" placeholder="Téléphone" value="<?php echo $row->telOrg; ?>">
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                    <h5>Choisir photo de profil ou logo</h5>
                                                                        <input type="file" name="image_file" class="btn image" multiple>
                                                                    </div>                                        
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input type="text" name="adrOrg" value="<?php echo $row->adrOrg; ?>" class="form-control" placeholder="Adresse">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="email" name="emailOrg"  class="form-control" placeholder="email" value="<?php echo $row->emailOrg; ?>">
                                                                </div>
                                                                <div class="form-group">                          
                                                                    <select name="centreOrg" id="cat" class="form-control" aria-placeholder="Prefered language">
                                                                        <option value="">Selectionner catégorie</option>
                                                                    <?php
                                                                        foreach($cat as $row1)
                                                                        {
                                                                        ?>
                                                                        <option value="<?php echo $row1->libCateg; ?>" ><?php echo $row1->libCateg; ?></option>;
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <h5>Choisir pièce d'identification</h5>
                                                                        <h6>(CIN, Passeport, Permis de conduire, JORT)</h6>
                                                                        <input type="file" name="file" class="btn image" multiple>
                                                                    </div>                                        
                                                                </div>
                                                                <div style="text-align:center" data-toggle="modal" data-target="#myModal">
                                                                <img style="width:300px;" id="<?php echo $row->idOrg; ?>" src="data:image/png;base64,<?php echo $row->pieceOrg; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="subButt btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               


      </div> 
          </div>


    </div>
    <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style="height:600px;background:#fff;overflow: auto;color:#000;text-align:center;"><div><i data-dismiss="modal" class="fa fa-times"></i></div>
        <?php
        foreach ($q->result() as $row) {
            echo '<img src="data:image/jpeg;base64,'.$row->pieceOrg.'"style="width: 50%;height: 50%;" class="card hoverable img-thumbnail"/>';
        }
        ?>
    </div>
  </div>
</div>

    

    <!-- jquery (drop down list)
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS (toggle inside page titles)
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <!-- wow JS
        <script src="js/wow.min.js"></script>   
          ============================================ -->
    
    <!-- price-slider JS
        <script src="js/jquery-price-slider.js"></script>
        ============================================ -->
    
    <!-- meanmenu JS (side nav button)
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
    <script src="js/owl.carousel.min.js"></script>
        ============================================ -->
    
    <!-- sticky JS (side nav animation responsive)
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/morrisjs/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>/js/morrisjs/morris.js"></script>
    <script src="<?php echo base_url(); ?>/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?php echo base_url(); ?>/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/calendar/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url(); ?>/js/main.js"></script>
    <!-- tawk chat JS
      <script src="<?php echo base_url(); ?>/js/tawk-chat.js"></script>
		============================================ -->
  
</body>

</html>
<script>
$(document).ready(function(){
    $('#cat').change(function(){
  var cat = $('#cat').val();
  if(cat != '')
  {
      alert(cat);
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
  }
 });
});
function load_unseen_notification(view = '')
 {
   $.ajax({
   url:"<?php echo base_url(); ?>index.php/org/notif_org",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu-notif').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();
 }, 5000);
</script>