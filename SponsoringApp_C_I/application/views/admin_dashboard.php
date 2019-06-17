<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo base_url().'logodeg.png'; ?>" />
  <title>SponsoRise Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <style>
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
</style>
</head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
  <script type="text/javascript">  
    google.charts.load('current', {'packages':['corechart']});  
    google.charts.setOnLoadCallback(drawChart);  
    function drawChart()  
    {  
        var data = google.visualization.arrayToDataTable([  
                    ['titnot', 'total'],  
                    <?php  
                    $this->db->select('categ, count(idEvent) AS lib');
                    $this->db->group_by('categ');
                    $q=$this->db->get("evenement");
                    foreach($q->result() as $row)  
                    {  
                        echo "['".$row->categ."', ".$row->lib."],";  
                    }  
                    ?>  
                ]);  
        var options = {  
                title: 'Poucentage des événements pour chaque catégorie',  
                //is3D:true,  
                pieHole: 0.4,
                colors: ['#2b092b', '#4c104c', '#751875','#be68f0', '#bc72ad', '#eb41fc', '#d692dd','#d691c7', '#f3b49f', '#00c6ff']
                };  
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
        chart.draw(data, options);  
    }  
    </script>
<body id="page-top" style="font-family:caviar dreams">

  <!-- Page Wrapper -->
  <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-image: linear-gradient(60deg,rgb(43, 9, 43),rgb(190, 104, 240));" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon">
  <img src="<?php echo base_url().'logoinversee.png' ; ?>" style="width:40px;height:40px;"/>
  </div>
  <div class="sidebar-brand-text">Admin Dashboard</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?php echo base_url(); ?>index.php/welcome/loginenter_dash">
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="<?php echo base_url(); ?>index.php/welcome/loginenter_categ">
    <span>Liste des catégories</span>
  </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<li class="nav-item">
  <a class="nav-link collapsed" href="<?php echo base_url(); ?>index.php/welcome/loginenter_org">
    <span>Liste des organisateurs</span>
  </a>
</li>

<hr class="sidebar-divider">
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url(); ?>index.php/welcome/loginenter_events">
    <span>Liste des événements</span></a>
</li>

<hr class="sidebar-divider">
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url(); ?>index.php/welcome/loginenter">
    <span>Liste de sponsors</span></a>
</li><hr class="sidebar-divider">
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search dropdown no-arrow">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" id="search_text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <a href="#" class="dropdown-toggle input-group-append" data-toggle="dropdown">
                <button class="btn" style='background-color:#9c27b0' type="button">
                  <i class="fas fa-search fa-sm" style="color:#fff"></i>
                </button>
                </a>
              <ul style="font-size:15px;overflow:scroll;height:300px" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" id="result">
              </ul>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="badge badge-danger badge-counter count" style="border-radius:10px;"></span>
                <span class="fas fa-bell fa-fw" style="font-size:18px;"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <ul style="font-size:15px;overflow:scroll;height:500px" class="dropdown-list dropdown-menu dropdown-menu-notif dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              </ul>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a href="#" id="logout" class="logout btn btn-primary dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card shadow h-100 py-2" style="border-left: 5px solid #4c104c">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#4c104c">Nombre d'organisateurs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 org"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card shadow h-100 py-2" style="border-left: 5px solid #be68f0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#be68f0">Nombre de sponsors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 spons"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card shadow h-100 py-2" style="border-left: 5px solid #bc72ad">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 " style="color:#bc72ad">Nombre d'événements</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 event"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card shadow h-100 py-2" style="border-left: 5px solid #d691c7">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#d691c7">Demande de sponsoring</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 demande"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold" style='color:#9c27b0'>Nombre d'événements par mois</h6>
                  
                </div>
                <div class="card-body">
                 <div id="chart">
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold" style='color:#9c27b0'>Categories </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2" id="piechart">
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>

</body>
<?php

$query = $this->db->get('evenement');
$chart_data = '';
foreach($query->result() as $row)
{
  $time="";
  $t="";
  $time = strtotime($row->dateDeb);
  $t=date('Y', $time)."-".date('m', $time);
  $this->db->like("dateDeb",$t,"both");
  $query1 = $this->db->get('evenement');
  $chart_data .= "{ date:'".$t."', nombre:".$query1->num_rows()."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
</body>

</html>

<script>
Morris.Line({
element : 'chart',
data:[<?php echo $chart_data; ?>],

      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['purple'],
      
xkey:'date',
ykeys:['nombre'],
labels:['nombre'],
hideHover:'auto',
stacked:true
});
$(document).ready(function(){
      $(".logout").click(function(){
        if(confirm("Êtes-vous sûr ?"))
        {
            window.location="logout/";
        }
        else
        {
         return false;
        }
      });
  });
  function load_unseen_notification(view = '')
 {
   $.ajax({
   url:"<?php echo base_url(); ?>index.php/welcome/notif_admin",
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
function load_data(query)
{
 $.ajax({
  url:"<?php echo base_url() ; ?>/index.php/welcome/rechEvents",
  method:"POST",
  data:{query:query},
  dataType:"json",
  success:function(data)
  {
   $('#result').html(data.rech);
  }
 });
}
$('#search_text').keyup(function(){
 var search = $(this).val();
 if(search != '')
 {
  load_data(search);
 }
 else
 {
  load_data();
 }
});
 function loadStat()
 {
   $.ajax({
   url:"<?php echo base_url(); ?>index.php/welcome/stat_admin",
   method:"POST",
   dataType:"json",
   success:function(data)
   {
    $('.org').html(data.count2);
    $('.spons').html(data.count1);
    $('.event').html(data.count3);
    $('.demande').html(data.count4);
   }
  });
 }
 
 load_unseen_notification();
 loadStat();
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();
  loadStat();
 }, 5000);
  </script>
