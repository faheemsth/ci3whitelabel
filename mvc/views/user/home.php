<!doctype html>
<html class="no-js" lang="en">
    

<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Society Of Ultrasound In Pakistan">
        <meta name="keywords" content="Society Of Ultrasound In Pakistan">
        <meta name="author" content="marveltheme.com">
		
        <title>Society of Ultrasound in Pakistan</title>
		
		<!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://ultrasoundpak.com/wp-content/uploads/2023/01/cropped-WhatsApp-Image-2023-01-06-at-9.00.36-PM-180x180.jpeg">
        
		<!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">
		<!-- style css -->
		<link rel="stylesheet" href="<?= base_url() ?>/assets/landing/style.css">
		<!-- modernizr js -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/vendor/modernizr-2.8.3.min.js"></script>
		
    </head>
    <body>
      
		
		<!-- New Section -->
		<header class="header-section header-bg w-100 position-fixed" id="active-sticky">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="header-top-left" style="float:right;">
                                <ul>
                                    <li><a href="#"><i class="fa fa-laptop"></i> Webinars</a></li>
                                    <li><a href="https://portal.ultrasoundpak.com/signin/index"><i class="ti-user"></i> Login</a></li>
                                    <li><a href="https://portal.ultrasoundpak.com/user/register"><i class="ti-plus"></i> Join Now</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
		    <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                          <a class="navbar-brand logo-smg" href="https://ultrasoundpak.com/"><img src="https://ultrasoundpak.com/wp-content/uploads/2023/01/WhatsApp_Image_2023-01-06_at_9.00.36_PM-removebg-preview.png" alt="Logo"><h4 style="font-size: 15px;margin-top: -41px;margin-left: 81px;">Society of Ultrasound in Pakistan</h4></a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="ti-menu"></span>
                          </button>
                          <div class="navbar-custom collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                              
                              <li class="nav-item ">
                                <a class="nav-link" href="https://ultrasoundpak.com/">
                                  HOME
                                </a>
                                
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://ultrasoundpak.com/about-us">ABOUT US</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://ultrasoundpak.com/resources">RESOURCES</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://ultrasoundpak.com/certification">CERTIFICATION</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://ultrasoundpak.com/learning">LEARNING</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="https://ultrasoundpak.com/contact">CONTACT US</a>
                              </li>
                             
                            </ul>
                          </div>
                       </nav>
		            </div>
		        </div>
		    </div>
		</header>
       
		<!-- End Section -->
		
		<!-- Start Section -->
		<div class="team-section section-padding" style="margin-bottom: 60px;">
		    <div class="container-fluid ">
                <div class="row justify-content-center " style="background-color:#007a3d">
                	
                		<div class="col-lg-12">
		                <div class="container">
		                	<div class="row">
		                		<div class="col-lg-12">
		                			<div class="text-head text-center " style="margin-top: 30px; margin-bottom: 30px;">
		                  <h1 style="color: #fff; margin-bottom: 0px; text-align: center;">Members at Society of Ultrasound in Pakistan</h1>  
		                </div>
		                		</div>
		                	</div>
		                </div>
		            </div>
                	</div>
		            
		        </div>
		        <div class="container">
		        <div class="row justify-content-center">
		        	<?php

		        	if(customCompute($membertype)) { 
		        	$i = 1;

		                foreach($membertype as $membertypes) { ?>
		            <div class="col-lg-3">
		                <div class="team-member text-center">
		         
		                    <div class="member-intro">
		                        <p style="color: #555;text-align: justify; font-size: 17px; font-weight: 500;"><?php echo $membertypes->regtype; ?><hr></p>
                               <ul>
                               	<?php
						        	if(customCompute($users)) { 
						        	$j = 1;

		                			foreach($users as $user) {
		                			if($membertypes->regtypeID==$user->membertype) {
		                			$isexpired="";
		                			if($membertypes->tenure == 0){

		                				$counttime= date('Y-m-d', strtotime("+1 months", strtotime($user->member_since)));
		                				
		                			}
		                			if($membertypes->tenure == 1){

		                				$counttime= date('Y-m-d', strtotime("+6 months", strtotime($user->member_since)));
		                				
		                			}
		                			if($membertypes->tenure == 2){

		                				$counttime= date('Y-m-d', strtotime("+12 months", strtotime($user->member_since)));
		                				
		                			}
		                			if($membertypes->tenure == 3){

		                				$counttime= date('Y-m-d', strtotime("+36 months", strtotime($user->member_since)));
		                				
		                			}
		                			if($membertypes->tenure == 4){

		                				$counttime= date('Y-m-d', strtotime("+60 months", strtotime($user->member_since)));
		                				
		                			}
		                			if($membertypes->tenure == 5){

		                				$counttime= date('Y-m-d', strtotime("+120 months", strtotime($user->member_since)));
		                				
		                			}
		                			if(date('Y-m-d')>=$counttime){
		                				$isexpired = ' - <span style="color: #FF0000">Expired</span>';
		                			}
		                			?>
                               	<li>
                               		
                               		<p style="text-align: justify;"><?php echo $j?>. <span style="color:#007a3d; text-transform: capitalize;" ><?php echo $user->name.', '.$user->city.$isexpired ?></span></p>
                               	</li>
                               	 <?php   $j++;}}}?>
                               </ul>
		                    </div>
		               
		                </div>
		            </div>
		            <?php   $i++;}}?>
		        </div>
		    </div>
		</div>
		<!-- End Section -->
