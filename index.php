<?php

require_once("config.php");
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("connection failed");
session_start();
$has_session_user = 0;
if(isset($_SESSION['user'])) {
    $has_session_user = 1;
    $uid = $_SESSION['uuid'];
    $li = '<li><a href="profile.php">Profile</a></li>
		<li><a href="logout.php">Logout</a></li>';
} else {
	$li = '<li><a href="#section-register" class="to-register">Register</a></li>';
}
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1800;

if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
  session_unset();     
  session_destroy();
  session_start();    
}
$_SESSION['LAST_ACTIVITY'] = $time;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Page Title -->
	<title>Entreprenia 16</title>
<!-- /Page title -->

<!-- Seo Tags -->
	<meta name="description" content="Your page description here" />
	<meta name="keywords" content="Your meta keywords, here"/>
	<meta name="robots" content="index, follow"> 
<!-- /Seo Tags -->

<!-- Favicon and Touch Icons
========================================================= -->
	<link rel="shortcut icon" href="img/favicon2.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon2.ico" type="image/x-icon">
<!-- /Favicon
========================================================= -->

<!-- >> CSS
============================================================================== -->
	<!-- Bootstrap styles -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- /Bootstrap Styles -->
	<!-- Google Web Fonts 
	<link href='https://fonts.googleapis.com/css?family=Hind:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	 /google web fonts -->
	<!-- owl carousel -->
	<link href="vendor/owl.carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="vendor/owl.carousel/owl-carousel/owl.theme.css" rel="stylesheet">
	<!-- /owl carousel -->
	<!-- fancybox.css -->
	<link href="vendor/fancybox/jquery.fancybox.css" rel="stylesheet">
	<!-- /fancybox.css -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
	<!-- /Font Awesome -->
	<!-- Main Styles -->
	<link href="css/styles.css" rel="stylesheet">
	<!-- /Main Styles -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- >> /CSS
============================================================================== -->
</head>

<body>
<input type=hidden id="user_session" value="<?=$has_session_user;?>"/>
<!-- Page Loader
========================================================= -->
<div class="loader-container" id="page-loader"> 
  <div class="loading-wrapper loading-wrapper-hide">
  	<div class="loader-animation" id="loader-animation">
  		<svg class="svg-loader" width=100 height=100>
		  <circle cx=50 cy=50 r=25 />
		</svg>
  	</div>    
    <!-- Edit With Your Name -->
    <div class="loader-name" id="loader-name">
      <img src="img/logo.png" alt="">
    </div>
    <!-- /Edit With Your Name -->
    <!-- Edit With Your Job -->
    <p class="loader-job" id="loader-job">September 24-25 2016 @ NSSCE,PALAKKAD</p>
    <!-- /Edit With Your Job -->
  </div>   
</div>
<!-- /End of Page loader
========================================================= -->

<!-- Header
================================================== -->
<header id="header" class="">
	<div class="container">
		<!-- logo -->
		<div class="header-logo" id="header-logo">
			<img src="img/logo.png" alt=""/>
		</div>
		<!-- /logo -->
		<!-- MAIN MENU -->
	    <nav class="">
	      <ul class="hd-list-menu">
	        <li class="active"><a href="#main-carousel">Intro</a></li>
	        <li><a href="#section-event-infos">About </a></li>
	        <li><a href="#section-blog">Events</a></li>
	        <li><a href="#section-schedule">Schedule</a></li>
	        <li><a href="#section-speakers">Speakers</a></li>	                
	        <li><a href="#section-testimonials">Testimonials</a></li>
	        <li><a href="#section-sponsors">Sponsors</a></li>
	        <li><a href="#section-faq">FAQ</a></li>
	        <li><a href="#section-prices">Prices</a></li>
	        <?=$li;?>
	      </ul> 
	    </nav>
	    <!-- /MAIN MENU -->
	</div>	
</header>
<!-- /Header
================================================== -->


