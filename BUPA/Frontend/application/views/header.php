<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BUPA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url().'assets/img/favicon.png' ?>" rel="icon">
  <link href="<?= base_url().'assets/img/apple-touch-icon.png' ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url().'assets/vendor/aos/aos.css ' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/vendor/bootstrap/css/bootstrap.min.css ' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/vendor/bootstrap-icons/bootstrap-icons.css ' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/vendor/boxicons/css/boxicons.min.css ' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/vendor/glightbox/css/glightbox.min.css ' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/vendor/swiper/swiper-bundle.min.css ' ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url().'assets/css/style.css' ?>" rel="stylesheet">

<style>

button {
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

    .faq-heading{
    border-bottom: #777;
    padding: 20px 60px;
}
.faq-container{
display: flex;
justify-content: center;
flex-direction: column;
}
.hr-line{
  width: 60%;
  margin: auto;
  
}
/* Style the buttons that are used to open and close the faq-page body */
.faq-page {
    /* background-color: #eee; */
    color: #444;
    cursor: pointer;
    padding: 30px 20px;
    width: 60%;
    border: none;
    outline: none;
    transition: 0.4s;
    margin: auto;
}
.faq-body{
    margin: auto;
    /* text-align: center; */
   width: 50%; 
   padding: auto;
   
}
/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active,
.faq-page:hover {
    background-color: #F9F9F9;
}
/* Style the faq-page panel. Note: hidden by default */
.faq-body {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
}
.faq-page:after {
    content: '\02795';
    /* Unicode character for "plus" sign (+) */

    color: #777;
    float: right;
    margin-left: 5px;
}
.active:after {
    content: "\2796";
    /* Unicode character for "minus" sign (-) */
}
</style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@bupa</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+254712345678</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo"> 
        <!--<h1><a href="index.html">Reve<span>al</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="/"><img src="<?= base_url().'assets/img/busialogo.jpeg' ?>" alt="" width="200"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url().'Welcome/about' ?>">About Bupa</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url().'Welcome/constitution' ?>">Constitution</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Busia County</a></li>
          <li><a class="nav-link scrollto" href="#team">News Letter</a></li>
          <li><a class="btn-projects scrollto" href="<?= base_url().'Welcome/membership' ?>"><button >Become A Member</button></a></li>
          <li><a class="btn-projects scrollto" href="#contact"><button >Email</button></a></li>
 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
    		<?php
            $msg = $this->session->flashdata('msg');
            if ($msg) {
              # code...
              echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              unset($_SESSION['msg']);
            }


            ?>