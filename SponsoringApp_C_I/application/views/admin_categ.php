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

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper" style="font-family:caviar dreams">
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
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>index.php/welcome/loginenter_categ">
          <span>Liste des catégories</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>index.php/welcome/loginenter_org">
          <span>Liste des organisateurs</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item ">
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
                <a href="#" id="logout" class="logout btn dropdown-item">
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
              <h6 class="m-0 font-weight-bold" style='color:#9c27b0'>Listes des catégories</h6>
              <div style="float:right" data-toggle="modal" data-target="#myModal"><button href="#" style='background-color:#9c27b0;color:#fff' id="ajoutercategbutt" class="ajoutercategbutt btn">Ajouter catégorie</button></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" style="text-align:center" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                  <tr>  
                     <th>ID</th>  
                     <th>CATEGORIE</th>
                     <th>UPDATE</th>
                     <th>SUPPRIMER</td>
                </tr> 
                  </thead>
                  <?php
                  $this->db->order_by("idCateg","ASC");
                  $q=$this->db->get("categorie");
                foreach($q->result() as $row)  
                {
                 ?>
                <tr id="<?php echo $row->idCateg; ?>" class="tri" onmouseover="overtr(this)" onmouseout="notovertr(this)">  
                
                     <td><?php echo $row->idCateg ; ?></td>  
                     <td><?php echo $row->libCateg ; ?></td>
                  
            
                     
                     <td data-toggle="modal" data-target="#myModal" style="cursor:grab">
                     <input type="button" value="Update" id="<?php  echo $row->idCateg; ?>" style='background-color:#9c27b0;color:#fff' class="updatebutt btn"/>
                      </td>
                     <td><button href="#" style='background-color:#9c27b0;color:#fff' id="<?php echo $row->idCateg; ?>" class="deletebutt btn">Supprimer</button></td>
                </tr>
                  <?php 
                }
                ?>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style='color:#9c27b0'>Listes des sous-catégories</h6>
              <div style="float:right" data-toggle="modal" data-target="#myModal"><button href="#" id="ajoutersouscategbutt" class="ajoutersouscategbutt btn" style='background-color:#9c27b0;color:#fff'>Ajouter sous-catégorie</button></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" style="text-align:center" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                  <tr>  
                     <th>ID</th>  
                     <th>SOUS-CATEGORIE</th>
                     <th>Catégorie</th>  
                     <th>UPDATE</th>
                     <th>SUPPRIMER</td>
                </tr> 
                  </thead>
                  <?php
                  $this->db->order_by("idSous_categ","ASC");
                  $q=$this->db->get("sous_categorie");
                foreach($q->result() as $row)  
                {
                 ?>
                <tr id="<?php echo $row->idSous_categ; ?>" class="tri" onmouseover="overtr(this)" onmouseout="notovertr(this)">  
                
                     <td><?php echo $row->idSous_categ ; ?></td>  
                     <td><?php echo $row->libSous_categ ; ?></td>
                     <?php
                      $this->db->where("idCateg",$row->idCateg);
                      $q1=$this->db->get("categorie");
                      foreach($q1->result() as $row1)  
                      {
                      ?>
                     <td><?php echo $row1->libCateg ; ?></td> 
                     <?php 
                    }
                    ?>                    
                     <td data-toggle="modal" data-target="#myModal" style="cursor:grab">
                     <input type="button" value="Update" id="<?php  echo $row->idSous_categ; ?>" class="updatesousbutt btn" style='background-color:#9c27b0;color:#fff'/>
                      </td>
                     <td><button href="#" id="<?php echo $row->idSous_categ; ?>" class="deletesousbutt btn" style='background-color:#9c27b0;color:#fff'>Supprimer</button></td>
                </tr>
                  <?php 
                }
                ?>
                  <tbody>
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
    <div class="modal-content" style="height:400px;background:#fff;overflow: auto;color:#000"><div style="text-align:right;margin-top:2%;margin-right:2%"><i data-dismiss="modal" class="fa fa-times"></i></div>
    <h3 id="title" style="text-align:center;"></h3>
      <form method="post" id="form_categ">
      <p class="categ_sous" style="text-align:center;">
      <?php
          $this->db->order_by("idCateg","ASC");
          $q=$this->db->get("categorie");
        ?>
        <select name="categ" id="souscateg" style="width:90%;margin:5%" class="form-control input-lg">
          <option value="">Selectionner une catégorie</option>
          <?php
          foreach($q->result() as $row)  
          {
          ?>
          <option value="<?php echo $row->idCateg ; ?>"> <?php echo $row->libCateg ; ?> </option>';
          <?php 
          }
          ?>
        </select>
        </p>
      <p><div style="text-align:center;"><input style="text-align:center;width:80%;border:1px solid #036;border-radius: 2px;" placeholder="ID Catégorie" name="idcateg" id="idcateg" type="text" ></div></p>
      <p><div style="text-align:center;"><input style="text-align:center;width:80%;border:1px solid #036;border-radius: 2px;" placeholder="Catégorie" name="libcateg" id="libcateg" type="text" ></div></p>
      <p><h4 id="titresous">Les sous-catégories</h4></p>
      <p><div style="text-align:center;"><input style="text-align:center;width:80%;border:1px solid #036;border-radius: 2px;" placeholder="Sous-catégorie" name="libsouscateg" id="libsouscateg" type="text" ></div></p>
      <table class="table" id="dynamic_field">
      </table>
      <br>
      <input type="hidden" name="upload" id="uploadmod" value="Upload" class="btn btn-info" data-dismiss="modal"/>
      <input type="hidden" name="action" id="action" value="insert" />
      <div style="text-align:center"><input type="submit" name="valider" id="validermodalbutt" value="Valider" class="btn btn-info" data-dismiss="modal"/></div> <br>
      </form>
    </div>
  </div>
