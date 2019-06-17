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
  background-image: linear-gradient(60deg,rgb(43, 9, 43),rgb(190, 104, 240));
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
.cont{
    display: grid;
    grid-template-columns: repeat(4,1fr);
    grid-gap: 1em;
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
    grid-template-areas:"filter result";
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
.filter{
    height: 100%;
    width:100%;
    overflow: auto;
    grid-area:filter;
}
.wrapper>.container>.filtermobile
      {
          display:none;
      }
.search_result{
    height: 100%;
    width:100%;
    overflow: auto;
    grid-area:result;
}
input[type=checkbox].filled-in:checked + span:not(.lever):after 
{
    border: 2px solid #4a148c;  
    background-color: #4a148c;
}
label{
    color: #4a148c !important;
}
input[type="range"]+ .thumb{
  width:70%;
  background-color: #4a148c;
}
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  background-color: #4a148c;
  cursor: pointer;
}
hr{
    width:50%;
    border: 0.5px solid #4a148c; 
    background-color: #4a148c;
}
#filter{
    border: 10px solid transparent;
    /*padding: 15px;*/
    border-image: linear-gradient(60deg,rgb(43, 9, 43),rgb(190, 104, 240));
    border-image-slice: 1;
    border-width: 3px;
    border-radius: 5px;
}
@media screen and (max-width: 799px) {
    .cont{
    display: grid;
    grid-template-columns: repeat(1,1fr);
    grid-gap: 1em;
    color: white
}
    body,html{
        margin: 0;
        height:fit-content;
        width: 100%;
        background-image: linear-gradient(-60deg,rgb(43, 9, 43),rgb(190, 104, 240));
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
      .wrapper>.container>.search_result
      {
          height: 100%;
        width: 95%;
      }
      .wrapper>.container>.filter
      {
          display:none;
      }
      .wrapper>.container>.filtermobile
      {
          display:block;
          height:20%;
        width: 95%;
        overflow:auto;
      }
      .wrapper>.container
      {
        display: block;
        width: 95%;
        height:100%;
      }
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
            <div class="filtermobile purple-text">
                    <ul class="collapsible card white" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">whatshot</i>Filter</div>
                            <div class="collapsible-body">
                            <span>
                                    <form>
                                        <div class="input-field col s6">
                                            <input type="text" id="search_text">
                                            <label for="search_text">Rechercher événement</label>
                                        </div>
                                        <div class="categorie"> 
                                        <h5>Catégorie</h5>       
                                            <?php 
                                            $q=$this->db->get("categorie");
                                            foreach ($q->result() as $row) {
                                                ?>
                                            <p>
                                                <label for="<?php echo $row->libCateg ; ?>">
                                                    <input type="checkbox" id="<?php echo $row->libCateg ; ?>" value="<?php echo $row->libCateg ; ?>" class="filled-in checkbox-purple selector categ"/>
                                                    <span><?php echo $row->libCateg ; ?></span>
                                                </label>
                                                </p>
                                            <?php }
                                            ?>
                                            <hr>
                                            <h5>Budget</h5>       
                                            <p class="range-field row">
                                                <input type="range" name="range" value="0" id="test5" min="0" max="100" step="1" class="selector range"/>
                                                <span class="value" style="font-variant-numeric:tabular-nums;"></span>
                                            </p>
                                            <hr>
                                            <h5>Gratuit | Payant</h5>
                                                <div><label>
                                                    <input type="radio" name="isfree" class="with-gap isfree radio-purple selector isfree" value="0" >
                                                <span>Gratuit</span>
                                                </label></div><div>
                                                <label>
                                                    <input type="radio" name="isfree" class="with-gap isfree radio-purple selector isfree" value="1" >
                                                <span>Payant</span>
                                                </label>
                                            </div>
                                            <hr>
                                            <h5>Date</h5>
                                            <label>
                                                <input type="checkbox" name="date" class="filled-in checkbox-purple selector date"/>
                                                <span style="font-size:12px">(filtrer par date de début)</span>
                                            </label>
                                            <div style="text-align:center"><input type="reset" class="selector" id="filter" value="Effacer" style="text-align:center;margin:auto;font-weight:bolder;color:white;background-image: linear-gradient(-60deg,rgb(43, 9, 43),rgb(190, 104, 240));font-size:20px;font-family:caviar dreams;-webkit-background-clip: text;-webkit-text-fill-color: transparent;"></div>
                                        </div>
                                    </form>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
        <div class="filter card white">
            <form id="formfilter" method="post" action="<?php echo base_url(); ?>index.php/welcome/filter">
                <div class="input-field col s6" style="width:80%;margin-left:10%;">
                    <input type="text" id="search_textw">
                    <label for="search_textw">Rechercher événement</label>
                </div>
                <div class="categorie card-content purple-text">
                <h5>Catégorie</h5>       
                    <?php 
                    $q=$this->db->get("categorie");
                    foreach ($q->result() as $row) {
                        ?>
                    <p>
                        <label>
                          <input type="checkbox" name="categ[]" class="filled-in checkbox-purple selector categ" value="<?php echo $row->libCateg ; ?>"/>
                          <span><?php echo $row->libCateg ; ?></span>
                        </label>
                      </p>
                    <?php }
                    ?>
                    <hr>
                    <h5>Budget</h5>       
                    <p class="range-field row">
                        <input type="range" name="range1" value="0" id="test5" min="0" max="100" step="1" class="selector range"/>
                        <span class="value" style="font-variant-numeric:tabular-nums;"></span>
                    </p>
                    <hr>
                    <h5>Gratuit | Payant</h5>
                        <div><label>
                            <input type="radio" name="isfree" class="with-gap isfree radio-purple selector isfree" value="0" >
                          <span>Gratuit</span>
                        </label></div><div>
                        <label>
                            <input type="radio" name="isfree" class="with-gap isfree radio-purple selector isfree" value="1" >
                          <span>Payant</span>
                        </label>
                    </div>
                    <hr>
                    <h5>Date</h5>
                    <label>
                        <input type="checkbox" name="date" class="filled-in checkbox-purple selector date"/>
                        <span style="font-size:12px">(filtrer par date de début)</span>
                    </label>
                    <div style="text-align:center"><input type="reset" class="selector" id="filter" value="Effacer" style="text-align:center;margin:auto;font-weight:bolder;color:white;background-image: linear-gradient(-60deg,rgb(43, 9, 43),rgb(190, 104, 240));font-size:20px;font-family:caviar dreams;-webkit-background-clip: text;-webkit-text-fill-color: transparent;"></div>
                </div>
            </form>
        </div>
        <div class="search_result card white">
            <div align="center" id="pagination_link"></div>
            <div class="cont purple-text card-content">
            </div>
            <ul class="search_result">
            </ul>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
var elem = document.querySelector('input[type="range"]');

var rangeValue = function(){
  var newValue = elem.value;
  var target = document.querySelector('.value');
  target.innerHTML = newValue;
}

elem.addEventListener("input", rangeValue);

$(document).ready(function(){
    $('.collapsible').collapsible({
    accordion : false
});
  });

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });



  $(document).ready(function(){

filter_data(1);

function filter_data(page)
{
    $('.cont').html('<div style="top:50%;left:50%;position:absolute;text-align:center"><div class="preloader-wrapper big active"><div class="spinner-layer"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></div>');
    var action = 'filter';
    var budget = $('input[name=range1]').val();
    var isfree = $('.isfree:checked').val();
    var date = $('.date:checked').val();
    var categ = get_filter('categ');
    //var q = $('#search_textw').val();
    $.ajax({
        url:"<?php echo base_url(); ?>index.php/welcome/filter/"+page,
        method:"POST",
        data:{action:action, budget:budget,categ:categ,isfree:isfree,date:date},
        dataType:"json",
        success:function(data){
            $('.cont').html(data.filter_list);
            $('#pagination_link').html(data.pagination_link);
        }
    });
}

$(document).on('click', '.interesse', function(event){
    var id = $(this).attr('id');
   alert(<?php echo $this->session->userdata('idSpons'); ?>);
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
        data:{id:id},
        success:function(){
            console.log(val);
        }
    });
});

function get_filter(class_name)
{
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}

$(document).on('click', '.pagination li a', function(event){
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    }); 
    

    $('.selector').click(function(){ 
       // alert($('input[name=range1]').val());
    filter_data(1);
    console.log(get_filter('categ'));
    console.log($('input[name=range1]').val());
    console.log($('.isfree:checked').val());
});
});
function load_data(query)
{
 $.ajax({
  url:"<?php echo base_url() ; ?>/index.php/welcome/filterEvents",
  method:"POST",
  data:{query:query},
  dataType:"json",
  success:function(data)
  {
    $('.cont').html(data.rech);
  }
 });
}
$('#search_textw').keyup(function(){
 var search = $(this).val();
 if(search != '')
 {
     console.log($("#search_textw").val());
  load_data(search);
 }
 else
 {
  load_data();
 }
});
</script>


</body>
</html>