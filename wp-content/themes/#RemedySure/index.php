<?php
/**
 * The main template file
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

 <div id="page-content">            
            <div id="page-header" data-stellar-background-ratio="0.1" style="background-image:url(<?php bloginfo('template_directory'); ?>/images/backgrounds/page-header-1.png);">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
							<h3>Search Page</h3>
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->    
				
				<a class="go-to-section" href="#go-to-section"><i class="fa fa-angle-down"></i></a>
				
			</div>
            
            <div id="go-to-section"></div>

<div id="main-content" class="main-content">


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
                    <div class="container">

			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="inner-heading">
              <?php  
             		 wp_reset_query();
					if(have_posts()){
					the_post(); ?>
                 <h2><?php the_title(); ?></h2></div>
                
               
                 
                 
                <div class="inner-cont clearfix">
                 <?php if(has_post_thumbnail()){ ?>
                    <div class="searchImage">
                    <?php the_post_thumbnail(); ?> 
                 </div>
                 <?php } ?>
                 
                 <?php the_content(); ?>
                 
                <!--2nd product slider-->
                
               
               <?php } ?>
                
                 <div class="clearfix"></div>
                </div> 
            </div>
	    <!-- / right section -->
        </div>
                    </div>

		</div><!-- #content -->
	</div><!-- #primary -->
	
</div><!-- #main-content -->
 </div>
<?php

get_footer();
