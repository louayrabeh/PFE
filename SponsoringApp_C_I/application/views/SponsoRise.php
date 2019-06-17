<!DOCTYPE html>
<html lang="en" >


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url().'logodeg.png'; ?>" />
  <title>SponsoRise</title>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- External Scripts-->
  <!-- jQuery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  


  <!-- MaterializeCSS Script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
  <!-- External CSS-->
  <!-- MaterializeCSS main framework-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  <!-- AnimateCSS animations-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.0/animate.min.css">
   <!-- get started button green-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  <!-- Fontawesome for icons-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
  <!-- Local CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/sty.css">
  <script>
$(document).ready(function() {
  //Function to spawn the side navigation bar
  $(".button-collapse").sideNav();


  //Scroll animation
  $('a[href*=#]:not([href=#])').click(function() {
   if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
     var target = $(this.hash);
     target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
     if (target.length) {
       $('html,body').animate({
         scrollTop: target.offset().top
       }, 1000);
       return false;
     }
   }
 });

  //Parallax effect
  $('.parallax').parallax();

  //Scrollfire effect

	var animationEnd ='webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    var options = [
		{selector: '#about-title', offset: 100, callback: 'makeVisible("#about-title")'},
		{selector: '#comp-title', offset: 100, callback: 'makeVisible("#comp-title")'},
		{selector: '#comp-courses', offset: 200, callback: 'Materialize.showStaggeredList("#comp-courses")'},
		{selector: '#elen-title', offset: 100, callback: 'makeVisible("#elen-title")'},
		{selector: '#elen-courses', offset: 200, callback: 'Materialize.showStaggeredList("#elen-courses")'},
		{selector: "#skills-title", offset: 100, callback: 'makeVisible("#skills-title")'},
		{selector: '#lang-title', offset: 100, callback: 'makeVisible("#lang-title")'},
		{selector: '#lang-fcolumn', offset: 200, callback: 'makeVisible("#lang-fcolumn", "bounceInUp")'},
		{selector: '#lang-scolumn', offset: 200, callback: 'makeVisible("#lang-scolumn", "bounceInUp")'},
		{selector: '#frame-title', offset: 100, callback: 'makeVisible("#frame-title")'},
		{selector: '#frame-fcolumn', offset: 200, callback: 'makeVisible("#frame-fcolumn", "bounceInUp")'},
		{selector: '#frame-scolumn', offset: 200, callback: 'makeVisible("#frame-scolumn", "bounceInUp")'},
		{selector: '#port-title', offset: 100, callback: 'makeVisible("#port-title")'},
		{selector: '#proj-cards', offset: 200, callback: 'makeVisible("#proj-cards", "bounceInUp")'},
		{selector: '#contact-title', offset: 100, callback: 'makeVisible("#contact-title")'},
		{selector: '#contact-form', offset: 200, callback: 'makeVisible("#contact-form")'}
  ];
  Materialize.scrollFire(options);

	$('#textarea1').trigger('autoresize');

});

function makeVisible(value, animation) {
	console.log(value, animation);
	if(!animation) { animation = "flipInX"; }
	$(value).addClass("animated "+animation);
	$(value).css('visibility', 'visible');
}

  </script>

</head>

<body style="font-family:caviar dreams">
  <!-- Navigation Bar-->
  <div class="navbar-fixed">
    <nav class="z-depth-2">
      <div class="nav-wrapper" style="background: white"><a href="#" class="brand-logo"><span class="header-text">
      <img src="<?php echo base_url().'logo_Sponsorise.png' ; ?>" style="margin-left:10%;width:60px;height:60px;"/>
      </span></a><a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons header-text">menu</i></a>
        <!-- Normal top navbar items-->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#home" class="header-text">Home</a></li>
          <li><a href="#about" class="header-text">Services</a></li>
          <li><a href="#portfolio" class="header-text">Sponsorship</a></li>
          <li><a href="#contact1" class="header-text">Contact</a></li>
        </ul>
        <!-- Mobile side bar items-->
        <ul id="mobile-demo" class="side-nav">
          <li><a href="#home" class="header-text">Home</a></li>
          <li><a href="#about" class="header-text">About</a></li>
          <li><a href="#skills" class="header-text">SERVICES</a></li>
          <li><a href="#portfolio" class="header-text">SPONSORSHIP</a></li>
          <li><a href="#contact1" class="header-text">CONTACT</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- Content-->
  <div class="content">
    <!-- Home-->
    <div id="home" class="parallax-container" style="background: linear-gradient(to right ,#3f6acc ,#5f1782 );">
      <div class="flow-text center home-text"style="font-family:caviar dreams">
        <div class="name">
          <h5>A marketplace for sponsorship</h5></div>
        <div class="description">
          <p>We make it easy to find and sponsor events to engage with your brand’s target audience negociate your sponsor deal</p></div>
       </div>


       
      <div class="center">
       <a href="#"><img src="<?php echo base_url(); ?>/image/play.png" class="play-btn"></a>
       <h3 style="margin-left: 850px; margin-top: -240px">How does it work ?</h3>
     </div>

       <p class="pop-up-button" style="margin-top: 150px">Get started</p>

       <div class="pop-up">
         
          <div class="modal-content center" style="height: 30px; margin-bottom:25px;">
              
            <span class="close" style="font-size: 120%;">&times;</span>
              <p class="text title" style="color: #5f1782">How are you involved in events ?</p>
      </div>
      <br>
         <div class="pop-up-text">
          <center><a class="btn" href="<?php echo base_url(); ?>index.php/welcome/login_spons">I'm a sponsor</a></center> 
           <center><h1>Discover events and get in contact instantly with the organizer</h1></center>
        <button class="btn"> <a href="<?php echo base_url(); ?>index.php/welcome/login_org">I'm an event organizer</a></button>
          <center> <h1>Create your event profile and show the sponsors what you have to offer</h1></center>
         </div>
       </div>
    

       <center>
        <div class="badge-container">
           
            <a class="google-play-button" href="https://play.google.com/store/apps?hl=fr">
                <img width="100%" src="http://svgshare.com/i/2yX.svg">
            </a>
        </div>
    </center>

          </div>
          

          <script>
          $(".pop-up").hide(0);
