<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Kartwo</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/company/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/company/fonts/line-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/company/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/company/css/owl.theme.css">
    
    <!-- Animate -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/company/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/company/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/company/css/responsive.css">

  </head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a href="#" class="navbar-brand"><img src="<?php echo base_url(); ?>/upload/userupload/companylogo/<?php echo $companydetails->company_logo; ?>" alt="" class="logo"></a>       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
              <li class="nav-item active">
                <a class="nav-link" href="#hero-area">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">
                  About Us
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#contact">
                  Contact
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar End -->

      <!-- Hero Area Start -->
      <div id="hero-area" class="hero-area-bg">
        <div class="container">      
          <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
              <div class="contents">
                <h2 class="head-title"><?php echo $companydetails->company_name; ?></h2>
                <p><?php echo nl2br($companydetails->short_description); ?></p>
               
              </div>
            </div>
            
          </div> 
        </div> 
      </div>
      <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->

    <!-- Services Section Start -->
	
	
	
    <section id="services" class="section-padding">
      <div class="about-area section-padding bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12 info">
            <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
              <div>
                <div class="site-heading">
                  <h2 class="section-title">About Us</h2>
                </div>
                <div class="content">
                  <?php echo $companydetails->description; ?>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    </section>
	
	
	 <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Products</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
	
	<?php foreach($productdetails as $productdetail){ ?>
	<section  id="product_<?php echo $productdetail->id; ?>" class="section-padding">
	<div class="about-area section-padding bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12 info">
            <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
              <div>
                <div class="site-heading">
                  <h2 class="section-title"><?php echo $productdetail->title ?></h2>
                </div>
                <div class="content">
                  <?php echo $productdetail->description; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <img class="img-fluid" src="<?php echo base_url(); ?>/upload/userupload/productpic/<?php echo $productdetail->product_pic; ?>" alt="" >
          </div>
        </div>
      </div>
    </div>
	</section>
	
	<?php } ?>
	
	

    <section id="contact" class="section-padding bg-gray">    
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Countact Us</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
		<p style="color:red;"><?php echo $this->session->flashdata('message'); ?></p>
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.3s">   
          <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="contact-block">
              <form action="<?php echo base_url(); ?>index.php/company/sendmessage" method="post">
			  <input type="hidden" name="tomail" value="<?php echo $companydetails->email; ?>">
			  <input type="hidden" name="user_id" value="<?php echo $companydetails->user_id;; ?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" placeholder="Subject" id="msg_subject" name="subject" class="form-control" required data-error="Please enter your subject">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="7" data-error="Write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button text-left">
                      <button class="btn btn-common" id="form-submit" type="submit">Send Message</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div> 
                      <div class="clearfix"></div> 
                    </div>
                  </div>
                </div>            
              </form>
            </div>
          </div>
          <!--<div class="col-lg-5 col-md-12 col-xs-12">
            <div class="map">
              <?php echo nl2br($companydetails->address); ?>
            </div>
          </div>-->
        </div>
      </div> 
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Start -->
    <footer id="footer" class="footer-area section-padding">
      <div class="container">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="footer-logo"><img src="<?php echo base_url(); ?>/upload/userupload/companylogo/<?php echo $companydetails->company_logo; ?>" alt="" class="logo"></h3>
                <div class="textwidget">
                  <p><?php echo nl2br($companydetails->short_description); ?></p>
                </div>
                <!--<div class="social-icon">
                  <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
                  <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
                  <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                  <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
                </div>-->
              </div>
            </div>
			
			<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <!--<h3 class="footer-titel">Resources</h3>
              <ul class="footer-link">
                <li><a href="#">Payment Options</a></li>
                <li><a href="#">Fee Schedule</a></li>
                <li><a href="#">Getting Started</a></li>
                <li><a href="#">Identity Verification</a></li>
                <li><a href="#">Card Verification</a></li>
              </ul>-->
            </div>
			
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">Products</h3>
              <ul class="footer-link">
			  <?php foreach($productdetails as $productdetail){ ?>
                <li><a href="#product_<?php echo $productdetail->id; ?>"><?php echo $productdetail->title; ?></a></li>
               
			  <?php } ?>				
              </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel">Contact</h3>
              <ul class="address">
                <li>
                  <a href="#"><i class="lni-map-marker"></i> <?php echo nl2br($companydetails->address); ?></a>
                </li>
                <li>
                  <a href="#"><i class="lni-phone-handset"></i>  <?php echo $companydetails->phone; ?></a>
                </li>
                <li>
                  <a href="#"><i class="lni-envelope"></i>  <?php echo $companydetails->email; ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>  
      </div> 
       
    </footer> 
    <!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="lni-arrow-up"></i>
    </a>
    
    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>/assets/company/js/jquery-min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/wow.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/jquery.nav.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/scrolling-nav.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/jquery.easing.min.js"></script>  
    <script src="<?php echo base_url(); ?>/assets/company/js/main.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/form-validator.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/company/js/contact-form-script.min.js"></script>
	
	
      
  </body>
</html>
