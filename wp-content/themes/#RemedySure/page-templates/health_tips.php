<?php
/**
 * Template Name: Health Tips Page
 * @package RemedySure
 */

get_header(); ?>


		<!-- CONTENT -->
        <div id="page-content">            
            <div id="page-header" data-stellar-background-ratio="0.1" style="background-image:url(<?php bloginfo('template_directory'); ?>/images/backgrounds/page-header-1.png);">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
							<h3><?php echo get_post_meta(get_the_id(), 'Page_Heading', true ); ?></h3>
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->    
				
				<a class="go-to-section" href="#go-to-section"><i class="fa fa-angle-down"></i></a>
				
			</div>
            
            <div id="go-to-section"></div>
            
            <div class="container">
				<div class="row">
					<div class="col-sm-12">
					
						<div class="customheading">
								
							<h2><?php echo get_post_meta(get_the_id(), 'Page_Subheading', true ); ?></h2>
							<p>Tired of Joint Pain and Limited Mobility?</p>
						
						</div><!-- headline -->
                        
                        
					</div><!-- col -->
				</div><!-- row -->
			</div>
          
          
          
          <div class="container">
				<div class="row">
<?php
    $arg = array(
            //post-image
            'cat' => 13,
            'order_by' => 'date',
            'order' => 'ASC',   
            'posts_per_page' => -1
        );
  
    $a1 = get_posts($arg);

    foreach ($a1 as $b1){

      $title = $b1->post_title;
      $content = $b1->post_content;
      $img = the_post_thumbnail();
      $featured_images = wp_get_attachment_image_src( get_post_thumbnail_id($b1->ID), 'recent-image');

?>
					<div class="col-sm-4 health-tips">
							
						<a href="<?php echo get_the_permalink($b1->ID); ?>"><div class="service-box style-1">
							
							<i class="<?php echo get_post_meta($b1->ID, 'font_awesome_icon_class', true ); ?>"></i>
							
							<div class="service-box-content">
								<h4><?php echo get_the_title( $b1->ID ); ?></h4>
								
								<p><?php echo substr($content,0,102); ?></p>
								
                                                            </div>
							
						</div></a><!-- service-box -->
					</div><!-- col -->
<?php
	}
?>

				</div><!-- row -->
			</div><!-- container -->
  
            <section class="full-section dark-section" id="section-5">
				<div class="full-section-container">
					
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								
								<h2 class="text-center no-margin-bottom"><strong>Are you ready for the time of your life? 
								<span style="color:#242424;">Buy RemedySure now!</span></strong></h2>
								
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
					
				</div><!-- full-section-container -->
			</section><!-- full-section -->
        </div>
		<!-- PAGE CONTENT -->





<?php
// get_sidebar();
get_footer();