<div class="page-wrapper">
	
	<div id="body-content">

		<!-- SECTION: Intro
		================================================== -->
		<div class="owl-carousel main-carousel" id="main-carousel">

			<!-- slide -->
			<div class="main-intro" style="background-image: url('img/bgmask3.png');">

				<div class="container">	
					<div class="intro-content-wrapper viewport">
						<!-- INTRO CONTENT -->
						<!-- Adjust the margin-top in style atribute according to content to keep always centered vertically-->
						<div class="intro-content intro-content-slide1">
							<!-- row -->
							<div class="row">
								<!-- col -->
								<div class="col-sm-12">
									<!-- event logo -->
									<div class="ic-logo">
										<img src="img/intro-logo.png" alt="">
									</div>	
									<!-- /event logo -->
									<!-- Event Infos -->
									<div class="ic-infos">
										<p>September 24-15 2016 @ NSSCE ,PALAKKAD</p>
									</div>
									<!-- /Event Infos -->								
									<!-- Register Form -->
									<div class="intro-register-form-text">
										<p>- Register now and guarantee your seat! -</p>
									</div>
									<!--form class="form" id="intro-register-form">
									
										<div class="ic-register">						
											<div class="row">
												<div class="col-sm-4 ic-register-col">
													<input type="text" class="form-control" placeholder="Your Name" name="if-name" id="if-name"/>
													<div class="ic-register-ico">
														<i class="fa fa-user"></i>
													</div>					
												</div>
												<div class="col-sm-4 ic-register-col">
													<input type="text" class="form-control" placeholder="Your Email" name="if-email" id="if-email"/>
													<div class="ic-register-ico">
														<i class="fa fa-envelope"></i>
													</div>					
												</div>
												<div class="col-sm-4 ic-register-col">
													<input type="text" class="form-control" placeholder="Your Phone" name="if-phone" id="if-phone"/>
													<div class="ic-register-ico">
														<i class="fa fa-phone"></i>
													</div>					
												</div>
											</div>
											<input type="hidden" value="A New Event Register!" name="subject" id="if-subject">																				
										</div>	
										
										<div class="ic-buttons">
											<button type="submit" class="btn"><i class="fa fa-paper-plane"></i> &nbsp; register now</button> <a href="https://www.youtube.com/embed/dorZ3vag5PI?autoplay=1" class="fancybox btn"><i class="fa fa-play"></i> &nbsp;Watch Video</a>
										</div>	
									</form>	
									 /Register Form -->							
								</div>
								<!-- /col -->
							</div>
							<!-- /row -->						
															
						</div>	
						<!-- /INTRO CONTENT -->					
					</div>							
				</div>
			</div>
			<!-- /slide -->

			<!-- slide -->
			<div class="main-intro" style="background-image: url('img/bg4.jpg');">
				<div class="container">						
					<div class="intro-content-wrapper viewport">
						<!-- Main Title -->
						<!-- Adjust the margin-top in css according to content to keep always centered vertically-->
						<div class="intro-content countdown-wrapper intro-content-slide2">
							<p class="countdown-title">Remaining time for the event</p>
							<!-- countDown -->
							<div id="countdown" class="row"></div>
							<!-- /countDown -->			
							<a href="#section-register" class="btn to-register"><i class="fa fa-paper-plane"></i> &nbsp; register now</a>
						</div>
						<!-- /Main Title -->
					</div>			
				</div>
			</div>
			<!-- /slide -->

			<!-- slide -->
			<div class="main-intro" style="background-image: url('img/bg3b.jpg');">
				<div class="container">						
					<div class="intro-content-wrapper viewport">
						<!-- Adjust the margin-top in css according to content to keep always centered vertically-->
						<div class="intro-content intro-content-slide3">
							<!-- row -->
							<div class="row">
								<!-- col -->
								<div class="col-md-10 col-md-offset-1">
									<img src="img/globe.png" alt="">
									<h1 class="intro-title1">ENTREPRENIA</h1>
									<p>Entreprenia is one of its Kind ENTREPRENEURSHIP Summit Held at NSS College of Engineering ,Palakkad ,Kerala. We aim to develop the entrepreneurship spirit and culture in the people in our country by providing a platform for the startups to get nurtured into a company..</p>
									<!-- Buttons -->
									<div class="ic-buttons">
										<a href="#section-register" class="btn to-register"><i class="fa fa-paper-plane"></i> &nbsp; register now</a>
									</div>
									<!-- /Buttons -->
								</div>
								<!-- /col -->
							</div>
							
							<!-- /row -->						
						</div>
					</div>			
				</div>
			</div>
			<!-- /slide -->
		</div>		
		<!-- /SECTION: Intro
		================================================== -->

		<!-- SECTION: Event Infos
		================================================== -->
		<div class="section-event-infos inverted-section" id="section-event-infos">
			<div class="container-fluid">
				<div class="event-infos row">
					<!-- date -->
					<div class="event-info-col">
						<div class="event-info-ico"><span class="fa fa-calendar"></span></div>
						<h3 class="main-title3">Date:</h3>
						<p>September 24-25, 2016</p>
					</div>
					<!-- /date -->
					<!-- Time -->
					<div class="event-info-col">
						<div class="event-info-ico"><span class="fa fa-location-arrow"></span></div>
						<h3 class="main-title3">Location:</h3>
						<p>NSS COLLEGE OF ENGINEERING , PALAKKAD</p>
					</div>
					<!-- /Time -->
					<!-- Time -->
					<div class="event-info-col">
						<div class="event-info-ico"><span class="fa fa-ticket"></span></div>
						<h3 class="main-title3">Remaining</h3>
						<p><strong>245</strong> Tickets</p>
					</div>
					<!-- /Time -->
					<!-- Time -->
					<div class="event-info-col">
						<div class="event-info-ico"><span class="fa fa-microphone"></span></div>
						<h3 class="main-title3">Speakers</h3>
						<p><strong>22</strong> Professional Speakers</p>
					</div>
					<!-- /Time -->
				</div>
			</div>
		</div>			
		<!-- SECTION: /Event Infos
		================================================== -->	


		<!-- SECTION: Event Description
		================================================== -->
		<div class="section-about" id="section-about">
			<div class="container-fluid">
				<div class="row">
					<!-- Left Column -->
					<div class="about-picture-wrapper">
						<div class="about-picture" id="about-picture">
							<img src="img/ent15.jpg" alt="" class="responsive-image">
						</div>
					</div>				
					<!-- /Left Column -->
					<!-- Right Column -->
					<div class="about-text-wrapper"> 
						<div class="about-text" id="about-text">
							<h1 class="title3 title-border"><i class="fa fa-dot-circle-o"></i> About Entreprenia</h1>
							<div class="about-text-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales varius sagittis. Proin a arcu vitae turpis congue facilisis. Quisque a lectus pretium, sagittis augue in, fringilla risus. Quisque elementum, ante a maximus commodo, dui metus imperdiet mi, sit amet tempor lectus erat ac orci. Mauris suscipit rhoncus lobortis. Quisque tincidunt nisi libero. Fusce nec turpis quis enim finibus porta. Donec eget sapien ac leo tempor elementum a at ante.</p>
							</div>							
							<a href="#section-schedule" class="btn btn-nobg"><i class="fa fa-calendar"></i> See Event Schedule</a> <a href="#section-register" class="btn btn-nobg to-register"><i class="fa fa-paper-plane"></i> Register</a>
						</div>
					</div>
					<!-- /Right Column -->
				</div>
			</div>
		</div>
		<!-- /SECTION: Event Description
		================================================== -->



		<div class="section-blog section-padding inverted-section2" id="section-blog">
			<div class="container">

				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Talks</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reprehenderit repellendus cum nobis rem, tempore aut reiciendis placeat labore molestiae quidem tempora voluptatibus id! Amet, sed facilis voluptatibus nulla quam!</p>
				</div>				
				<!-- /Section title -->



				<div id="blog-itens-container">
					<?php
                            try {
                                $query = mysqli_query($mysqli, "Select * from events where category='talks'");

                                while($row = mysqli_fetch_array($query)) {
                                    echo '<!-- blog-item -->
										<div class="blog-item">
											<div class="blog-item-wrapper">
												<!-- blog item thumbnail -->
												<div class="blog-item-thumb">
													<a href="events.php?id='.$row['id'].'" class=""><img src="img/events/'.$row['event_image'].'" alt=""></a>
												</div>
												<!-- /blog item thumbnail -->
												<!-- Blog item - infos -->
												<div class="blog-item-infos">
													<!-- blog-item-title -->
													<div class="blog-item-title-wrapper">
														<h2 class="blog-item-title title-border"><a href="events.php?id='.$row['id'].'" class="">'.$row['event_name'].'</a></h2>
													</div>
													<!-- /blog-item-title -->
													<!-- blog item - description -->
													<div class="blog-item-description">
														<p><a href="events.php?id='.$row['id'].'" class=""></a></p>
													</div>
													<!-- /blog-item-description -->
													<!-- blog item - link -->
													<div class="blog-item-link">
														<a href="events.php?id='.$row['id'].'" class=" btn btn-nobg">See More</a>
													</div>
													<!-- /blog item - link -->
												</div>
												<!-- /blog item - infos -->
											</div>
										</div>
										<!-- /blog-item -->';
                                    }
                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                            ?>
				</div>
				
			</div>
		</div>

		<div class="section-blog section-padding inverted-section2" id="section-blog">
			<div class="container">

				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Competitions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reprehenderit repellendus cum nobis rem, tempore aut reiciendis placeat labore molestiae quidem tempora voluptatibus id! Amet, sed facilis voluptatibus nulla quam!</p>
				</div>				
				<!-- /Section title -->



				<div id="blog-itens-container1">
					<?php
                            try {
                                $query = mysqli_query($mysqli, "Select * from events where category='competition'");

                                while($row = mysqli_fetch_array($query)) {
                                    echo '<!-- blog-item -->
										<div class="blog-item">
											<div class="blog-item-wrapper">
												<!-- blog item thumbnail -->
												<div class="blog-item-thumb">
													<a href="events.php?id='.$row['id'].'" class=""><img src="img/events/'.$row['event_image'].'" alt=""></a>
												</div>
												<!-- /blog item thumbnail -->
												<!-- Blog item - infos -->
												<div class="blog-item-infos">
													<!-- blog-item-title -->
													<div class="blog-item-title-wrapper">
														<h2 class="blog-item-title title-border"><a href="events.php?id='.$row['id'].'" class="">'.$row['event_name'].'</a></h2>
													</div>
													<!-- /blog-item-title -->
													<!-- blog item - description -->
													<div class="blog-item-description">
														<p><a href="events.php?id='.$row['id'].'" class=""></a></p>
													</div>
													<!-- /blog-item-description -->
													<!-- blog item - link -->
													<div class="blog-item-link">
														<a href="events.php?id='.$row['id'].'" class=" btn btn-nobg">See More</a>
													</div>
													<!-- /blog item - link -->
												</div>
												<!-- /blog item - infos -->
											</div>
										</div>
										<!-- /blog-item -->';
                                    }
                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                            ?>
				</div>
				
			</div>
		</div>

		<div class="section-blog section-padding inverted-section2" id="section-blog">
			<div class="container">

				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Workshops</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reprehenderit repellendus cum nobis rem, tempore aut reiciendis placeat labore molestiae quidem tempora voluptatibus id! Amet, sed facilis voluptatibus nulla quam!</p>
				</div>				
				<!-- /Section title -->



				<div id="blog-itens-container2">
					<?php
                            try {
                                $query = mysqli_query($mysqli, "Select * from events where category='workshop'");

                                while($row = mysqli_fetch_array($query)) {
                                    echo '<!-- blog-item -->
										<div class="blog-item">
											<div class="blog-item-wrapper">
												<!-- blog item thumbnail -->
												<div class="blog-item-thumb">
													<a href="events.php?id='.$row['id'].'" class=""><img src="img/events/'.$row['event_image'].'" alt=""></a>
												</div>
												<!-- /blog item thumbnail -->
												<!-- Blog item - infos -->
												<div class="blog-item-infos">
													<!-- blog-item-title -->
													<div class="blog-item-title-wrapper">
														<h2 class="blog-item-title title-border"><a href="events.php?id='.$row['id'].'" class="">'.$row['event_name'].'</a></h2>
													</div>
													<!-- /blog-item-title -->
													<!-- blog item - description -->
													<div class="blog-item-description">
														<p><a href="events.php?id='.$row['id'].'" class=""></a></p>
													</div>
													<!-- /blog-item-description -->
													<!-- blog item - link -->
													<div class="blog-item-link">
														<a href="events.php?id='.$row['id'].'" class=" btn btn-nobg">See More</a>
													</div>
													<!-- /blog item - link -->
												</div>
												<!-- /blog item - infos -->
											</div>
										</div>
										<!-- /blog-item -->';
                                    }
                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                            ?>
				</div>
				
			</div>
		</div>

		<div class="section-blog section-padding inverted-section2" id="section-blog">
			<div class="container">

				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Panel Discussions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reprehenderit repellendus cum nobis rem, tempore aut reiciendis placeat labore molestiae quidem tempora voluptatibus id! Amet, sed facilis voluptatibus nulla quam!</p>
				</div>				
				<!-- /Section title -->



				<div id="blog-itens-container3">
				<?php
                            try {
                                $query = mysqli_query($mysqli, "Select * from events where category='panel'");

                                while($row = mysqli_fetch_array($query)) {
                                    echo '<!-- blog-item -->
										<div class="blog-item">
											<div class="blog-item-wrapper">
												<!-- blog item thumbnail -->
												<div class="blog-item-thumb">
													<a href="events.php?id='.$row['id'].'" class=""><img src="img/events/'.$row['event_image'].'" alt=""></a>
												</div>
												<!-- /blog item thumbnail -->
												<!-- Blog item - infos -->
												<div class="blog-item-infos">
													<!-- blog-item-title -->
													<div class="blog-item-title-wrapper">
														<h2 class="blog-item-title title-border"><a href="events.php?id='.$row['id'].'" class="">'.$row['event_name'].'</a></h2>
													</div>
													<!-- /blog-item-title -->
													<!-- blog item - description -->
													<div class="blog-item-description">
														<p><a href="events.php?id='.$row['id'].'" class=""></a></p>
													</div>
													<!-- /blog-item-description -->
													<!-- blog item - link -->
													<div class="blog-item-link">
														<a href="events.php?id='.$row['id'].'" class=" btn btn-nobg">See More</a>
													</div>
													<!-- /blog item - link -->
												</div>
												<!-- /blog item - infos -->
											</div>
										</div>
										<!-- /blog-item -->';
                                    }
                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                            ?>
					
				</div>
				
			</div>
		</div>


		<!-- SECTION: Event Schedule
		================================================== -->
		<div class="section-schedule section-bg-left" id="section-schedule">
			<div class="container">

				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section"><span class="title-section-bg">Event Schedule <small></small></span></h2>
				</div>
				<!-- /Section title -->


				
				<!-- TABS -->
				<div class="tabs">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-2 schedule-tab-links-wrapper">
							<!-- Tab links -->
							<ul class="tab-links schedule-tab-links">
						        <li class="active"><a href="#schedule-tab1"><span class="fa fa-calendar"></span>&nbsp;&nbsp; Venue 1</a></li>
						        <li><a href="#schedule-tab2"><span class="fa fa-calendar"></span>&nbsp;&nbsp; Venue 2</a></li>
						        <li><a href="#schedule-tab3"><span class="fa fa-calendar"></span>&nbsp;&nbsp; Venue 3</a></li>
						        <li><a href="#schedule-tab4"><span class="fa fa-calendar"></span>&nbsp;&nbsp; Venue 4</a></li>
						        <li><a href="#schedule-tab5"><span class="fa fa-calendar"></span>&nbsp;&nbsp; Venue 5</a></li>
						    </ul>
						    <!-- /Tab Links -->
						</div>
					</div>
					
						
					<!-- Schedule Tabs -->
				    <div class="schedule-tabs">
				    	<!-- Schedule Tab -->
				    	<div class="schedule-tab tab" id="schedule-tab1">
				    		<!-- schedule list -->
				    		<div class="schedule-list">

								<!-- Schedule itens header -->
								<div class="schedule-item-header">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-top">
												<div class="schedule-item-bar schedule-item-bar-top"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens header -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img1.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">Welcome and Registration</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img2.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">Improving your CSS</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img3.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">11:30 - 13:00</h4>
															<h3 class="schedule-item-title">The future of internet</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img4.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">14:00 - 16:30</h4>
															<h3 class="schedule-item-title">The power of networking</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule itens footer -->
								<div class="schedule-item-footer">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-bottom">
												<div class="schedule-item-bar schedule-item-bar-bottom"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens footer -->
							</div>
				    		<!-- /schedule list -->
				    	</div>
				    	<!-- /Schedule Tab -->

				    	<!-- Schedule Tab -->
				    	<div class="schedule-tab tab" id="schedule-tab2">
				    		<!-- schedule list -->
				    		<div class="schedule-list">
				    			
								<!-- Schedule itens header -->
								<div class="schedule-item-header">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-top">
												<div class="schedule-item-bar schedule-item-bar-top"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens header -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img5.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">16:30 - 18:00</h4>
															<h3 class="schedule-item-title">Welcome Breakfast</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img6.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">Angular JS workshop</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img1.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">How to be a successful freelancer</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule itens footer -->
								<div class="schedule-item-footer">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-bottom">
												<div class="schedule-item-bar schedule-item-bar-bottom"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens footer -->
							</div>
				    		<!-- /schedule list -->
				    	</div>
				    	<!-- /Schedule Tab -->

				    	<!-- Schedule Tab -->
				    	<div class="schedule-tab tab" id="schedule-tab3">
				    		<!-- schedule list -->
				    		<div class="schedule-list">
				    			
								<!-- Schedule itens header -->
								<div class="schedule-item-header">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-top">
												<div class="schedule-item-bar schedule-item-bar-top"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens header -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img2.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">The power of a team</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img3.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">11:30 - 12:30</h4>
															<h3 class="schedule-item-title">App Development workshop</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img4.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">Welcome & Registration</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img5.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">14:00 - 15:30</h4>
															<h3 class="schedule-item-title">How to be the leader</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img6.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">15:30 - 17:00</h4>
															<h3 class="schedule-item-title">MEAN Workshop</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img1.jpg" alt="">
														</div>											
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">17:00 - 18:00</h4>
															<h3 class="schedule-item-title">Closing party</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->	

								<!-- Schedule itens footer -->
								<div class="schedule-item-footer">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-bottom">
												<div class="schedule-item-bar schedule-item-bar-bottom"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens footer -->

							</div>
				    		<!-- /schedule list -->
				    	</div>
				    	<div class="schedule-tab tab" id="schedule-tab4">
				    		<!-- schedule list -->
				    		<div class="schedule-list">
				    			
								<!-- Schedule itens header -->
								<div class="schedule-item-header">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-top">
												<div class="schedule-item-bar schedule-item-bar-top"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens header -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img2.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">The power of a team</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img3.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">11:30 - 12:30</h4>
															<h3 class="schedule-item-title">App Development workshop</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img4.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">Welcome & Registration</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img5.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">14:00 - 15:30</h4>
															<h3 class="schedule-item-title">How to be the leader</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img6.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">15:30 - 17:00</h4>
															<h3 class="schedule-item-title">MEAN Workshop</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img1.jpg" alt="">
														</div>											
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">17:00 - 18:00</h4>
															<h3 class="schedule-item-title">Closing party</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->	

								<!-- Schedule itens footer -->
								<div class="schedule-item-footer">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-bottom">
												<div class="schedule-item-bar schedule-item-bar-bottom"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens footer -->

							</div>
				    		<!-- /schedule list -->
				    	</div>
				    	<div class="schedule-tab tab" id="schedule-tab5">
				    		<!-- schedule list -->
				    		<div class="schedule-list">
				    			
								<!-- Schedule itens header -->
								<div class="schedule-item-header">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-top">
												<div class="schedule-item-bar schedule-item-bar-top"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens header -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img2.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">The power of a team</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img3.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">11:30 - 12:30</h4>
															<h3 class="schedule-item-title">App Development workshop</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img4.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">9:30 - 11:30</h4>
															<h3 class="schedule-item-title">Welcome & Registration</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img5.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">14:00 - 15:30</h4>
															<h3 class="schedule-item-title">How to be the leader</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->
								
								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img6.jpg" alt="">
														</div>														
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">15:30 - 17:00</h4>
															<h3 class="schedule-item-title">MEAN Workshop</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->

								<!-- Schedule item -->
								<div class="schedule-item">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block">
												<div class="schedule-item-bar"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10 schedule-item-content-wrapper">
											<!-- schedule item content -->
											<div class="schedule-item-content">
												<div class="row">
													<!-- col -->
													<div class="col-sm-2">
														<div class="schedule-item-img">
															<img src="img/schedule-img1.jpg" alt="">
														</div>											
													</div>
													<!-- /col -->
													<!-- col -->
													<div class="col-sm-10">
														<div class="schedule-item-infos">
															<h4 class="schedule-item-date">17:00 - 18:00</h4>
															<h3 class="schedule-item-title">Closing party</h3>
															<div class="schedule-item-text">
																<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
															</div>	
														</div>														
													</div>
													<!-- /col -->
												</div>																		
											</div>
											<!-- schedule item content -->
										</div>
									</div>
								</div>	
								<!-- /Schedule item -->	

								<!-- Schedule itens footer -->
								<div class="schedule-item-footer">
									<div class="row">
										<div class="col-sm-2">
											<!-- schedule item bar -->
											<div class="schedule-item-block schedule-item-block-bottom">
												<div class="schedule-item-bar schedule-item-bar-bottom"></div>
											</div>
											<!-- /schedule item bar -->
										</div>
										<div class="col-sm-10">						
										</div>
									</div>
								</div>	
								<!-- /Schedule itens footer -->

							</div>
				    		<!-- /schedule list -->
				    	</div>
				   		<!-- / Schedule Tab -->
				    </div>
					<!-- /Schedule Tabs -->	
					
				</div>
				<!-- /TABS -->
							
			</div>
		</div>
		<!-- /SECTION: Event Schedule
		================================================== -->

		<!-- SECTION: Team
		================================================== -->
		<div class="section-team inverted-section2 section-padding" id="section-speakers">
			<div class="container">
				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Our Speakers</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias esse cumque quae, perferendis neque voluptate recusandae, rem soluta quam error reiciendis consequuntur. Officia delectus quidem blanditiis eum incidunt temporibus nobis</p>
				</div>
				<!-- /Section title -->
				<div class="owl-carousel" id="about-team">
					<!-- item -->
					<div class="team-item">
						<!-- team-member wrapper-->
						<div class="team-item-wrapper">
							<!-- team-member pic -->
							<div class="team-member-picture-wrapper">
								<div class="team-item-picture">
									<img src="img/team1.jpg" alt=""/>
								</div>
								<div class="team-member-find">
																
								</div>
							</div>					
							<!-- /team-member pic -->
							<!-- team-member Infos -->
							<div class="team-item-content">
								<h3 class="team-item-title">John Rex</h3>
								<p class="team-item-subtitle">Developer @ Nations </p>								
							</div>
							<!-- team-member Infos -->
						</div>
						<!-- /team-member wrapper-->
					</div>
					<!-- /item -->
					<!-- item -->
					<div class="team-item">
						<!-- team-member wrapper-->
						<div class="team-item-wrapper">
							<!-- team-member pic -->
							<div class="team-member-picture-wrapper">
								<div class="team-item-picture">
									<img src="img/team2.jpg" alt=""/>
								</div>
								<div class="team-member-find">
																	
								</div>
							</div>
							
							<!-- /team-member pic -->
							<!-- team-member Infos -->
							<div class="team-item-content">
								<h3 class="team-item-title">Jessie Rex</h3>
								<p class="team-item-subtitle">CEO @ Urbes</p>							
							</div>
							<!-- team-member Infos -->
						</div>
						<!-- /team-member wrapper-->
					</div>
					<!-- /item -->
					<!-- item -->
					<div class="team-item">
						<!-- team-member wrapper-->
						<div class="team-item-wrapper">
							<!-- team-member pic -->
							<div class="team-member-picture-wrapper">
								<div class="team-item-picture">
									<img src="img/team3.jpg" alt=""/>
								</div>
								<div class="team-member-find">
																	
								</div>
							</div>
							
							<!-- /team-member pic -->
							<!-- team-member Infos -->
							<div class="team-item-content">
								<h3 class="team-item-title">James Rex</h3>
								<p class="team-item-subtitle">Ux @ Dupstudio</p>								
							</div>
							<!-- team-member Infos -->
						</div>
						<!-- /team-member wrapper-->
					</div>
					<!-- /item -->
					<!-- item -->
					<div class="team-item">
						<!-- team-member wrapper-->
						<div class="team-item-wrapper">
							<!-- team-member pic -->
							<div class="team-member-picture-wrapper">
								<div class="team-item-picture">
									<img src="img/team4.jpg" alt=""/>
								</div>
								<div class="team-member-find">
																
								</div>
							</div>
							
							<!-- /team-member pic -->
							<!-- team-member Infos -->
							<div class="team-item-content">
								<h3 class="team-item-title">Melissa Rex</h3>
								<p class="team-item-subtitle">Co-Founder @ DotRex</p>								
							</div>
							<!-- team-member Infos -->
						</div>
						<!-- /team-member wrapper-->
					</div>
					<!-- /item -->
					<!-- item -->
					<div class="team-item">
						<!-- team-member wrapper-->
						<div class="team-item-wrapper">
							<!-- team-member pic -->
							<div class="team-member-picture-wrapper">
								<div class="team-item-picture">
									<img src="img/team1.jpg" alt=""/>
								</div>
								<div class="team-member-find">
																
								</div>
							</div>
							
							<!-- /team-member pic -->
							<!-- team-member Infos -->
							<div class="team-item-content">
								<h3 class="team-item-title">John Rex</h3>
								<p class="team-item-subtitle">Developer @ Nations</p>								
							</div>
							<!-- team-member Infos -->
						</div>
						<!-- /team-member wrapper-->
					</div>
					<!-- /item -->
					<!-- item -->
					<div class="team-item">
						<!-- team-member wrapper-->
						<div class="team-item-wrapper">
							<!-- team-member pic -->
							<div class="team-member-picture-wrapper">
								<div class="team-item-picture">
									<img src="img/team2.jpg" alt=""/>
								</div>
								<div class="team-member-find">
																
								</div>
							</div>
							
							<!-- /team-member pic -->
							<!-- team-member Infos -->
							<div class="team-item-content">
								<h3 class="team-item-title">Jessie Rex</h3>
								<p class="team-item-subtitle">Software Engineer @ QLabs</p>							
							</div>
							<!-- team-member Infos -->
						</div>
						<!-- /team-member wrapper-->
					</div>
					<!-- /item -->
				</div>
			</div>
		</div>
		<!-- /SECTION: Team
		================================================== -->

		<!-- SECTION: Testimonials
		================================================== -->
		<div class="section-testimonials section-padding section-bg-right" id="section-testimonials">
			<div class="container">		
				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Testimonials</h2>
				</div>
				<!-- /Section title -->

				<!-- Testimonial Slides -->
				<div class="testimonial-slides" id="testimonial-carousel">
					<!-- item -->
					<div class="testimonial-item">
						<!-- Testimonial Content -->
						<div class="testimonial-content">
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat malesuada aliquet. Morbi vulputate nisl eget adipiscing consequat. Cras arcu tortor, ornare vel libero et, sagittis adipiscing leo. Aenean eget."</p>
						</div>						
						<!-- /Testimonial Content -->	
						<!-- Testimonial Author -->
						<div class="testimonial-credits">
							<!-- picture -->
							<div class="testimonial-picture">
								<img src="img/team2.jpg" alt=""/>
							</div>							
							<!-- /picture -->
							<p class="testimonial-author">Melissa Alvarez</p>
							<p class="testimonial-firm">Trexus Co.</p>
						</div>
						<!-- /Testimonial Author -->								
					</div>
					<!-- /item -->
					<!-- item -->
					<div class="testimonial-item">
						<!-- Testimonial Content -->
						<div class="testimonial-content">
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat malesuada aliquet. Morbi vulputate nisl eget adipiscing consequat. Cras arcu tortor, ornare vel libero et, sagittis adipiscing leo. Aenean eget."</p>
						</div>						
						<!-- /Testimonial Content -->	
						<!-- Testimonial Author -->
						<div class="testimonial-credits">
							<!-- picture -->
							<div class="testimonial-picture">
								<img src="img/team1.jpg" alt=""/>
							</div>							
							<!-- /picture -->
							<p class="testimonial-author">John Rex</p>
							<p class="testimonial-firm">DotRex Co.</p>
						</div>
						<!-- /Testimonial Author -->								
					</div>
					<!-- /item -->
					<!-- item -->
					<div class="testimonial-item">
						<!-- Testimonial Content -->
						<div class="testimonial-content">
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat malesuada aliquet. Morbi vulputate nisl eget adipiscing consequat. Cras arcu tortor, ornare vel libero et, sagittis adipiscing leo. Aenean eget."</p>
						</div>						
						<!-- /Testimonial Content -->	
						<!-- Testimonial Author -->
						<div class="testimonial-credits">
							<!-- picture -->
							<div class="testimonial-picture">
								<img src="img/team3.jpg" alt=""/>
							</div>							
							<!-- /picture -->
							<p class="testimonial-author">Jhonathan Smith</p>
							<p class="testimonial-firm">RedWings Co.</p>
						</div>
						<!-- /Testimonial Author -->								
					</div>
					<!-- /item -->
				</div>
				<!-- Testimonial Slides -->

			</div>
		</div>
		<!-- /SECTION: Testimonials
		================================================== -->

		<!-- SECTION: Sponsors
		================================================== -->
		<div class="section-sponsors inverted-section2 section-padding " id="section-sponsors">
			<div class="container">
				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Proudly Supported by</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias esse cumque quae, perferendis neque voluptate recusandae, rem soluta quam error reiciendis consequuntur. Officia delectus quidem blanditiis eum incidunt temporibus nobis</p>
				</div>
				<!-- /Section title -->
				
				<div class="sponsors-list-wrapper">
					<div class="sponsors-list" id="sponsors-carousel">
						<!-- item -->
						<div class="sponsor-item">
							<img src="img/partner-1.png" alt="">
						</div>
						<!-- /item -->
						<!-- item -->
						<div class="sponsor-item">
							<img src="img/partner-2.png" alt="">
						</div>
						<!-- /item -->
						<!-- item -->
						<div class="sponsor-item">
							<img src="img/partner-3.png" alt="">
						</div>
						<!-- /item -->
						<!-- item -->
						<div class="sponsor-item">
							<img src="img/partner-4.png" alt="">
						</div>
						<!-- /item -->
						<!-- item -->
						<div class="sponsor-item">
							<img src="img/partner-5.png" alt="">
						</div>
						<!-- /item -->
					</div>
				</div>	
			</div>				
		</div>
		<!-- /SECTION: Sponsors
		================================================== -->

		

		<!-- SECTION: FAQ
		================================================== -->
		<div class="section-faq section-padding section-bg-right" id="section-faq">
			<div class="container">
				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Faq</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, sunt! Nobis maxime, praesentium et cupiditate neque molestias soluta rem eveniet voluptatem eos. Eos dolorum fugit excepturi incidunt atque repellendus ex.</p>
				</div>				
				<!-- /Section title -->
				
				<!-- FAQ list -->
	    		<div class="schedule-list">

					<!-- FAQ itens header -->
					<div class="schedule-item-header">
						<div class="row">
							<div class="col-sm-2">
								<!-- FAQ item bar -->
								<div class="schedule-item-block faq-item-block schedule-item-block-top">
									<div class="schedule-item-bar schedule-item-bar-top"></div>
								</div>
								<!-- /FAQ item bar -->
							</div>
							<div class="col-sm-10">						
							</div>
						</div>
					</div>	
					<!-- /FAQ itens header -->

					<!-- FAQ item -->
					<div class="schedule-item">
						<div class="row">
							<div class="col-sm-2">
								<!-- FAQ item bar -->
								<div class="schedule-item-block faq-item-block">
									<div class="schedule-item-bar"></div>
								</div>
								<!-- /FAQ item bar -->
							</div>
							<div class="col-sm-10 schedule-item-content-wrapper">
								<!-- FAQ item content -->
								<div class="schedule-item-content faq-item-content">
									<div class="row">
										<!-- col -->
										<div class="col-sm-12">
											<div class="schedule-item-infos">
												<!-- FAQ Question -->
												<h3 class="schedule-item-title faq-item-title">I would like to speak at upcoming events, what should I do?</h3>
												<!-- /FAQ Question -->
												<!-- FAQ reply -->
												<div class="schedule-item-text">
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
												</div>	
												<!-- /FAQ reply -->
											</div>														
										</div>
										<!-- /col -->
									</div>																		
								</div>
								<!-- FAQ item content -->
							</div>
						</div>
					</div>	
					<!-- /FAQ item -->

					<!-- FAQ item -->
					<div class="schedule-item">
						<div class="row">
							<div class="col-sm-2">
								<!-- FAQ item bar -->
								<div class="schedule-item-block faq-item-block">
									<div class="schedule-item-bar"></div>
								</div>
								<!-- /FAQ item bar -->
							</div>
							<div class="col-sm-10 schedule-item-content-wrapper">
								<!-- FAQ item content -->
								<div class="schedule-item-content faq-item-content">
									<div class="row">
										<!-- col -->
										<div class="col-sm-12">
											<div class="schedule-item-infos">
												<!-- FAQ Question -->
												<h3 class="schedule-item-title faq-item-title">What forms of payment available?</h3>
												<!-- /FAQ Question -->
												<!-- FAQ reply -->
												<div class="schedule-item-text">
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
												</div>	
												<!-- /FAQ reply -->
											</div>														
										</div>
										<!-- /col -->
									</div>																		
								</div>
								<!-- FAQ item content -->
							</div>
						</div>
					</div>	
					<!-- /FAQ item -->

					<!-- FAQ item -->
					<div class="schedule-item">
						<div class="row">
							<div class="col-sm-2">
								<!-- FAQ item bar -->
								<div class="schedule-item-block faq-item-block">
									<div class="schedule-item-bar"></div>
								</div>
								<!-- /FAQ item bar -->
							</div>
							<div class="col-sm-10 schedule-item-content-wrapper">
								<!-- FAQ item content -->
								<div class="schedule-item-content faq-item-content">
									<div class="row">
										<!-- col -->
										<div class="col-sm-12">
											<div class="schedule-item-infos">
												<!-- FAQ Question -->
												<h3 class="schedule-item-title faq-item-title">I wold like a special package to bring the employees of my company, what should I do?</h3>
												<!-- /FAQ Question -->
												<!-- FAQ reply -->
												<div class="schedule-item-text">
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
												</div>	
												<!-- /FAQ reply -->
											</div>														
										</div>
										<!-- /col -->
									</div>																		
								</div>
								<!-- FAQ item content -->
							</div>
						</div>
					</div>	
					<!-- /FAQ item -->
					
					

					<!-- FAQ itens footer -->
					<div class="schedule-item-footer">
						<div class="row">
							<div class="col-sm-2">
								<!-- FAQ item bar -->
								<div class="schedule-item-block faq-item-block schedule-item-block-bottom">
									<div class="schedule-item-bar schedule-item-bar-bottom"></div>
								</div>
								<!-- /FAQ item bar -->
							</div>
							<div class="col-sm-10">						
							</div>
						</div>
					</div>	
					<!-- /FAQ itens footer -->
				</div>
	    		<!-- /FAQ list -->
			</div>

		</div>
		<!-- /SECTION: FAQ
		================================================== -->

		

		<!-- SECTION: Prices
		================================================== -->
		<div class="section-prices section-padding section-bg-left" id="section-prices">
			<div class="container">

				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Packages</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio at mollitia, nam obcaecati veniam provident laboriosam harum ab quod beatae explicabo, dicta voluptates natus sed aspernatur sapiente, nostrum iste quis.</p>
				</div>				
				<!-- /Section title -->	

				<!-- Princing Tickets -->
				<div class="row">

					<!-- item -->
					<div class="col-sm-4">
						<!-- price ticket -->
						<a href="#" class="price-ticket-item">
							<div class="price-ticket-item-wrapper">
								<!-- Front card -->
								<div class="price-ticket-item-front">
									<div class="price-ticket-item-border">
										<!-- row -->
										<div class="row">
											<!-- col -->
											<div class="col-sm-6">
												<!-- ticket price -->
												<h3 class="price-ticket-title">₹500</h3>
												<p class="price-ticket-type">Basic</p>
												<!-- /ticket-price -->									
											</div>
											<!-- /col -->
											<!-- col -->
											<div class="col-sm-6 no-spadding">
												<div class="price-ticket-infos-wrapper">
													<p><strong>This Includes:</strong></p>
													<ul class="clean-list">
														<li><i class="fa fa-check"></i>&nbsp; Talks</li>
														<li><i class="fa fa-check"></i>&nbsp; Panel Discussions or</li>
														<li><i class="fa fa-check"></i>&nbsp; 1 Workshop</li>
														<li><i class="fa fa-check"></i>&nbsp; Free Food</li>
													</ul>
												</div>												
											</div>
											<!-- /col -->
										</div>
										<!-- /row -->
									</div>									
								</div>
								<!-- /front-card -->
								<!-- Back Card -->
								<div class="price-ticket-item-back">
									<div class="price-ticket-item-border">
										<div class="price-ticket-buy">
											<p class="ticket-item-buy-ico"><i class="fa fa-ticket"></i></p>
											<h3 class="ticket-item-buy-text to-register">Register Now!</h3>
											<p><i>just 1 click away!</i></p>
										</div>
									</div>
								</div>
								<!-- /Back Card -->
							</div>							
						</a>
						<!-- /price ticket -->
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="col-sm-4">
						<!-- price ticket -->
						<a href="#" class="price-ticket-item">
							<div class="price-ticket-item-wrapper">
								<!-- Front card -->
								<div class="price-ticket-item-front">
									<div class="price-ticket-item-border">
										<!-- row -->
										<div class="row">
											<!-- col -->
											<div class="col-sm-6">
												<!-- ticket price -->
												<h3 class="price-ticket-title">₹700</h3>
												<p class="price-ticket-type">Economy</p>
												<!-- /ticket-price -->									
											</div>
											<!-- /col -->
											<!-- col -->
											<div class="col-sm-6 no-spadding">
												<div class="price-ticket-infos-wrapper">
													<p><strong>This Includes:</strong></p>
													<ul class="clean-list">
														<li><i class="fa fa-check"></i>&nbsp; Talks</li>
														<li><i class="fa fa-check"></i>&nbsp; Panel Discussions </li>
														<li><i class="fa fa-check"></i>&nbsp; Competitions</li>
														<li><i class="fa fa-check"></i>&nbsp; Free Food</li>
													</ul>
												</div>												
											</div>
											<!-- /col -->
										</div>
										<!-- /row -->
									</div>									
								</div>
								<!-- /front-card -->
								<!-- Back Card -->
								<div class="price-ticket-item-back">
									<div class="price-ticket-item-border">
										<div class="price-ticket-buy">
											<p class="ticket-item-buy-ico"><i class="fa fa-ticket"></i></p>
											<h3 class="ticket-item-buy-text to-register">Register Now!</h3>
											<p><i>just 1 click away!</i></p>
										</div>
									</div>
								</div>
								<!-- /Back Card -->
							</div>							
						</a>
						<!-- /price ticket -->
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="col-sm-4">
						<!-- price ticket -->
						<a href="#" class="price-ticket-item">
							<div class="price-ticket-item-wrapper">
								<!-- Front card -->
								<div class="price-ticket-item-front">
									<div class="price-ticket-item-border">
										<!-- row -->
										<div class="row">
											<!-- col -->
											<div class="col-sm-6">
												<!-- ticket price -->
												<h3 class="price-ticket-title">₹800</h3>
												<p class="price-ticket-type">Business</p>
												<!-- /ticket-price -->									
											</div>
											<!-- /col -->
											<!-- col -->
											<div class="col-sm-6 no-spadding">
												<div class="price-ticket-infos-wrapper">
													<p><strong>This Includes:</strong></p>
													<ul class="clean-list">
														<li><i class="fa fa-check"></i>&nbsp; Talks</li>
														<li><i class="fa fa-check"></i>&nbsp; Panel Discussions</li>
														<li><i class="fa fa-check"></i>&nbsp; Workshops</li>
														<li><i class="fa fa-check"></i>&nbsp; Free Food</li>
													</ul>
												</div>												
											</div>
											<!-- /col -->
										</div>
										<!-- /row -->
									</div>									
								</div>
								<!-- /front-card -->
								<!-- Back Card -->
								<div class="price-ticket-item-back">
									<div class="price-ticket-item-border">
										<div class="price-ticket-buy">
											<p class="ticket-item-buy-ico"><i class="fa fa-ticket"></i></p>
											<h3 class="ticket-item-buy-text to-register">Register Now!</h3>
											<p><i>just 1 click away!</i></p>
										</div>
									</div>
								</div>
								<!-- /Back Card -->
							</div>							
						</a>
						<!-- /price ticket -->
					</div>
					<!-- /item -->
				</div>
				<br><br>
				<div class="row">

					<!-- item -->
					<div class="col-sm-4">
						<!-- price ticket -->
						<a href="#" class="price-ticket-item">
							<div class="price-ticket-item-wrapper">
								<!-- Front card -->
								<div class="price-ticket-item-front">
									<div class="price-ticket-item-border">
										<!-- row -->
										<div class="row">
											<!-- col -->
											<div class="col-sm-6">
												<!-- ticket price -->
												<h3 class="price-ticket-title">₹500</h3>
												<p class="price-ticket-type">IEDC Special</p>
												<!-- /ticket-price -->									
											</div>
											<!-- /col -->
											<!-- col -->
											<div class="col-sm-6 no-spadding">
												<div class="price-ticket-infos-wrapper">
													<p><strong>This Includes:</strong></p>
													<ul class="clean-list">
														<li><i class="fa fa-check"></i>&nbsp; Talks</li>
														<li><i class="fa fa-check"></i>&nbsp; Panel Discussions</li>
														<li><i class="fa fa-check"></i>&nbsp; Competitions</li>
														<li><i class="fa fa-check"></i>&nbsp; Workshops</li>
														<li><i class="fa fa-check"></i>&nbsp; Free Food</li>
													</ul>
												</div>												
											</div>
											<!-- /col -->
										</div>
										<!-- /row -->
									</div>									
								</div>
								<!-- /front-card -->
								<!-- Back Card -->
								<div class="price-ticket-item-back">
									<div class="price-ticket-item-border">
										<div class="price-ticket-buy">
											<p class="ticket-item-buy-ico"><i class="fa fa-ticket"></i></p>
											<h3 class="ticket-item-buy-text to-register">Register Now!</h3>
											<p><i>just 1 click away!</i></p>
										</div>
									</div>
								</div>
								<!-- /Back Card -->
							</div>							
						</a>
						<!-- /price ticket -->
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="col-sm-4">
						<!-- price ticket -->
						<a href="#" class="price-ticket-item">
							<div class="price-ticket-item-wrapper">
								<!-- Front card -->
								<div class="price-ticket-item-front">
									<div class="price-ticket-item-border">
										<!-- row -->
										<div class="row">
											<!-- col -->
											<div class="col-sm-6">
												<!-- ticket price -->
												<h3 class="price-ticket-title">₹700</h3>
												<p class="price-ticket-type">NSSCE Special</p>
												<!-- /ticket-price -->									
											</div>
											<!-- /col -->
											<!-- col -->
											<div class="col-sm-6 no-spadding">
												<div class="price-ticket-infos-wrapper">
													<p><strong>This Includes:</strong></p>
													<ul class="clean-list">
														<li><i class="fa fa-check"></i>&nbsp; Talks</li>
														<li><i class="fa fa-check"></i>&nbsp; Panel Discussions</li>
														<li><i class="fa fa-check"></i>&nbsp; Competitions</li>
														<li><i class="fa fa-check"></i>&nbsp; Workshops</li>
														<li><i class="fa fa-check"></i>&nbsp; Free Food</li>
													</ul>
												</div>												
											</div>
											<!-- /col -->
										</div>
										<!-- /row -->
									</div>									
								</div>
								<!-- /front-card -->
								<!-- Back Card -->
								<div class="price-ticket-item-back">
									<div class="price-ticket-item-border">
										<div class="price-ticket-buy">
											<p class="ticket-item-buy-ico"><i class="fa fa-ticket"></i></p>
											<h3 class="ticket-item-buy-text to-register">Register Now!</h3>
											<p><i>just 1 click away!</i></p>
										</div>
									</div>
								</div>
								<!-- /Back Card -->
							</div>							
						</a>
						<!-- /price ticket -->
					</div>
					<!-- /item -->

					<!-- item -->
					<div class="col-sm-4">
						<!-- price ticket -->
						<a href="#" class="price-ticket-item">
							<div class="price-ticket-item-wrapper">
								<!-- Front card -->
								<div class="price-ticket-item-front">
									<div class="price-ticket-item-border">
										<!-- row -->
										<div class="row">
											<!-- col -->
											<div class="col-sm-6">
												<!-- ticket price -->
												<h3 class="price-ticket-title">₹900</h3>
												<p class="price-ticket-type">Executive</p>
												<!-- /ticket-price -->									
											</div>
											<!-- /col -->
											<!-- col -->
											<div class="col-sm-6 no-spadding">
												<div class="price-ticket-infos-wrapper">
													<p><strong>This Includes:</strong></p>
													<ul class="clean-list">
														<li><i class="fa fa-check"></i>&nbsp; Talks</li>
														<li><i class="fa fa-check"></i>&nbsp; Panel Discussions</li>
														<li><i class="fa fa-check"></i>&nbsp; Competitions</li>
														<li><i class="fa fa-check"></i>&nbsp; Workshops</li>
														<li><i class="fa fa-check"></i>&nbsp; Free Food</li>
													</ul>
												</div>												
											</div>
											<!-- /col -->
										</div>
										<!-- /row -->
									</div>									
								</div>
								<!-- /front-card -->
								<!-- Back Card -->
								<div class="price-ticket-item-back">
									<div class="price-ticket-item-border">
										<div class="price-ticket-buy">
											<p class="ticket-item-buy-ico"><i class="fa fa-ticket"></i></p>
											<h3 class="ticket-item-buy-text to-register">Register Now!</h3>
											<p><i>just 1 click away!</i></p>
										</div>
									</div>
								</div>
								<!-- /Back Card -->
							</div>							
						</a>
						<!-- /price ticket -->
					</div>
					<!-- /item -->
				</div>
				<!-- /Princing Tickets -->
				
			</div>				
		</div>
		<!-- /SECTION: Prices
		================================================== -->

		<!-- SECTION: Register
		================================================== -->
		<div class="section-register inverted-section2 section-padding" id="section-register">
			<div class="container">
				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Register now</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni doloremque quis a quae voluptas ea suscipit, labore accusamus minima voluptatum repellendus eaque repudiandae optio culpa ullam quia odio, quisquam excepturi.</p>
				</div>				
				<!-- /Section title -->	
				<div class="row row-nopr">
					<div id="message" style="display:none;" class="col-md-6 col-md-offset-3 alert alert-success">
	                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <strong>Success!</strong> You have been registered successfully with us!. Kindly check your mail to activate your account and ensure your accommodation.
                	</div>

	                <div id="error" style="display:none;" class="col-md-6 col-md-offset-3 alert alert-danger">
	                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <strong>Error!</strong>Registration failed!. Try again
	                </div>
					<form id="register-form" method="post" class="form register-form" action="action_register.php">

						<div class="col-md-6 col-md-offset-3">
							<input name="fname" id="fname" type="text" class="form-control" placeholder="First Name" required>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input name="lname" id="lname" type="text" class="form-control" placeholder="Last Name" required>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input type="email" placeholder="Email" class="form-control" name="email" id="email" required onBlur="checkAvailability()"/>
						</div>
						<div class="col-md-6 col-md-offset-3" id="availability-status">
						</div>
						
						<div class="col-md-6 col-md-offset-3">
							<input name="pwd" id="pwd" type="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input name="cpwd" id="cpwd" type="password" class="form-control" placeholder="Confirm Password" required>
						</div>
						<div class="col-md-6 col-md-offset-3" >
							<input name="phone" id="phone" class="form-control" type="tel" placeholder="Phone" required>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input name="college" id="college" type="text" onkeyup="auto()" class="form-control ui-autocomplete-input" autocomplete="off" placeholder="College" required>
						</div>
						<br>
						<div class="col-md-6 col-md-offset-3">
						<label for="subject" >Gender<span>*</span></label>
                        <label class="radio-inline"><input type="radio" name="gender" value="male" required checked> Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="female" required> Female</label>
						<br>
                        <label class="radio-inline pull-right"><input type="checkbox" name="acccomodation" value="yes" >
                        <label for="subject" >Need Accomodation</label></label>
						</div>
						<br>
						<div class="col-md-6 col-md-offset-3">
							<input id="submit-btn" type="submit" class="btn btn-danger btn-form" name="submit" value="REGISTER"/>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<a href="#section-login" class="btn btn-default btn-form to-login">LOGIN</a>
						</div>
						<input type="hidden" value="New Event Register!" name="subject" id="subject">
					</form>
				</div>
			</div>	
		</div>
		<!-- /SECTION: Register
		================================================== -->

		<div class="section-register inverted-section2 section-padding" id="section-login" style="display:none;">
					<div class="container">
						<!-- Section title -->
						<div class="section-title-wrapper">
							<h2 class="title-section">Login now</h2>
							
						</div>				
						<!-- /Section title -->	
						<div class="row row-nopr">
							<div id="message-login" class="alert alert-success col-md-6 col-md-offset-3" style="display:none;">
			                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                    <strong>Success!</strong>
			                </div>

			                <div id="error-login" class="alert alert-danger col-md-6 col-md-offset-3" style="display:none;">
			                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                    <strong>Error!</strong>
			                </div>
							<form id="login-form" method="post" class="form register-form" >

								
								<div class="col-md-6 col-md-offset-3">
									<input name="email" id="lemail" class="form-control" type="email" placeholder="Email" required>
								</div>
								
								<div class="col-md-6 col-md-offset-3">
									<input name="pwd" id="lpwd" type="password" class="form-control" placeholder="Password" required>
								</div>
								<br><br>
								<div class="col-md-6 col-md-offset-3">
									<br><input type="submit" class="btn btn-danger btn-form" name="submit" value="LOGIN"/>
								</div>
								<div class="col-md-6 col-md-offset-3">
									<br><a href="#section-register" class="btn btn-default btn-form to-register">REGISTER</a>
								</div>
								
							</form>
						</div>
					</div>	
				</div>

<div class="section-register inverted-section2 section-padding" id="section-iedc">
			<div class="container">
				<!-- Section title -->
				<div class="section-title-wrapper">
					<h2 class="title-section">Recommend 10 IEDC Members</h2>
					
				</div>				
				<!-- /Section title -->	
				<div class="row row-nopr">
					<form id="register-form" method="post" class="form register-form" >

						<div class="col-md-6 ">
							<input name="name1" id="name1" type="text" class="form-control" placeholder="Name 1" required>
						</div>

						<div class="col-md-6 ">
							<input name="email1" id="lemail1" class="form-control" type="email" placeholder="Email 1" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name2" id="name2" type="text" class="form-control" placeholder="Name 2" required>
						</div>

						<div class="col-md-6 ">
							<input name="email2" id="lemail2" class="form-control" type="email" placeholder="Email 2" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name3" id="name3" type="text" class="form-control" placeholder="Name 3" required>
						</div>

						<div class="col-md-6 ">
							<input name="email3" id="lemail3" class="form-control" type="email" placeholder="Email 3" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name4" id="name4" type="text" class="form-control" placeholder="Name 4" required>
						</div>

						<div class="col-md-6 ">
							<input name="email4" id="lemail4" class="form-control" type="email" placeholder="Email 4" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name5" id="name5" type="text" class="form-control" placeholder="Name 5" required>
						</div>

						<div class="col-md-6 ">
							<input name="email5" id="lemail5" class="form-control" type="email" placeholder="Email 5" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name6" id="name6" type="text" class="form-control" placeholder="Name 6" required>
						</div>

						<div class="col-md-6 ">
							<input name="email6" id="lemail6" class="form-control" type="email" placeholder="Email 6" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name7" id="name7" type="text" class="form-control" placeholder="Name 7" required>
						</div>
						<div class="col-md-6 ">
							<input name="email7" id="lemail7" class="form-control" type="email" placeholder="Email 7" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name8" id="name8" type="text" class="form-control" placeholder="Name 8" required>
						</div>

						<div class="col-md-6 ">
							<input name="email8" id="lemail8" class="form-control" type="email" placeholder="Email 8" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name9" id="name9" type="text" class="form-control" placeholder="Name 9" required>
						</div>

						<div class="col-md-6 ">
							<input name="email9" id="lemail9" class="form-control" type="email" placeholder="Email 9" required>
						</div>
						
						
						<br><br>
						<div class="col-md-6 ">
							<input name="name10" id="name10" type="text" class="form-control" placeholder="Name 10" required>
						</div>

						<div class="col-md-6 ">
							<input name="email10" id="lemail10" class="form-control" type="email" placeholder="Email 10" required>
						</div>
						
						
						<br><br>

						<div class="col-md-6 col-md-offset-3">
							<br><input type="submit" class="btn btn-danger btn-form" name="submit" value="SUBMIT"/>
						</div>

					</form>
				</div>
			</div>	
		<!-- SECTION: Location
		================================================== 
		<div class="container-fluid">
			<div class="row">
				<div class="map" id="map">			
					<iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=NSS+College+of+Engineering,+Puthuppariyaram,+Palakkad,+Kerala,+India&key=AIzaSyB55Iza4fPjpUBpMU2pV1A1JYfBltGCrbg"></iframe></div><style>#gmap_display .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div></iframe>
				</div>
			</div>			
		</div>-->
		<!-- /SECTION: Location
		================================================== -->
	</div>
</div>

<!-- Contact Form - Ajax Messages
========================================================= -->
<!-- Form Sucess -->
<div class="form-result modal-wrap" id="contactSuccess">
  <div class="modal-bg"></div>
  <div class="modal-content">
    <h4 class="modal-title"><i class="fa fa-check-circle"></i> Success!</h4>
    <p>Your message has been sent to us.</p>
  </div>
</div>
<!-- /Form Sucess -->
<!-- form-error -->
<div class="form-result modal-wrap" id="contactError">
  <div class="modal-bg"></div>
  <div class="modal-content">
    <h4 class="modal-title"><i class="fa fa-times"></i> Error</h4>
    <p>There was an error sending your message.</p>
  </div>
</div>
<!-- /form-error -->
<!-- / Contact Form - Ajax Messages
========================================================= -->

<!-- Footer
================================================== -->
<footer id="footer" class="jumb-footer">
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- col -->
			<div class="col-sm-6">
				"The power of imagination makes us infinite." <i>- John Muir</i>
			</div>
			<!-- /col -->
			<!-- col -->
			<div class="col-sm-6 text-right">
				<!-- Social Icons -->
				<div class="footer-social-icons">
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
				<!-- /Social Icons -->
			</div>
			<!-- /col -->
		</div>
		<!-- /row -->
	</div>	
</footer>
<!-- /Footer
================================================== -->

<!-- >> JS
============================================================================== -->
<script src="vendor/jquery.ui.autocomplete.html.js" />
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="vendor/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Crossbrowser-->
<script src="vendor/cross-browser.js"></script>
<!-- /Crossbrowser-->
<!-- CountDown -->
<script src="vendor/jquery.countdown.min.js"></script>
<!-- /CountDown -->
<!-- Waypoints-->
<script src="vendor/waypoints.min.js"></script>
<!-- /Waypoints-->
<!-- Validate -->
<script src="vendor/validate.js"></script>
<!-- / Validate -->
<!-- Fancybox -->
<script src="vendor/fancybox/jquery.fancybox.js"></script>
<!-- /fancybox -->
<!-- Owl Caroulsel -->
<script src="vendor/owl.carousel/owl-carousel/owl.carousel.js"></script>
<!-- /Owl Caroulsel -->
<!-- Main JS -->
<script src="js/main.js"></script>
<!-- /Main JS -->
<!-- User JS -->
<script src="js/user.js"></script>
<!-- /User JS -->


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- >> /JS
============================================================================= -->
</body>
</html>