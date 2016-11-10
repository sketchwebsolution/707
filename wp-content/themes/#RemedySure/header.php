<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package RemedySure
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="keywords" content="">
	<meta name="description" content="">

	
	
	<title>Remedy Sure</title>
	
	<!-- FAVICON AND APPLE TOUCH -->    
	<link rel="shortcut icon" href="favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="apple-touch-180x180.png">
	<meta name="msapplication-TileImage" content="mstile.png">
	
	<!-- FONTS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Volkhov:400,400italic">
	
	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/bootstrap/css/bootstrap.min.css"> 
	
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/fonts/fontawesome/css/font-awesome.min.css">
	
	
	<!-- REVOLUTION SLIDER -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/css/settings.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/css/layers.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/css/navigation.css">
	
    <!-- OWL Carousel -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/plugins/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/plugins/owl-carousel/owl.transitions.css">
    
	<!-- CUSTOM & PAGES STYLE -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/custom.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/pages-style.css">
	
	
	<!-- ALTERNATIVE STYLES -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/alternative-styles/springgreen.css" data-style="styles">
	

</head>

<body class="woocommerce">

	<div id="main-container">
		
		<!-- HEADER -->
		<header>
			<div id="header-top">
			
				<div class="container">
					<div class="row">
						<div class="col-sm-8">
							<div class="cart-number for-xs visible-xs pull-right"><span>4</span></div>
							<div class="widget widget-contact">

								<ul>
									<li class="login">
										<a href="http://lab-1.sketchdemos.com/P707_RemedySure/my-account">Login</a>
									</li>
									<li class="whishlist">
										<a href="http://lab-1.sketchdemos.com/P707_RemedySure/wishlist/">Whishlist</a>
									</li>
									<li class="checkout">
										<a href="http://lab-1.sketchdemos.com/P707_RemedySure/checkout">Checkout</a>
									</li>
								</ul>

							</div><!-- widget-contact -->
							
						</div><!-- col -->
						<div class="col-sm-4">
							
							<div class="widget widget-social">

								<div class="social-media">

									<a class="dribbble" href="<?php echo get_option("jetbuzz_dribbble"); ?>"><i class="fa fa-dribbble"></i></a>
									<a class="facebook" href="<?php echo get_option("jetbuzz_facebook"); ?>"><i class="fa fa-facebook"></i></a>
									<a class="twitter" href="<?php echo get_option("jetbuzz_twitter"); ?>"><i class="fa fa-twitter"></i></a>
									<a class="behance" href="<?php echo get_option("jetbuzz_behance"); ?>"><i class="fa fa-behance"></i></a>
									<a class="vimeo" href="<?php echo get_option("jetbuzz_vimeo"); ?>"><i class="fa fa-vimeo"></i></a>

								</div><!-- social-media -->

							</div><!-- widget-social -->
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			
			</div><!-- header-top -->
			<div id="header">
			
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							
							<!-- LOGO -->
							<div id="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="">
								</a>
							</div><!-- LOGO -->
							
						</div><!-- col -->
						<div class="col-sm-9">
							
                            <div class="row">
                            	<div class="col-sm-7">
                                </div>
                            	<div class="col-sm-3">
                                	<div class="onlCon hidden-xs"><?php echo get_post_meta(4, 'header_contact_caption', true ); ?><br><?php echo get_post_meta(4, 'header_contact_number', true ); ?></div>
                                </div>
                            	<div class="col-sm-2">
                                	<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><div class="cart-number hidden-xs">
                               <span>	<?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
                               </span></div></a>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-sm-12">
                                <!-- MENU --> 
                                    <nav>
                                    
                                        <a id="mobile-menu-button" href="#"><i class="fa fa-bars"></i></a>
                                                         
                                        <ul class="menu clearfix" id="menu">
                                            <?php  wp_nav_menu_no_ul(); ?>
                                            
                                            <li class="search">
        
                                                <a href="#"><i class="fa fa-search"></i></a>
        
                                                <div id="search-form-container">
                                
                                                    <form id="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>" role="search" method="get">
                                                        <input id="search" type="search" name="search" value="<?php echo get_search_query(); ?>" name="s"  placeholder="<?php _e( 'Enter keywords...', 'woocommerce' ); ?>">
                                                        <input id="search-submit" type="submit" value="<?php echo esc_attr__( '' ); ?>">
                                                        
                                                    </form>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                                <!-- search-form-container -->
        
                                            </li>
                                        </ul>
                                    
                                    </nav>
                                </div>
                            </div>
						
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				
			</div><!-- 	header -->
		</header><!-- HEADER -->
