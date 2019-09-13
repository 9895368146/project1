<?php error_reporting(0); ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title> Admin</title>
<link  href="<?php echo base_url(); ?>/assets/css_admin/bootstrap.css" rel="stylesheet" type="text/css" >
<link  href="<?php echo base_url(); ?>/assets/css_admin/ad-style.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css_admin/newstyle-ad.css">
<link  href="<?php echo base_url(); ?>/assets/css_admin/font-awesome.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css_admin/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/datepicker/jquery-ui.css" />

<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js_admin/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js_admin/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/assets/js_admin/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/datepicker/jquery-ui.js"></script>


<style>
body,html{
    height: 100%;
  }

  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }

  .main{
    padding: 10px 10px 0 10px;
  }
@media(max-width:767px;){
.cart-icon {
    position: absolute;
    top: -201px !important;
    right: 0 !important;
    color: #e7b151;
}
}


 @media (min-width: 765px) {

    .main{
      position: absolute;
      width: calc(100% - 40px); 
      margin-left: 40px;
      float: right;
    }

    nav.sidebar:hover + .main{
      margin-left: 200px;
    }

    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
      margin-left: 0px;
    }

    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
      text-align: center;
      width: 100%;
      margin-left: 0px;
    }
    
    nav.sidebar a{
      padding-right: 13px;
    }

    nav.sidebar .navbar-nav > li:first-child{
      border-top: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav > li{
      border-bottom: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav .open .dropdown-menu {
      position: static;
      float: none;
      width: auto;
      margin-top: 0;
      background-color: transparent;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
      padding: 0 0px 0 0px;
    }

    .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
      color: #777;
    }

    nav.sidebar{
      width: 200px;
      height: 100%;
      margin-left: 0px;
      float: left;
      margin-bottom: 0px;
    }

    nav.sidebar li {
      width: 100%;
    }

    nav.sidebar:hover{
      margin-left: 0px;
    }

    .forAnimate{
      opacity: 0;
    }
  }
   
  @media (min-width: 1330px) {

    .main{
      width: calc(100% - 200px);
      margin-left: 200px;
    }

    nav.sidebar{
      margin-left: 0px;
      float: left;
    }

    nav.sidebar .forAnimate{
      opacity: 1;
    }
  }

  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
    color: #CCC;
    background-color: transparent;
  }

  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }
 @media (max-width: 765px){
.nav.sidebar  {
    margin-left: 121px !important;
}
} 
 @media (max-width: 765px){
nav.sidebar:hover {
    margin-left: inherit!important;
}
 }
 .collapse {
    display: inherit !important;
}
.glyphicon .glyphicon-user{
	    font-size: 12px !important;
}

.credits{
	position:absolute  !important;
    bottom: 0;
    /* right: 0; */
    display: inline-block !important;
}
.credits p{
	display: flex !important;
    color: #7b7b7b !important;
    margin: 0 ;
}
.credits img{
	    margin-left: 24px;
}
.credits{
    width: inherit !important;
}
</style>


</head>

<body class="offwhite">
<?php
$admin_user_permission = json_decode($this->session->user_data_session->page_admin_users);
$registered_user_permission = json_decode($this->session->user_data_session->page_registered_users);
$category_user_permission = json_decode($this->session->user_data_session->page_category);
$request_user_permission = json_decode($this->session->user_data_session->page_request);

?>


<div class="wrapper ">

<section id="side-bar widget">
<div class="slide-menu brown blur" id="slide-menu">

<span id="tog"><i class="fa fa-chevron-circle-right"></i></span>


<div align="center" class="common">
<nav class="navbar sidebar" role="navigation">
<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
<ul class="main-menu nav navbar-nav">
<li><a href="<?php echo base_url(); ?>index.php/Adminpanel/">Home <i class="fa fa-home"></i></a></li>
<?php if($admin_user_permission[0]==1){ ?>
<li>
  <a href="<?php echo base_url(); ?>index.php/Adminpanel/admin_users"> Admin Users <i class="fa fa-book"></i></a>
</li>
<?php } ?>
<?php if($registered_user_permission[0]==1){ ?>
<li>
  <a href="<?php echo base_url(); ?>index.php/Adminpanel/registered_users"> Registered Users <i class="fa fa-book"></i></a>
</li>
<?php } ?>
<?php if($category_user_permission[0]==1){ ?>
<li>
  <a href="<?php echo base_url(); ?>index.php/Adminpanel/category"> Category <i class="fa fa-book"></i></a>
</li>
<?php } ?>
<?php if($request_user_permission[0]==1){ ?>
<li>
  <a href="<?php echo base_url(); ?>index.php/Adminpanel/request"> Request <i class="fa fa-book"></i></a>
</li>
<?php } ?>




</ul>
</div>
</div>

</div>


</div>
</section>
<section id="modules-top">
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-6"><h2><?php //echo $page; ?></h2></div>

<div class="col-md-6 col-sm-6">




                  <div class="admin-option btn-group pull-right"> <a href="#" class="dropdown-toggle btn btn-default"  data-toggle="dropdown"> <i class="fa fa-gear"> </i> <?php echo $this->session->user_data_session->username; ?></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                      
                      <li><a href="<?php echo base_url(); ?>index.php/Adminpanel/changepassword">Change Password</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/admin/logout" >Logout</a></li>
                    </ul>
                  </div>

            </div>
                  <div class="col-sm-12" style="text-align: center;">
<a href="<?php echo base_url(); ?>index.php/Adminpanel/" style="color:#c1883f;font-weight: 1000;text-decoration: none;" > Home </a>
                  </div>
				  
				  
				  </div>
</div>
</section>