<!-- Start Section -->
		<div class="footer-section section-padding">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-6 col-sm-6">
		                <div class="footer-set">
		                    <div class="footer-logo logo-smg">
		                        <a href="index.html"><img src="assets/img/logo.png" alt=""></a>
		                    </div>
		                    <div class="footer-address">
		                        <ul>
		                            <li><h4 style="color: #fff;">SOCIETY OF ULTRASOUND IN PAKISTAN</h4></li>
		                            <li></span>The provision of advice and information regarding Ultrasound to the public at large scale.</li>
		                            <li><span class="ti-headphone-alt"></span>+92-342-4707368</li>
		                            <li><span class="ti-email"></span>info@ultrasoundpak.com</li>
		                            <li><span class="ti-location-pin"></span> 54-A Muhafiz Town, Phase-1, Near DHA EME, Lahore, Punjab 54000</li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		            <div class="col-lg-3 col-sm-6">
		                <div class="footer-set">
		                    <div class="footer-head">
		                        <h3>Quick Link</h3>
		                    </div>
		                    <div class="footer-menu">
		                        <ul>
		                           <li >
                                <a class="nav-link" href="https://ultrasoundpak.com/about-us">ABOUT US</a>
                              </li>
                              <li >
                                <a class="nav-link" href="https://ultrasoundpak.com/resources">RESOURCES</a>
                              </li>
                              <li >
                                <a class="nav-link" href="https://ultrasoundpak.com/certification">CERTIFICATION</a>
                              </li>
                              <li>
                                <a class="nav-link" href="https://ultrasoundpak.com/learning">LEARNING</a>
                              </li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		            <div class="col-lg-3 col-sm-6">
		                <div class="footer-set">
		                    <div class="footer-head">
		                        <h3>About us</h3>
		                    </div>
		                    <div class="footer-menu">
		                        <ul>
		                            <li><a href="#">ACCESSIBILITY</a></li>
		                            <li><a href="#">TERMS OF USE</a></li>
		                            <li><a href="#">PRIVACY POLICY</a></li>
		                           
		                        </ul>
		                    </div>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>
		<!-- End Section -->
        <!-- Start Section -->
		<div class="copyright-section">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="copyright text-left">
		                    <p>Copyright ©2002 All Rights Reserved</p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- End Section -->
		

		
		
		
		
		<!-- All JS Here -->
		<!-- jQuery Latest Version -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/vendor/jquery-1.12.4.min.js"></script>
		<!-- Bootstrap JS -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/bootstrap.min.js"></script>
		<!-- Form Validate -->
         <script src="<?= base_url() ?>/assets/landing/assets/js/jquery.validate.min.js"></script>
		<!-- isotope JS -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/isotope.pkgd.min.js"></script>
		<!-- Wow JS -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/wow.min.js"></script>
		<!-- Mailchimp JS -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- counterup JS -->
        <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js"></script>
        <script src="<?= base_url() ?>/assets/landing/assets/js/jquery.counterup.min.js"></script>
		<!-- Veno Box JS -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/venobox.min.js"></script>
		<!-- slick slider js -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/slick.min.js"></script>
		<!-- Plugins JS -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/plugins.js"></script>
		<!-- main JS -->
        <script src="<?= base_url() ?>/assets/landing/assets/js/main.js"></script>
		
    </body>


</html>