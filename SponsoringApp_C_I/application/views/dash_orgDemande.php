
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
    <style>
    .events{
        display: grid;
        grid-template-columns: repeat(4,1fr);
        grid-gap: 1em;
    }
    @media screen and (max-width: 799px) {
        .events{
        display: block;
        width: 95%;
        height:100%;
      }
    }
    </style>
</head>

<body>

    <!-- Start Header menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href=""><img class="main-logo" src="<?php echo base_url(); ?>img/Logo_.png" style="height: 50px;width: 50px"alt="" /></a>
                <strong><a href="<?php echo base_url(); ?>index.php/welcome/dashboard_spon"><img src="<?php echo base_url(); ?>img/Logo_.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                    
                        <li >
                            <a title="profil" href="<?php echo base_url(); ?>index.php/welcome/dashboard_spon" aria-expanded="false"  >
                              <span class="fa fa-user fa-lg" aria-hidden="true">
                              </span>
                               <span class="mini-click-non" >Modifier profil</span></a>
                        </li>
              
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/welcome/dash_sponsEvent" aria-expanded="false">
                                <span class="fa fa-desktop"></span> 
                                <span class="mini-click-non">Evénements</span></a>
                            
                        </li>  
                        
                        <li>
                            <a  href="<?php echo base_url(); ?>index.php/welcome/dash_sponsStat" aria-expanded="false">
                              <span class="fa fa-align-left fa-lg" aria-hidden="true">
                              </span>       
                               <span class="mini-click-non">Statistiques</span></a>
                        </li>

                        <li>
                            <a  href="<?php echo base_url(); ?>index.php/welcome/dash_sponsDemande" aria-expanded="false">
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
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
												</button>
                                        </div>
                                    </div>
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
                                                <li><span class="bread-blod">Demandes</span>
                                                </li>
                                            </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
    <div class="container-fluid">
        <div class="row">           
            <div class="panel-body">
            <h4 class="m-0 font-weight-bold" style='color:#5f1782'>Mes demandes</h4>
                    <br>
                <table class="table table-hover">
                    <tbody class="demande">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.meanmenu.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/counterup/counterup-active.js"></script>
    <script src="<?php echo base_url(); ?>/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="<?php echo base_url(); ?>/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/metisMenu/metisMenu-active.js"></script>
    <script src="<?php echo base_url(); ?>/js/morrisjs/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>/js/morrisjs/morris.js"></script>
    <script src="<?php echo base_url(); ?>/js/morrisjs/morris-active.js"></script>
    <script src="<?php echo base_url(); ?>/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?php echo base_url(); ?>/js/sparkline/sparkline-active.js"></script>
    <script src="<?php echo base_url(); ?>/js/calendar/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/calendar/fullcalendar-active.js"></script>
    <script src="<?php echo base_url(); ?>/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>/js/main.js"></script>
  
</body>

</html>
<script>
function load_demande()
 {
   $.ajax({
   url:"<?php echo base_url(); ?>index.php/org/load_demande",
   method:"POST",
   data:{id:<?php echo $this->session->userdata('idOrg'); ?>},
   dataType:"json",
   success:function(data)
   {
        $('.demande').html(data.demande);
        $('.countdem').html(data.countdem);
   }
  });
 }
 $(document).ready(function(){
        $(document).on('click', '.supprimer', function(event){
        var id = $(this).attr('id');
        alert(id);
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/org/supprimer_demande/",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('tr#'+id+'').css('background-color', 'darkred');
                    $('tr#'+id+'').fadeOut('slow');
                    console.log(id);
                }
            });
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
  load_demande();
 }, 1000);
</script>