$(".pop-up-container").hide(0);

$(".pop-up-button").click(function() {
	$(".pop-up-container").show(0);
	$(".pop-up").fadeIn(300);
	$(".pop-up-button").hide(0);
});
$(".pop-up .close").click(function() {
	$(".pop-up-container").hide(0);
	$(".pop-up").hide(0);
	$(".pop-up-button").show(0);
});
</script>


      </div>

    
      <div class="parallax"></div>
    </div>
    
    <!-- About-->
    <div id="about" class="parallax-container">
      <h3 id="about-title" class="flow-text content-title">WHAT WE DO ?</h3>
      <div class="section container">
        <div class="divider"></div>
        <h5 id="comp-title">FOR SPONSORS</h5>
        <ul id="comp-courses" class="purple-text flow-text">
          <li><i class="tiny material-icons">done</i>Create sponsor packages and sell online or via mailings</li>
          <li><i class="tiny material-icons">done</i>Manage your sponsordeals and receive donations</li>
          <li><i class="tiny material-icons">done</i>Automation of sending out invoices and contracts</li>
          <li><i class="tiny material-icons">done</i>Keep an eye on your sponsorship strategy</li>
        </ul>
        <div class="divider"></div>
        <h5 id="elen-title">FOR EVENTS ORGANIZER</h5>
        <ul id="elen-courses" class="purple-text flow-text">
          <li><i class="tiny material-icons">done</i>Find sponsors </li>
          <li><i class="tiny material-icons">done</i>Create event and publish them</li>
          <li><i class="tiny material-icons">done</i>Contact companies</li>
        </ul>
      </div>
      <div class="parallax" style="background-color: white"></div>
    </div>
   
    <!-- Portfolio-->
    
    <div id="portfolio" class="parallax-container"  style="background: linear-gradient(to right , #5f1782 ,   #356acc);">
      <h3 id="port-title" class="flow-text content-title center" style="font-family: Caviar dreams,Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: white">What type of event are you looking for ??</h3>
      <div class="container">
        <div class="divider"></div>
        <div id="proj-cards" class="row">
      
          <?php
             $query = $this->db->get('categorie');
              
              foreach($query->result() as $row)
              {
                ?>
          <div class="col s12 m6 l4">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
              <?php
       echo '<img src="data:image/jpeg;base64,'.$row->picture.'" class="proj-img activator" />';
               ?>   
              </div>
              <div class="card-content"><span class="card-title activator grey-text text-darken-4"><?php echo($row->libCateg);?> </span>
                <p><a href="">see more</a></p>
              </div>
              <div class="card-reveal"><span class="card-title grey-text text-darken-4">Topics<i class="material-icons right">close</i></span>

                <?php
                $this->db->where('idCateg',$row->idCateg);
                  $quer = $this->db->get('sous_categorie');
                  foreach($quer->result() as $row1)
                  {
                    ?>
                <ul id="sport" class="flow">
                
                    <li><i class="tiny material-icons">done</i><?php echo($row1->libSous_categ); ?></li>
               
                </ul>
                <?php 
                  }
                  ?>
              </div>
            </div>
          </div>

 <?php
       }
              ?>

            
          
        </div>
        <div class="center-align submit-btn" > <span><a class="green waves-effect waves-light btn">Discover events</a></span></div>
      </div>
      <div class="parallax"><img src=""></div>
    </div>


  <div id="stat" style=" width: auto ; height: 350px; font-size: 90px; background-color:white ;">
    </div>
        <p class="user" style="margin-left: 265px ;margin-top:-50px ; font-size: 25px ;color:Black">Users</p>


    <!--Conctact Form-->
    <div id="contact1" class="parallax-container" style="background: linear-gradient(to right ,#356acc ,#5f1782 );">
      <h3 id="contact-title" class="flow-text content-title" style="color: white ; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Contact </h3>
      <div class="divider"></div>
      <div class="section"></div>
      <div class="container">
        <div id="contact-form" class="row glossy-back">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input id="first_name" type="text" class="validate">
                <label for="first_name">First Name</label>
              </div>
              <div class="input-field col s6">
                <input id="last_name" type="text" class="validate">
                <label for="last_name">Last Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Subject</label>
              </div>
            </div>
          </form>
          <div class="center-align submit-btn"> <span><a type="submit" class="grey darken-4 waves-effect waves-light btn"><i class="fa fa-envelope"> Submit</i></a></span></div>
        </div>
      </div>
      <div class="parallax"><img src=""></div>
    </div>
    <!-- Footer-->
    <footer>
      <div class="footer-copyright grey darken-4">
        <div class="container center-align"><img src="" alt=""></div>
       <!-- <button id="scroll-to-top" style="align-content: right;"> To Top </button> -->


      </div>
    </footer>
  </div>
</body>

</html>


  <script>
            function animateValue(id, start, end, duration) {
            var range = end - start;
            var current = start;
            var increment = end > start? 1 : -1;
            var stepTime = Math.abs(Math.floor(duration / range));
            var obj = document.getElementById(id);
            var timer = setInterval(function() {
                current += increment;
                obj.innerHTML = current;
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }
        <?php
        $q=$this->db->get("sponsor");
        
         ?>
        animateValue("stat", 0 ,<?php echo $q->num_rows() ;?>, 1500);
        </script> 





  