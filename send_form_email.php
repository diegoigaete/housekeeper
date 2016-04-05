<?php

if(isset($_POST['email'])) {

  // EDIT THE 2 LINES BELOW AS REQUIRED
  $email_to = "diego.i.gaete@gmail.com";
  $email_subject = "Your email subject line";

  function died($error) {
    // your error code can go here
    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
      die();
    }

    // validation expected data exists
    if(!isset($_POST['first_name']) || !isset($_POST['email']) || !isset($_POST['telephone']) || !isset($_POST['comments'])) {
      died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $first_name = $_POST['first_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
      $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {
      $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }

    if(strlen($comments) < 2) {
      $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }

    if(strlen($error_message) > 0) {
      died($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->
    <!DOCTYPE html>
    <html>
    <head>
    <title>HouseKeeper - Limpieza es Calidad de Vida</title>
    <link rel="icon" href="images/hk_favicon.jpg" sizes="16x16 32x32" type="image/jpg"> (1 size)
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="cleaning, aseo, limpieza, limpiar, empresas, servicios, hotel, hoteleria, restaurants, calidad" />
    <!-- css links -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/caption-hover.css" />
    <link rel="stylesheet" type="text/css" href="css/circle-hover.css" />
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <!-- /css links -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <script src="js/SmoothScroll.min.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#myPage"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
    			<ul class="nav navbar-nav navbar-right">
    				<li><a href="index.html#myPage">Home</a></li>
    				<li><a href="index.html#about">Quienes Somos</a></li>
    				<li><a href="index.html#services">Servicios</a></li>
    				<!-- li class="active"><a href="#portfolio">Servicios</a></li -->
    				<li><a href="index.html#contact">Contacto</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        <!-- /Fixed navbar -->
        <section class="contact-form" id="contact-info">
          <p class="text-center slideanim">Gracias! Estaremos en contacto contigo muy pronto.</p>
        </section>
        <!-- /Contact-Form -->
        <!-- Footer -->
        <footer class="text-center slideanim">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h4>"No hay como el orden para enseñar a ganar tiempo"</h4>
                            <p></p>
                        </div>
                        <div class="footer-col col-md-4">
                            <h4 style="font-family: 'Raleway', sans-serif;">Encuentranos en la Web</h4>
                            <ul class="list-inline">
                                <li>
                                    <a href="http://www.facebook.com/housekeepercl" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="http://www.instagram.com/housekeepercl" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="http://www.twitter.com" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4">
                            <h4>"Aseo es cultura, y el reflejo de tu interior"</h4>
                            <p></p>
                        </div>
                    </div>
                </div>
        	</div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>© 2016. HouseKeeper. All Rights Reserved. Web Implementation by diegoigaete. 'Vegetable Farm' Design by <a href="https://w3layouts.com/" target="_blank">W3layouts</a></p>
                        </div>
                    </div>
                </div>
        		<a href="#myPage" title="To Top">
        			<span class="glyphicon glyphicon-chevron-up"></span>
        		</a>
            </div>
        </footer>
        <!-- js files -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/TweenMax.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/index2.js"></script>
        <script>
        $(document).ready(function(){
          // Add smooth scrolling to all links in navbar + footer link
          $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
            });
          });
        })
        </script>
        <script>
        $(window).scroll(function() {
          $(".slideanim").each(function(){
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
              $(this).addClass("slide");
            }
          });
        });
        </script>
        <!-- /js files -->
        </body>
        </html>
    <?php
  }
?>
