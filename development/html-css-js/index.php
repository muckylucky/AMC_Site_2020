<!DOCTYPE html>
<html>
<head>


    <meta name='Keywords'  content='web design, mobile design, app design, touch design, london, freelance'/>
	<meta name='Description' content='Web and mobile designer and developer based in london - available for freelance projects.'/>

    <title>Andrew McCluckie -- [ London based digital designer for web, mobile and touch ]</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
    <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <script type="text/javascript" src="scripts/content_loader_new.js"></script>
	<style>
		/*For in progress overlay*/
		@import url(https://fonts.googleapis.com/css?family=Lato:400,300,700,700italic,400italic);
		.overlay {
			background:rgba(0,0,0,0.5);
			background-image:url(images/diaglines-bw.gif);
			position:absolute;
			width:100%;
			height:100%;
			top:0;
			left:0;
			bottom:0;
			right:0;
			z-index:10000;
			font-family: Lato, Helvetica, Arial, sans-serif;
			opacity:0.75;
			-webkit-transform: translateZ(0);

		}
		.message-wrapper {
			position:absolute;
			width:100%;
			height:100%;
			top:0;
			left:0;
			bottom:0;
			right:0;
			z-index:10001;
		}
		
		.overlay-message {
			  position:relative;
			  top:20%;
			  width:400px;
			  margin:0 auto;
			  padding:5em;
			  border:4px solid #000;
			  background:#fff;
			  
		  }
		  	.overlay-message p, .overlay-message a, .overlay-message h2 {
				font-family: Lato, Helvetica, Arial, sans-serif;
				
			}
			.overlay-message p {
				font-size:16px;	
			}

			.primary-button {
				border: 2px solid #f8116a;
				color: #f8116a;
				opacity: 0.5;
				padding: 0.5rem 1rem;
				transition: background 0.5s ease 0s;
			}
			.primary-button:hover {
				color:#fff;
				opacity:1;
				text-decoration:none;
				background:#f8116a;
			}
</style>
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
</head>

<body>
	<!-- Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LMG3KVLFG4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LMG3KVLFG4');
</script>
<!-- End Google Tag Manager -->    
<div class="overlay">

    </div>
    <div class="message-wrapper">
    	<div class="overlay-message">
        	<h2>Andrew McCluckie&rsquo;s portfolio site is currently being updated</h2>
            <p>It&rsquo;s been a while, 2011 in fact, since it had a major design release. Whilst work is being carried-out you can either:</p>
            <a href="/online-cv/" class="primary-button">View my online CV</a>
            <br>
            <br>
            <p>or</p>
            <a href="#" id="overlay-close" class="primary-button">View the old site</a>
        </div>
    </div>
       	<div id="wrapper" class="top_stuff">
    	<div id="about">
            <ul id="about_list">
                <li><a href="http://www.linkedin.com/profile/view?id=20391639&trk=tab_pro" title="Linkedin profile." class="linkedIn">Linkedin profile</a></li>
                <li><a href="http://www.flickr.com/photos/mccluckie" title="Flickr profile." class="flick">Flickr profile</a></li>
            </ul>        	
            <p>Hi, I'm Andrew McCluckie and I've been a designer for a good few years and started specialising in web design four years ago.
               After honing my skills hand-coding html &amp; css and learning to deal with the nightmare of IE6 I moved onto learning jQuery.
               Over the past two years I have been learning more jQuery as well as raw javascript and PHP.</p>
            <p>Recently what's been fascinating me is development for mobile/touch devises and adaptive layouts using media queries. Earlier this year 
               I built my first native Android app using Phonegap and converted a previous site to become device independant.</p>
			<div class="clear"></div>
            <a href="#about" class="top_close">Close</a> 
        </div>
    	<div id="contact" class="top_stuff">
            <h2>Contact form is currently offline.</h2>
            <p><a href="#" id="email_link">andy</a></p>

            <a href="#contact" class="top_close">Close</a> 
		</div>

        <div id="nav_left">
        	<a href="home.php"><img src="images/logo_header.png" alt="Logo of Andrew McCluckie" width="160" height="65" id="logo_header" /></a>
        	<ul>
            	<li><a href="web.php">Web and mobile</a></li>
            	<li><a href="print.php">Print</a></li>
            	<li><a href="identity.php">Identity</a></li>
            	<li><a href="3d.php">3D</a></li>
            	<li><a href="photography/photography.php">Photography</a></li>
            </ul>
            <p id="copyright_notice">&copy; <span id="copy_year">2011</span> Andrew M<sup>c</sup>Cluckie</p>
        </div><!--End nav_left-->
        
      <div id="header">
        	<ul id="header_links">
            	<li><a href="#about" id="about_button">About</a></li>
            	<li><a href="#contact" id="contact_button">Contact</a></li>
            	<!--<li><a href="includes/admin.php" id="admin_button">Admin</a></li>-->
            </ul>
      </div>  <!--End header-->

      <div id="content">

      </div><!--End Content-->
    
    	<div class="clearfix"></div>
        <div id="footer">
            <div id="footer_inner">
                <div class="footerCol">
                    <h3>Follow me!</h3>
                    <ul>
                        <li><a href="http://www.linkedin.com/profile/view?id=20391639&trk=tab_pro" title="Linkedin profile." class="linkedIn">Linkedin profile</a></li>
                        <li><a href="http://www.flickr.com/photos/mccluckie" title="Flickr profile." class="flick">Flickr profile</a></li>
                    </ul>
                </div>
                
                <div class="footerCol">
					<h3>Skills</h3>
                    <ul>
                    	<li>UX/UI</li>
                    	<li>Javascript</li>
                    	<li>jQuery/jQuery mobile/jqtouch</li>
                    	<li>PHP</li>
                    	<li>MySQL</li>
                    	<li>XML</li>
                    	<li>AJAX</li>                
                	</ul>
                </div>

                                
            </div>
        </div><!--End footer-->
        
	</div><!-- END WRAPPER -->
<div id="mask"></div>
</body>
</html>
