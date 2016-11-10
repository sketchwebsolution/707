<?php
/**
 * The template for displaying the footer
 * Contains footer content and the closing of the #main and #page div elements.
 * @package RemedySure
 */
?>	
		
		<!-- FOOTER -->
		<footer>
			<div id="footer">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							
							<div class="widget widget-text">

								<div class="about">
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/footer-image.png" alt="">
								</div>

							</div><!-- widget-text -->
							
						</div><!-- col -->
						<div class="col-sm-3">
      <?php
            $post_id = 124;
            $queried_post = get_post($post_id);
            $title = $queried_post->post_title;
            $content = $queried_post->post_content;
      ?>	
							<div class="widget widget-pages">

								<h5 class="widget-title"><?php echo $title; ?></h5>

								 <?php wp_reset_query(); wp_nav_menu( array('menu' => 'usefullink'));?>
								
							</div><!-- widget-pages -->
							
						</div><!-- col -->
      <?php
            $post_id = 127;
            $queried_post = get_post($post_id);
            $title = $queried_post->post_title;
            $content = $queried_post->post_content;
      ?>
						<div class="col-sm-3">
							
							<div class="widget widget-contact">

								<h5 class="widget-title"><?php echo $title; ?></h5>

								<ul>
									<li class="address">
										<span>Address</span>
										<?php echo get_post_meta($post_id, 'address', true ); ?>
									</li>
									<li class="phone">
										<span>Phone / Fax</span>
										<?php echo get_post_meta($post_id, 'phone_fax', true ); ?>
									</li>
									<li class="email">
										<span>Email</span>
										<a href=""><?php echo get_post_meta($post_id, 'email', true ); ?></a>
									</li>
								</ul>

							</div><!-- widget-contact -->
							
						</div><!-- col -->
      <?php
            $post_id = 130;
            $queried_post = get_post($post_id);
            $title = $queried_post->post_title;
            $content = $queried_post->post_content;
      ?>
						<div class="col-sm-3">
							
							<div class="widget widget-recent-posts">

								<h5 class="widget-title"><?php echo $title; ?></h5>
                                
								<!--<h5 class="widget-title" style="margin-bottom:16px;">Social Networks</h5>-->
								<p><?php echo $content; ?></p>
								
								<div class="social-media">									
									<a href="<?php echo get_option("jetbuzz_facebook"); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
									<a href="<?php echo get_option("jetbuzz_gplus"); ?>" class="google"><i class="fa fa-google"></i></a>
									<a href="<?php echo get_option("jetbuzz_lin"); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
									<a href="<?php echo get_option("jetbuzz_skype"); ?>" class="skype"><i class="fa fa-skype"></i></a>
									<a href="<?php echo get_option("jetbuzz_twitter"); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
								</div>

							</div><!-- widget-recent-posts -->
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				
			</div><!-- footer -->
			<div id="footer-bottom">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							
							<div class="widget widget-text">

								<div>
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-2.png" alt="">
								</div>

							</div><!-- widget-text -->
							
						</div><!-- col -->
						<div class="col-sm-9">
							
							<div class="widget widget-pages">

								<ul>
									<li><a href="#">Term of use</a></li>
									<li><a href="#">Help Center</a></li>
									<li><a href="#">Contact Us</a></li>
									<li>RemedySure <?php echo date('Y');?> &copy; All Rights Reserved</li>
								</ul>
								
							</div><!-- widget-pages -->
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				
			</div><!-- footer-bottom -->
		</footer><!-- FOOTER -->
		
	</div><!-- MAIN CONTAINER -->
	
<?php wp_footer(); ?>	
	<!-- GO TOP -->
	<a id="scroll-up"><i class="fa fa-angle-up"></i></a>
	
	<!-- jQUERY -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/jquery/jquery-2.2.0.min.js"></script>
	
	<!-- BOOTSTRAP JS -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- VIEWPORT -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/viewport/jquery.viewport.js"></script>
	
	<!-- MENU -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/menu/hoverIntent.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/menu/superfish.js"></script>
	
	
	<!-- REVOLUTION SLIDER  -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/revolutionslider/js/extensions/revolution.extension.video.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/charts/jquery.easypiechart.min.js"></script>
    
	<!-- OWL Carousel -->
	
        
        
	<!-- OWL Carousel -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
	
	<!-- PARALLAX -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/plugins/parallax/jquery.stellar.min.js"></script>
	
	<!-- CUSTOM JS -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/custom.js"></script>
	 
	
</body>
</html>