</div>
<div id="uploaded_image"></div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script>
  $(document).ready(function(){
    function add_dynamic_input_field(count)
 {
  var button = '';
  if(count > 1)
  {
   button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">x</button>';
  }
  else
  {
   button = '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
  }
  output = '<tr id="row'+count+'">';
  output += '<td><input type="text" name="souscateg[]" placeholder="Sous-catégorie" class="form-control souscateg" /></td>';
  output += '<td align="center">'+button+'</td></tr>';
  $('#dynamic_field').append(output);
 }

 $('#ajoutercategbutt').click(function(){
  $('.categ_sous').hide();
  $('#libsouscateg').hide();
  $('#idcateg').show();
  $('#libcateg').show();
  $('#dynamic_field').html('');
  $('#title').text('Ajouter catégorie et sous-catégories');
  $('#action').val("insert");
  $('#validermodalbutt').val("Ajouter");
  add_dynamic_input_field(1);
  $('#form_categ')[0].reset();
 });

 $('#ajoutersouscategbutt').click(function(){
  $('.categ_sous').show();
  $('#libsouscateg').hide();
  $('#idcateg').hide();
  $('#libcateg').hide();
  $('#dynamic_field').html('');
  $('#title').text('Ajouter sous-catégories');
  $('#action').val("insertsous");
  $('#validermodalbutt').val("Ajouter");
  add_dynamic_input_field(1);
  $('#form_categ')[0].reset();
 });

 $('.updatesousbutt').click(function(){
  $('.categ_sous').hide();
  $('#titresous').hide();
  $('#libsouscateg').show();
  $('#idcateg').hide();
  $('#libcateg').hide();
  $('#dynamic_field').html('');
  $('#title').text('Modifier sous-catégorie');
  $('#action').val("updatesous");
  $('#validermodalbutt').val("Modifer");
  //add_dynamic_input_field(1);
  $('#form_categ')[0].reset();
 });

 $('.updatebutt').click(function(){
  $('.categ_sous').hide();
  $('#libsouscateg').hide();
  $('#idcateg').show();
  $('#libcateg').show();
  $('#dynamic_field').html('');
  $('#title').text('Modifier catégorie et sous-catégories');
  $('#action').val("modif");
  $('#validermodalbutt').val("Modifier");
  add_dynamic_input_field(1);
  $('#form_categ')[0].reset();
 });

 $(document).on('click', '#add_more', function(){
    count=1;
  count = count + 1;
  add_dynamic_input_field(count);
 });
 $(document).on('click', '.remove', function(){
  var row_id = $(this).attr("id");
  $('#row'+row_id).remove();
 });


 $('#validermodalbutt').on('click', function(event){
  event.preventDefault();
  /*if($('#libcateg').val() == '')
  {
   confirm("Entrer la catégorie");
   return false;
  }*/
  c=0;
  id=$("#idcateg").val();
  souscateg=$("#souscateg").val();
  lib=$("#libcateg").val();
  var sous = [];
  $('.souscateg').each(function(i){
      sous[i] = $(this).val();
   });
   //var form_data = $(this).serialize();

   var action = $('#action').val();
   if(action == 'insert')
   {
    if($('#libcateg').val() == '')
    {
      confirm("Entrer la catégorie");
      return false;
    }
    $('.souscateg').each(function(){
        if($(this).val() != '')
        {
          c++;
        }
      });
      
      if(c>0)
      {
        $.ajax({
          url:"<?php echo base_url(); ?>index.php/welcome/insert_categ",
          method:"POST",
          data:{id:id,lib:lib,sous:sous},
          success:function(data)
          {
              $('#uploaded_image').html(data);
              if(action == 'insert')
              {
                  alert("Données ajoutées");
              }
          }
        });
      }
      else{
        alert("Entrer au une sous-catégorie");
        return false;
      }
    }
    if(action == 'insertsous')
   {
    $('.souscateg').each(function(){
        if($(this).val() != '')
        {
          c++;
        }
      });
      
      if(c>0)
      {
        $.ajax({
          url:"<?php echo base_url(); ?>index.php/welcome/insert_souscateg",
          method:"POST",
          data:{id:souscateg,sous:sous},
          success:function(data)
          {
              $('#uploaded_image').html(data);
              if(action == 'insert')
              {
                  alert("Données ajoutées");
              }
          }
      });
      }
      else
      {
        alert("Entrer au moins une sous-catégorie");
        return false;
      }
    }
 });
 $(document).on('click', '.updatebutt', function(){
  var id = $(this).attr("id");
  $.ajax({
   url:"<?php echo base_url(); ?>index.php/welcome/select_categ",
   method:"POST",
   data:{id:id},
   dataType:"JSON",
   success:function(data)
   {
    $('#libcateg').val(data.lib);
    $('#idcateg').val(data.id);
    $('#dynamic_field').html(data.sous);
    $('#hidden_id').val(id);
    $(document).on('click', '#validermodalbutt', function(){
        var libcateg = $("#libcateg").val();
        var sous = [];
        $('.souscateg').each(function(i){
            sous[i] = $(this).val();
        });
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/welcome/modif_categ",
            method:"POST",
            data:{id:id,lib:libcateg},
            success:function(data)
            {
                alert("Données modifiées");
            }
        });
    });
   }
  });
 });
 $(document).on('click', '.updatesousbutt', function(){
  var id = $(this).attr("id");
  $.ajax({
   url:"<?php echo base_url(); ?>index.php/welcome/select_souscateg",
   method:"POST",
   data:{id:id},
   dataType:"JSON",
   success:function(data)
   {
    $('#libsouscateg').val(data.lib);
    $('#hidden_id').val(id);
    $(document).on('click', '#validermodalbutt', function(){
        var libsouscateg = $("#libsouscateg").val();
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/welcome/modif_souscateg",
            method:"POST",
            data:{id:id,lib:libsouscateg},
            success:function(data)
            {
                alert("Données modifiées");
            }
        });
    });
   }
  });
});
 $(".deletesousbutt").click(function(){
        var id = $(this).attr("id"); 
        if(confirm("Êtes-vous sûr ?"))
        {
          $.ajax({
           url:'<?php echo base_url(); ?>index.php/welcome/delete_souscateg',
           method:'POST',
           data:{id:id},
           success:function(){
                 $('tr#'+id+'').css('background-color', 'darkred');
                 $('tr#'+id+'').fadeOut('slow');
            }
          });
           // window.location="delete_data/"+id;
        }
        else
        {
         return false;
        }
      });



      $(".deletebutt").click(function(){
        var id = $(this).attr("id"); 
        if(confirm("Êtes-vous sûr ?"))
        {
          $.ajax({
           url:'<?php echo base_url(); ?>index.php/welcome/delete_categ',
           method:'POST',
           data:{id:id},
           success:function(){
                 $('tr#'+id+'').css('background-color', 'darkred');
                 $('tr#'+id+'').fadeOut('slow');
            }
          });
           // window.location="delete_data/"+id;
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
           url:'<?php echo base_url(); ?>index.php/welcome/isactive',
           method:'POST',
           data:{id:id},
           success:function(){
             
                 $('tr#'+id+'').css('color', '#808080');
                 //$('tr#'+id+'').fadeOut('slow');
            }
          });
            //window.location="valider_data/"+id;
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
unction load_data(query)
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