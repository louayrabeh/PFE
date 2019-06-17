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
<!-- Custom fonts for this template -->
<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">

  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js');?>"></script>
    <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

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
<li class="nav-item">
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
<li class="nav-item active">
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

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="badge badge-danger badge-counter count" style="border-radius:10px;"></span>
                <span class="fas fa-bell fa-fw" style="font-size:18px;"></span>
              </a>
              <ul style="font-size:15px;overflow:scroll;height:300px" class="dropdown-list dropdown-menu dropdown-menu-notif dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
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
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style='color:#9c27b0;'>Liste des sponsors</h6>
              <h6>Appuyer sur l'image pour agrandir</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" style="text-align:center" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                  <tr>  
                     <th>ID</th>  
                     <th>Nom</th>  
                     <th>Prénom</th>  
                     <th>Organisme</th> 
                     <th>Adresse</th>
                     <th>Email</th>
                     <th>IMAGE</th>
                     <th>VALIDER</th>
                     <th>SUPPRIMER</td>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
               foreach($fetch_data->result() as $row)  
                {
                  if ($row->isactive == "1") { ?>
                <tr id="<?php echo $row->idOrg; ?>" class="tri" onmouseover="overtr(this)" onmouseout="notovertr(this)">  
                
                     <td><?php echo $row->idOrg; ?> <?php
                    if($row->isvalid>0)
                    {                     
                    ?><img src="<?php echo base_url().'blue-tick.png' ; ?>" style="width:20px;height:20px;"/><?php } ?></td>  
                     <td><?php echo $row->nomOrg; ?></td>  
                     <td><?php echo $row->prenomOrg; ?></td>  
                     <td><?php echo $row->organismeOrg; ?></td> 
                     <td><?php echo $row->adrOrg; ?></td>
                     <td><?php echo $row->emailOrg; ?></td>
                  
            
                     
                     <td data-toggle="modal" data-target="#myModal" style="cursor:grab">
                     <?php echo '<div  style="margin:2%;text-align:center"><img src="data:image/jpeg;base64,'.$row->img.'" class="img-thumbnail" style="width:40px;"/></div>'; ?>
                      </td>
                      <td><input type="button" value="activé" id="<?php  echo $row->idOrg; ?>" class="activerbutt btn" style='background-color:#9c27b0;color:#fff'/></td>
                     <td><button href="#" id="<?php echo $row->idOrg; ?>" class="deletebutt btn" style='background-color:#9c27b0;color:#fff'>Supprimer</button></td>
                </tr>  
                  <?php  }  
                  else {
                    ?>
                <tr id="<?php echo $row->idOrg; ?>" class="tri" onmouseover="overtr(this)" onmouseout="notovertr(this)">  
                
                     <td><?php echo $row->idOrg; ?> <?php
                    if($row->isvalid>0)
                    {                     
                    ?><img src="<?php echo base_url().'blue-tick.png' ; ?>"  style="width:20px;height:20px;"/>
                    <?php }?>
                      <img src="<?php echo base_url().'blue-tick.png' ; ?>" id="<?php echo $row->idOrg; ?>" class="tick" style="width:20px;height:20px;display:none"/>
                    </td>  
                     <td><?php echo $row->nomOrg; ?></td>  
                     <td><?php echo $row->prenomOrg; ?></td>  
                     <td><?php echo $row->organismeOrg; ?></td> 
                     <td><?php echo $row->adrOrg; ?></td>
                     <td><?php echo $row->emailOrg; ?></td>
                  
            
                     
                     <td data-toggle="modal" data-target="#myModal" style="cursor:grab;height:80px;width:80px">
                     <?php echo '<div  style="margin:2%;text-align:center"><img src="data:image/jpeg;base64,'.$row->img.'" class="img-thumbnail" style="width:40px;"/></div>'; ?>
                      </td>
                      
                     <td><input type="button" value="désactivé" id="<?php echo $row->idOrg; ?>" class="activerbutt btn" style='color:#fff;background-color:#9c27b0'/></td>
                     <td><button href="#" id="<?php echo $row->idOrg; ?>" style='background-color:#9c27b0;color:#fff' class="deletebutt btn">Supprimer</button></td>
                </tr>  
                  <?php
                  }   
                }
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style="height:600px;background:#fff;overflow: auto;color:#000"><div style="text-align:right;margin-top:2%;margin-right:2%"><i data-dismiss="modal" class="fa fa-times"></i></div>
      <div id="uploaded_image"></div> 
      <input type="hidden" name="upload" id="uploadmod" value="Upload" class="btn btn-info" data-dismiss="modal"/>  
      
    </div>
  </div>
</div>  
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script>
  $(document).ready(function(){
      $(".deletebutt").click(function(){
        var id = $(this).attr("id"); 
        if(confirm("Êtes-vous sûr ?"))
        {
          $.ajax({
           url:'<?php echo base_url(); ?>index.php/welcome/delete_dataOrg',
           method:'POST',
           data:{id:id},
           success:function(){
                 $('tr#'+id+'').css('background-color', 'darkred');
                 $('tr#'+id+'').fadeOut('slow');
            }
          });
        }
        else
        {
         return false;
        }
      });
  });
  function overtr(x) {
  x.style.backgroundColor = "#ccc";
}
function notovertr(x) {
  x.style.backgroundColor = "#fff";
}
  $(document).ready(function(){
      $(".activerbutt").click(function(){
        var id = $(this).attr("id");
        
        
        if(confirm("Êtes-vous sûr ?"))
        {
          if($(this).val()=="activé")
        {
          $(this).val("désactivé");
        }else{
          $(this).val("activé");
        }
          $.ajax({
           url:'<?php echo base_url(); ?>index.php/welcome/isactiveOrg',
           method:'POST',
           data:{id:id},
           success:function(){
                 $('tr#'+id+'').css('color', '#808080');
            }
          });
        }
        else
        {
         return false;
        }
      });
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
  $(document).ready(function(){  
    $('.tri').click(function(e){  
        e.preventDefault();  
        var id = $(this).attr("id");
        $.ajax({  
            url:"<?php echo base_url(); ?>index.php/welcome/upload_modalOrg",
            method:"POST",  
            data:{id:id},
            success:function(data)  
            {
                $('#uploadmod').val(id);
                $('#uploaded_image').html(data);
                $('#validermodalbutt').click(function(e){
                    $.ajax({  
                        url:"<?php echo base_url(); ?>index.php/welcome/valider_dataOrg",
                        method:"POST",  
                        data:{id:id},
                        success:function(data)  
                        {
                            $('img#'+id+'').css('display', 'block');
                            console.log(id);
                        }  
                    }); 
                });
            }  
        });
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
 
 load_unseen_notification();
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();
 }, 5000);
 $(document).ready(function(){

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
});
</script>