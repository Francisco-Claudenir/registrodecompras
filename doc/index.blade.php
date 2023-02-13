<!DOCTYPE html>
<html>
<head>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- Title -->
	<title>Zenix - Crypto Laravel Admin Dashboard</title>
	
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	
	<!-- Css Style -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/scrollbar.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="plugins/jstree/dist/themes/default/style.min.css">
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	
</head>
<body data-spy="scroll" data-target=".nav-bar" data-offset="50">
<div class="wrapper" id="tableofcontent">

	<!-- Sidebar Holder -->
	<nav id="nevbarleft">
		<div class="side-nav full-height">
			<div class="sidebar-header">
				<h2>
					<svg class="logo-abbr" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect class="svg-logo-rect" width="50" height="50" rx="6" fill="#EB8153"/>
						<path class="svg-logo-path"  d="M17.5158 25.8619L19.8088 25.2475L14.8746 11.1774C14.5189 9.84988 15.8701 9.0998 16.8205 9.75055L33.0924 22.2055C33.7045 22.5589 33.8512 24.0717 32.6444 24.3951L30.3514 25.0095L35.2856 39.0796C35.6973 40.1334 34.4431 41.2455 33.3397 40.5064L17.0678 28.0515C16.2057 27.2477 16.5504 26.1205 17.5158 25.8619ZM18.685 14.2955L22.2224 24.6007L29.4633 22.6605L18.685 14.2955ZM31.4751 35.9615L27.8171 25.6886L20.5762 27.6288L31.4751 35.9615Z" fill="white"/>
					</svg>
	                <svg class="brand-title" width="74" height="22" viewBox="0 0 74 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path class="svg-logo-path"  d="M0.784 17.556L10.92 5.152H1.176V1.12H16.436V4.564L6.776 16.968H16.548V21H0.784V17.556ZM25.7399 21.28C24.0785 21.28 22.6599 20.9347 21.4839 20.244C20.3079 19.5533 19.4025 18.6387 18.7679 17.5C18.1519 16.3613 17.8439 15.1293 17.8439 13.804C17.8439 12.3853 18.1519 11.088 18.7679 9.912C19.3839 8.736 20.2799 7.79333 21.4559 7.084C22.6319 6.37467 24.0599 6.02 25.7399 6.02C27.4012 6.02 28.8199 6.37467 29.9959 7.084C31.1719 7.79333 32.0585 8.72667 32.6559 9.884C33.2719 11.0413 33.5799 12.2827 33.5799 13.608C33.5799 14.1493 33.5425 14.6253 33.4679 15.036H22.6039C22.6785 16.0253 23.0332 16.7813 23.6679 17.304C24.3212 17.808 25.0585 18.06 25.8799 18.06C26.5332 18.06 27.1585 17.9013 27.7559 17.584C28.3532 17.2667 28.7639 16.8373 28.9879 16.296L32.7959 17.36C32.2172 18.5173 31.3119 19.46 30.0799 20.188C28.8665 20.916 27.4199 21.28 25.7399 21.28ZM22.4919 12.292H28.8759C28.7825 11.3587 28.4372 10.6213 27.8399 10.08C27.2612 9.52 26.5425 9.24 25.6839 9.24C24.8252 9.24 24.0972 9.52 23.4999 10.08C22.9212 10.64 22.5852 11.3773 22.4919 12.292ZM49.7783 21H45.2983V12.74C45.2983 11.7693 45.1116 11.0693 44.7383 10.64C44.3836 10.192 43.9076 9.968 43.3103 9.968C42.6943 9.968 42.069 10.2107 41.4343 10.696C40.7996 11.1813 40.3516 11.8067 40.0903 12.572V21H35.6103V6.3H39.6423V8.764C40.1836 7.90533 40.949 7.23333 41.9383 6.748C42.9276 6.26267 44.0663 6.02 45.3543 6.02C46.3063 6.02 47.0716 6.19733 47.6503 6.552C48.2476 6.888 48.6956 7.336 48.9943 7.896C49.3116 8.43733 49.517 9.03467 49.6103 9.688C49.7223 10.3413 49.7783 10.976 49.7783 11.592V21ZM52.7548 4.62V0.559999H57.2348V4.62H52.7548ZM52.7548 21V6.3H57.2348V21H52.7548ZM63.4657 6.3L66.0697 10.444L66.3497 10.976L66.6297 10.444L69.2337 6.3H73.8537L68.9257 13.608L73.9657 21H69.3457L66.6017 16.884L66.3497 16.352L66.0977 16.884L63.3537 21H58.7337L63.7737 13.692L58.8457 6.3H63.4657Z" fill="#fff"/>
					</svg>
				</h2>
			</div>
			<div class="nav-bar">
				<ul class="list-unstyled content-scroll components navbar-nav nav" id="download-button">
					<li class="active"><a href="#introduction">Introduction</a></li>
					<li><a class="scrollto" href="#quick-start">Quick Start</a></li>
					<li><a class="scrollto" href="#sass-compile">SASS Compile</a></li>
					<li><a class="scrollto" href="#overview">Overview</a></li>
					<li><a class="scrollto" href="#file-structure">File Structure</a></li>
					<li><a class="scrollto" href="#theme-feature">Theme Features</a></li>
					<li><a class="scrollto" href="#layout-config">Layout Config</a></li>
					<li><a class="scrollto" href="#our_product">Our Products </a></li>
					<li><a class="scrollto" href="#custom_work">Custom Work Requirements </a></li>
					<li><a class="scrollto" href="#version_history">Version History</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!-- Page Content Holder -->
	<div id="content">
		
		<!-- Navber -->
		<nav class="navbar navbar-default top-nav-bar ">
			<div class="container-fluid">
				<div class="navbar-header">
					 <button type="button" id="sidebarCollapse" class="navbar-btn">
						<span></span>
						<span></span>
						<span></span>
					</button>
				</div>
				<a target="_blank" href="https://themeforest.net/user/dexignzone/portfolio"  class="site-button support-button DZBuyNowBtn">Buy Now</a>
				<a target="_blank" href="https://support.w3itexperts.com" class="site-button support-button DZSupportBtn">Support</a>
			</div>
		</nav>
		
		<!-- Banner -->
		<section class="app-brief slide-banner">
			<div class="container">
				<div class="section-header">
					<h2>Zenix - Crypto Laravel Admin  Dashboard</h2>
					<div class="colored-line"></div>
					<div class="section-description">
						Zenix - Crypto Laravel Admin  Dashboard
					</div>
					<div class="colored-line"></div>
				</div>
			</div>
		</section>
		
		<!-- Introduction -->
		<section class="app-brief" id="introduction">
			<div class="container center-align">
				<h1>Zenix</h1>
				<h3>Zenix - Crypto Laravel Bootstrap Admin Dashboard</h3>
				<p>This documentation is last updated on 09 June 2022.</p>
				<p>Thank you for purchasing this HTML template.</p>
				<p><strong>If you like this template, Please support us by rating this template with 5 stars </strong> </p>
			</div>
		</section>
		<hr/>
		
		
		
		<!-- Quick Start -->
		<section class="app-brief grey-bg" id="quick-start">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text"> Quick Start - </h2>
				</div>
				<div class="row">
					<h4><strong>Requirements</strong></h4>
					<p>Laravel has a set of requirements in order to run smoothly in specific environment. Please see <a href="https://laravel.com/docs/8.x/installation#server-requirements" target="blank"><strong>requirements</strong></a> section in Laravel documentation.</p>
					<p>Zenix similarly uses additional plugins and frameworks, so ensure You have <a href="https://getcomposer.org/" target="blank"> <strong>Composer </strong></a> installed on Your machine.</p>
					<p>Assuming your machine meets all requirements - let's process to installation of Zenix Laravel integration (skeleton).</p>
					<ol>
						<li>Open in cmd or terminal app and navigate to this folder</li>
						<li>Run following commands
							<code class="code">composer install</code>
							<code class="code">cp .env.example .env</code>
							<p>For Windows command line tool use <i>copy </i>command. For unix style - cp.</p>
							<code class="code">php artisan key:generate</code>
						</li>
					</ol>
					<p>For more information about the Laravel installation, check out on this link <a href="https://laravel.com/docs/8.x/installation" target="blank">https://laravel.com/docs/8.x/installation</a></p>
				</div>
			</div>
		</section>
		<section class="app-brief" id="sass-compile">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text title">Sass Compile - </h2>
				</div>
				<div class="sass-compile">
					<h3 class="title">1.- Install Node.js</h3>
					<p>To compile Sass via the command line first, we need to install <a href="https://nodejs.org/en/" target="_blank">node.js</a>. The easiest way is downloading it from the official website nodejs.org open the package and follow the wizard.</p>
					
					<h3 class="title">2.- Initialize NPM</h3>
					<p>NPM is the Node Package Manager for JavaScript. NPM makes it easy to install and uninstall third party packages. To initialize a Sass project with NPM, open your terminal and CD (change directory) to your project folder.</p>
<pre class="brush: javascript; h-100">npm init
</pre>
<img src="images/cmd.png" alt="">
<p>Once in the correct folder, run the command <code>npm init</code>. You will be prompted to answer several questions about the project, after which NPM will generate a <code>package.json</code> file in your folder.</p>


					<h3 class="title">3.- Install Node-Sass</h3>
					<p>Node-sass is an NPM package that compiles Sass to CSS (which it does very quickly too). To install node-sass run the following command in your terminal:  <code>npm install node-sass</code></p>
<pre class="brush: javascript; h-100">npm install node-sass
</pre>

					<h3 class="title">4.- Write Node-sass Command</h3>
					<p>Everything is ready to write a small script in order to compile Sass. Open the package.json file in a code editor. You will see something like this:</p>
					<p>In the scripts section add an <strong>scss command</strong></p>
					<img src="images/jsn.png" alt="">
<pre class="brush: javascript; h-100">"scripts": {
	"sass": "node-sass --watch scss/main.scss css/style.css"
},
</pre>
					
					<h3 class="title">5.- Run the Script</h3>
					<p>To execute our one-line script, we need to run the following command in the terminal: <code>npm run sass</code></p>
<pre class="brush: javascript; h-100">npm run sass
</pre>
				</div>
			</div>
		</section>
		<hr/>
		
		
		
		<!-- Overview -->
		<section class="app-brief" id="overview">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text"> Overview - </h2>
				</div>
				<div class="row">
					<p>We Have Converted All Zenix HTML templates In Laravel</p>
				</div>
			</div>
		</section>
		<hr/>
		
		<!-- File Structure -->
		<section class="app-brief grey-bg" id="file-structure">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text"> File Structure - </h2>
				</div>
				<div class="row">
					<p>Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects.</p>
					<p>We, at Dexignzone, have implemented our Crypto admin dashboard application theme Zenix with this amazing PHP framework for Laravel developers can concentrate on application and not caring much about theme-to-framework integration.</p>
					<br>
					<div id="dz_tree" class="tree-demo">
						<ul>
							<li data-jstree='{ "opened" : true }'>Zenix
								<ul>
									<li data-jstree='{ "opened" : true }'>resources
										<ul>
											<li data-jstree='{ "selected" : false }'>views
												<ul>
													<li data-jstree='{ "selected" : false }'>app
														<ul>
															<li data-jstree='{ "type" : "file" }'>calender.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>profile.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>post_details.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>chart
														<ul class="jstree-children">
															<li data-jstree='{ "type" : "file" }'>chartist.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>chartjs.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>flot.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>morris.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>peity.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>sparkline.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>dashboard
														<ul>
															<li data-jstree='{ "type" : "file" }'>coin_details.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>index.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>index2.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>market_capital.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>my_wallets.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>portofolio.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>transactions.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>ecom
														<ul>
															<li data-jstree='{ "type" : "file" }'>checkout.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>customers.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>invoice.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>productdetail.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>productgrid.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>productlist.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>productorder.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>elements
														<ul>
															<li data-jstree='{ "type" : "file" }'>footer.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>footer-scripts.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>header.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>sidebar.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>errors
														<ul>
															<li data-jstree='{ "type" : "file" }'>404.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>form
														<ul>
															<li data-jstree='{ "type" : "file" }'>editorsummernote.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>element.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>pickers.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>validationjquery.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>wizard.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>layout
														<ul>
															<li data-jstree='{ "type" : "file" }'>default.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>fullwidth.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>map
														<ul>
															<li data-jstree='{ "type" : "file" }'>jqvmap.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>message
														<ul>
															<li data-jstree='{ "type" : "file" }'>compose.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>inbox.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>read.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>page
														<ul>
															<li data-jstree='{ "type" : "file" }'>error400.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>error403.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>error404.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>error500.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>error503.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>forgot_password.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>lockscreen.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>login.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>register.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>table
														<ul>
															<li data-jstree='{ "type" : "file" }'>bootstrapbasic.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>datatablebasic.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>uc
														<ul>
															<li data-jstree='{ "type" : "file" }'>lightgallery.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>nestable.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>nouislider.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>select2.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>sweetalert.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>toastr.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>ui
														<ul>
															<li data-jstree='{ "type" : "file" }'>accordion.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>alert.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>badge.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>button.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>buttongroup.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>card.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>carousel.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>dropdown.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>grid.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>listgroup.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>mediaobject.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>modal.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>pagination.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>popover.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>progressbar.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>tab.blade.php</li>
															<li data-jstree='{ "type" : "file" }'>typography.blade.php</li>
														</ul>
													</li>
													<li data-jstree='{ "selected" : false }'>widget
														<ul>
															<li data-jstree='{ "type" : "file" }'>widget_basic.blade.blade.php</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li data-jstree='{ "opened" : true }'>public
										<ul>
											<li data-jstree='{ "selected" : false }'>css</li>
											<li data-jstree='{ "selected" : false }'>icons</li>
											<li data-jstree='{ "selected" : false }'>images</li>
											<li data-jstree='{ "selected" : false }'>js</li>
											<li data-jstree='{ "selected" : false }'>scss</li>
											<li data-jstree='{ "selected" : false }'>vendor</li>
										</ul>
									</li>
									<li data-jstree='{ "opened" : true }'>config
										<ul>
											<li data-jstree='{ "type" : "file" }'>dz.php</li>
										</ul>
									</li>
									<li data-jstree='{ "opened" : true }'>app
										<ul>
											<li data-jstree='{ "selected" : false }'>Http
												<ul>
													<li data-jstree='{ "selected" : false }'>Controllers
														<ul>
															<li data-jstree='{ "type" : "file" }'>AcaraadminController.php</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<hr/>
		
		<!-- Theme Feature -->
		<section class="app-brief" id="theme-feature">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text">Theme Features - </h2>
					<h4><strong>js/deznav-init.js</strong></h4>
				</div>
				<div class="row demo-row m-b30">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezSettingsOptions = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					primary: "color_1",
					headerBg: "color_1",
					navheaderBg: "color_1",
					sidebarBg: "color_1",
					sidebarStyle: "full",
					sidebarPosition: "fixed",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
					<div class="col-lg-7">
						<img src="images/demo/pic9.jpg" alt="" class="w-100 demo-img">
					</div>
				
				</div>
				<h3>Color Theme - </h3>
				<p>So many color option available</p>
				<ul class="color-list m-b30">
					<li>
						<div class="overlay-text color-1">color_1</div>
					</li>
					<li>
						<div class="overlay-text color-2">color_2</div>
					</li>
					<li>
						<div class="overlay-text color-3">color_3</div>
					</li>
					<li>
						<div class="overlay-text color-4">color_4</div>
					</li>
					<li>
						<div class="overlay-text color-5">color_5</div>
					</li>
					<li>
						<div class="overlay-text  color-6">color_6</div>
					</li>
					<li>
						<div class="overlay-text  color-7">color_7</div>
					</li>
					<li>
						<div class="overlay-text  color-8 text-black border">color_8</div>
					</li>
					<li>
						<div class="overlay-text  color-9">color_9</div>
					</li>
					<li>
						<div class="overlay-text  color-10">color_10</div>
					</li>
					<li>
						<div class="overlay-text  color-11">color_11</div>
					</li>
					<li>
						<div class="overlay-text  color-12">color_12</div>
					</li>
					<li>
						<div class="overlay-text  color-13">color_13</div>
					</li>
					<li>
						<div class="overlay-text  color-14">color_14</div>
					</li>
					<li>
						<div class="overlay-text  color-15">color_15</div>
					</li>
					
				</ul>
				<pre class="h-100 m-b50">
					var dezSettingsOptions = {
						typography: "poppins",  		More Options => ["poppins" , "roboto" , "Open Sans" , "Helventivca" ]
						version: "light",       		More Options => ["light" , "dark"]
						layout: "horizontal",   		More Options => ["horizontal" , "vertical"]
						primary: "color_11",			More Options => ["color_1," , "color_2," ..... "color_15"]
						headerBg: "color_1",			More Options => ["color_1," , "color_2," ..... "color_15"]
						navheaderBg: "color_1",			More Options => ["color_1," , "color_2," ..... "color_15"]
						sidebarBg: "color_11",			More Options => ["color_1," , "color_2," ..... "color_15"]
						sidebarStyle: "compact",		More Options => ["full" , "mini" , "compact" , "modern" , "overlay" , "icon-hover"]
						sidebarPosition: "static",		More Options => ["static" , "fixed"]
						headerPosition: "fixed",		More Options => ["static" , "fixed"]
						containerLayout: "full",		More Options => ["full" , "wide" , "wide-box"]
						direction: direction			More Options => ["ltr" , "rtl"]
					};
				</pre>
				
			<ul class="nav nav-pills m-b15">
				<li class="active"><a data-toggle="tab" href="#themeSet1">Theme Set-1</a></li>
				<li><a data-toggle="tab" href="#themeSet2">Theme Set-2</a></li>
				<li><a data-toggle="tab" href="#themeSet3">Theme Set-3</a></li>
				<li><a data-toggle="tab" href="#themeSet4">Theme Set-4</a></li>
				<li><a data-toggle="tab" href="#themeSet5">Theme Set-5</a></li>
				<li><a data-toggle="tab" href="#themeSet6">Theme Set-6</a></li>
				<li><a data-toggle="tab" href="#themeSet7">Theme Set-7</a></li>
				<li><a data-toggle="tab" href="#themeSet8">Theme Set-8</a></li>
			  </ul>

			  <div class="tab-content">
				<div id="themeSet1" class="tab-pane fade in active">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet1 = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					headerBg: "color_1",
					primary: "color_2",
					navheaderBg: "color_2",
					sidebarBg: "color_2",
					sidebarStyle: "full",
					sidebarPosition: "fixed",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
					<div class="col-lg-7">
						<img src="images/demo/pic1.jpg" alt="" class="w-100 demo-img">
					</div>
				
				</div>
				</div>
				<div id="themeSet2" class="tab-pane fade">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet2 = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					primary: "color_7",
					headerBg: "color_1",
					navheaderBg: "color_7",
					sidebarBg: "color_1",
					sidebarStyle: "modern",
					sidebarPosition: "static",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
					<div class="col-lg-7">
						<img src="images/demo/pic2.jpg" alt="" class="w-100 demo-img">
					</div>
				
				</div>
				</div>
				<div id="themeSet3" class="tab-pane fade">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet3 = {
					typography: "poppins",
					version: "light",
					layout: "horizontal",
					primary: "color_1",
					headerBg: "color_1",
					navheaderBg: "color_1",
					sidebarBg: "color_3",
					sidebarStyle: "full",
					sidebarPosition: "static",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
					<div class="col-lg-7">
						<img src="images/demo/pic3.jpg" alt="" class="w-100 demo-img">
					</div>
				
				</div>
				</div>
				<div id="themeSet4" class="tab-pane fade">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet4 = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					primary: "color_9",
					headerBg: "color_9",
					navheaderBg: "color_1",
					sidebarBg: "color_1",
					sidebarStyle: "compact",
					sidebarPosition: "fixed",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
					<div class="col-lg-7">
						<img src="images/demo/pic4.jpg" alt="" class="w-100 demo-img">
					</div>
				
				</div>
				</div>
				<div id="themeSet5" class="tab-pane fade">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet5 = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					primary: "color_7",
					headerBg: "color_1",
					navheaderBg: "color_7",
					sidebarBg: "color_7",
					sidebarStyle: "icon-hover",
					sidebarPosition: "fixed",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
						<div class="col-lg-7">
							<img src="images/demo/pic5.jpg" alt="" class="w-100 demo-img">
						</div>
					</div>
				</div>
				<div id="themeSet6" class="tab-pane fade">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet6 = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					primary: "color_1",
					headerBg: "color_3",
					navheaderBg: "color_1",
					sidebarBg: "color_1",
					sidebarStyle: "mini",
					sidebarPosition: "fixed",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
						<div class="col-lg-7">
							<img src="images/demo/pic6.jpg" alt="" class="w-100 demo-img">
						</div>
					</div>
				</div>
				<div id="themeSet7" class="tab-pane fade">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet7 = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					primary: "color_2",
					headerBg: "color_1",
					navheaderBg: "color_2",
					sidebarBg: "color_2",
					sidebarStyle: "mini",
					sidebarPosition: "fixed",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
						<div class="col-lg-7">
							<img src="images/demo/pic7.jpg" alt="" class="w-100 demo-img">
						</div>
					</div>
				</div>
				<div id="themeSet8" class="tab-pane fade">
				  <div class="row demo-row">
					<div class="col-lg-5">
				<pre class="brush: javascript; h-100">

				var dezThemeSet8 = {
					typography: "poppins",
					version: "light",
					layout: "vertical",
					primary: "color_2",
					headerBg: "color_14",
					navheaderBg: "color_14",
					sidebarBg: "color_2",
					sidebarStyle: "full",
					sidebarPosition: "fixed",
					headerPosition: "fixed",
					containerLayout: "full",
					direction: direction
				};
				</pre>
					</div>
						<div class="col-lg-7">
							<img src="images/demo/pic8.jpg" alt="" class="w-100 demo-img">
						</div>
					</div>
				</div>
			  </div>
			</div>	
		</section>
		
		<hr/>
		
		<!-- Configuration -->
		<section class="app-brief" id="layout-config">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text"> Configuration - </h2>
				</div>
				<div class="row">
					<p>Zenix theme has a large variety of layout styles and settings. You can visually test them all in layout builder section. We also implemented this comprehensive layout configuration into our Laravel version of theme.</p>
					<p>Configuration file <code>config/dz.php</code> here all the css and js files are defined according to different pages.</p>
					<p>You can include your js and css file set the theme layout to your needs by given possibility.</p>
				</div>
			</div>
		</section>
		
		<!-- Our Products -->
		<section class="app-brief" id="our_product">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text">Our Products - </h2>
				</div>
				<div class="row other-theme">
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/xez25">
								<img src="images/product/davur_laravel.jpg" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/xez25">
										Davur - Laravel Restaurant Admin Dashboard & Bootstrap Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/5RWP3">
								<img src="images/product/eclan_laravel.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/5RWP3">
										Eclan - Laravel Ads Campaign Bootstrap Admin Dashboard
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/vXBzy">
								<img src="images/product/mediqu.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/vXBzy">
										Mediqu - Laravel Hospital Admin Dashboard Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/Wj1jX">
								<img src="images/product/davur.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/Wj1jX">
										Davur - Restaurant Admin Dashboard
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="http://1.envato.market/Q5MyA">
								<img src="images/product/metroadmin.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="http://1.envato.market/Q5MyA">
										MetroAdmin - Bootstrap, Laravel & React Admin Dashboard
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/xBy6A">
								<img src="images/product/tixia.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/xBy6A">
										Tixia - Ticketing Admin Dashboard Bootstrap HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/9Nzn4">
								<img src="images/product/koki.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/9Nzn4">
										Koki - Restaurant Food Admin Dashboard Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/k52Bv">
								<img src="images/product/chrev.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/k52Bv">
										Chrev - Crypto Admin & Dashboard Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/0bv1Y">
								<img src="images/product/eclan.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/0bv1Y">
										Eclan - Laravel Ads Campaign Bootstrap Admin Dashboard
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/0zjyE">
								<img src="images/product/wp-beglide.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/0zjyE">
										BeGlide: Corporate Business Consultant Agency WordPress Theme 
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/NE0QP">
								<img src="images/product/wp-bheem.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/NE0QP">
										Bheem : Construction WordPress Theme RTL Ready 
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/WEdAZ">
								<img src="images/product/wp-beautyzone.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/WEdAZ">
										BeautyZone: Beauty Spa Salon WordPress Theme
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/6MAKK">
								<img src="images/product/wp-bucklin.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href=" ">
										Bucklin - Creative Personal Blog WordPress Theme 
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/oJLNY">
								<img src="images/product/archia.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/oJLNY">
										Archia - Architecture and Interior Design RTL Ready Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/XEnGb">
								<img src="images/product/agency.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/XEnGb">
										Agency | Creative Multipurpose Bootstrap 4 HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/3zZ9y">
								<img src="images/product/constructzilla .png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/3zZ9y">
										ConstructZilla : Construction, Renovation & Building HTML Template With RTL Ready
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/ZEKLg">
								<img src="images/product/cargozone.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/ZEKLg">
										CargoZone - Transport, Cargo, Logistics & Business Multipurpose HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/JZVO7">
								<img src="images/product/yogazone.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/JZVO7">
										YogaZone: Yoga, Fitness & Meditation Mobile Responsive Bootstrap Html Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/0zjxY">
								<img src="images/product/gardanzone.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/0zjxY">
										GardenZone | Agriculture, Gardening & Landscaping Responsive HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/VdYZJ">
								<img src="images/product/construct.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/VdYZJ">
										Construct : Construction, Building & Maintenance Business Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/REnO2">
								<img src="images/product/butterfly.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/REnO2">
										ButterFly : Spa, Beauty Salon & Massage Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/bQNDm">
								<img src="images/product/curv.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/bQNDm">
										CURV: One Page Multipurpose Parallax
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/zObPW">
								<img src="images/product/beautyzone.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/zObPW">
										BeautyZone: Beauty Spa Salon HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/3zZmk">
								<img src="images/product/sportszone.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/3zZmk">
										SportsZone: Sports Club, New & Game Magazine Mobile Responsive Bootstrap HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/3zZmk">
								<img src="images/product/medico.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/3zZmk">
										MediCo.- Hospital and Doctor Clinic HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/g56Wg">
								<img src="images/product/jobboard.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/g56Wg">
										Job Board: Job Portal | Job WebSite HTML Wireframe
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/1d1Nm">
								<img src="images/product/industry.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/1d1Nm">
										Industry - Factory & Industrial HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/qoKKy">
								<img src="images/product/lemars.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/qoKKy">
										Le Mars - Minimal Personal Blog HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/A53RN">
								<img src="images/product/bizmap.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/A53RN">
										BizMap - Business Directory Listing HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/EYb39">
								<img src="images/product/umang_academy.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/EYb39">
										Umang Academy : Kindergarden, Kids Play School Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/EAeOQ">
								<img src="images/product/kelsey.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/EAeOQ">
										Kelsey - Creative Personal Blog HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/xoqvR">
								<img src="images/product/bucklin.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/xoqvR">
										Bucklin - Creative Personal Blog HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 m-b30">
						<div class="product-port-bx">
							<a target="_blank" href="https://1.envato.market/WvZqM">
								<img src="images/product/smartclass.png" alt=""/>
							</a>
							<div class="product-info">
								<h4 class="title">
									<a target="_blank" href="https://1.envato.market/WvZqM">
										SmartClass | Education Agency Choching & Tuition HTML Template
									</a>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		
		<!-- Need Help -->
		<section class="app-brief" id="custom_work" style="background-image: url(images/bg1.png); background-position: left center;">
			<div class="container left-align">
				<div class="col-md-12 text-center custom-info">
					<h2 class="m-t0">Do You Need Help To Customization</h2>
					<h3 class="text-primary">After Purchase A Template...</h3>
					<h4>You Will Start Customizing According Your Requirement<br/> <span class="text-primary">BUT</span> What If You Don't Know</h4>
					<h3 class="text-black">SOLUTION IS <span class="text-primary"><u>HIRE DexignZone</u></span></h3>
					<div class="hire">
						<h4><span class="text-black">Hire Same Team For </span> <span class="text-primary">Quality Customization</span></h4>
						<ul>
							<li>We Will Customize Template According To Your Requirement</li>
							<li>We Will Upload On Server And Make Sure Your Website is Live</li>
						</ul>
						<div class="gmail-box">
							<a href="skype:rahulxarma?chat" class="gmail"><i class="fa fa-skype"></i>rahulxarma</a>
							<a target="_blank" href="mailto:dexignzones@gmail.com" class="gmail"><i class="fa fa-envelope"></i> dexignzones@gmail.com</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Change Log -->
		<section class="app-brief change-log" id="version_history">
			<div class="container left-align">
				<div class="section-header">
					<h2 class="dark-text">Version History - <small class="topbutton"><a href="#tableofcontent">#back to top</a></small></h2>
				</div>
				<h3> 09 June 2022 </h3>
				<ul>
					<li>New - Created & Upload zenix </li>
				</ul>
			</div>
		</section>
			
		<!-- Footer -->
		<footer class="app-brief grey-bg">
			<div class="container">
				<p class="copyright">
					© 2021 DexignZone , All Rights Reserved
				</p>
			</div>
		</footer>
	
	</div>
</div>
	
<!-- JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/smoothscroll.js"></script> -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.localScroll.min.js"></script>
<script src="js/load.js"></script>
<script src="js/scrollbar.min.js"></script>
<script src="js/custom.js"></script>
<script src="plugins/jstree/dist/jstree.min.js"></script>
<script src="https://dzassets.s3.amazonaws.com/w3-global.js"></script>
<script>
// prettyPhoto
jQuery(document).ready(function(){
	jQuery('.dzClickload').click(function(){
		jQuery('.dzClickload').removeClass('active');
		jQuery(this).addClass('active');
	});
	
	jQuery(".content-scroll").mCustomScrollbar({
		setWidth:false,
		setHeight:false,
		axis:"y"
	});	
		
	$(".full-height").css("height", $(window).height());
	
	$("#dz_tree").jstree({
		"core": {
			"themes": {
				"responsive": false
			}
		},
		"types": {
			"default": {
				"icon": "fa fa-folder"
			},
			"file": {
				"icon": "fa fa-file-text"
			}
		},
		"plugins": ["types"]
	});
});
</script>
</body>
</html>
