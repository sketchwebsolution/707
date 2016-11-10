<?php
/**
 * Template Name: About us Page
 * @package RemedySure
 */

get_header(); ?>

		<!-- CONTENT -->
        <div id="page-content">
        	
            
            <div id="page-header" data-stellar-background-ratio="0.1" style="background-image:url(<?php bloginfo('template_directory'); ?>/images/backgrounds/page-header-1.png);">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
							<h3><?php echo get_post_meta( get_the_id(), 'page_heading', true ); ?></h3>
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->    
				
				<a class="go-to-section" href="#go-to-section"><i class="fa fa-angle-down"></i></a>
				
			</div>
            
            <div id="go-to-section"></div>
            
            <div class="container">
				<div class="row">
					<div class="col-md-8">
						
						<div class="title">
							<h4><?php echo get_post_meta( get_the_id(), 'page_subheading', true ); ?></h4>
						</div><!-- title -->
						<?php while (have_posts()): the_post(); ?>
							<div class="row">	
								<?php the_content(); ?>
							</div><!-- row -->
						<?php endwhile; ?>
						<br>
						
						<p><a class="btn" href="#">Read more</a></p>
						
					</div><!-- col -->
					<div class="col-md-4">
						
						<div class="row">
							<div class="col-sm-6">
										
								<div class="pie-chart-container">

									<div class="pie-chart default" data-percent="75" data-size="120" data-line-width="3" data-track-color="transparent" data-bar-color="#00cee0">

										<div class="pie-chart-percent">

											<h3><span class="value"></span>%</h3>

										</div><!-- pie-chart-percent -->

									</div><!-- pie-chart -->
									
									<div class="pie-chart-details">
										
										<h6>Healthy</h6>
										<p>Dolor sit amet</p>
										
									</div><!-- pie-chart-details -->
									
								</div><!-- pie-chart-container -->
							
							</div><!-- col -->
							<div class="col-sm-6">
								
								<div class="pie-chart-container">

									<div class="pie-chart default" data-percent="90" data-size="120" data-line-width="3" data-track-color="transparent" data-bar-color="#00cee0">

										<div class="pie-chart-percent">

											<h3><span class="value"></span>%</h3>

										</div><!-- pie-chart-percent -->

									</div><!-- pie-chart -->
									
									<div class="pie-chart-details">
										
										<h6>Active Life</h6>
										<p>Lorem ipsum</p>
										
									</div><!-- pie-chart-details -->
									
								</div><!-- pie-chart-container -->
							
							</div><!-- col -->
						</div><!-- row -->
						
					</div><!-- col -->
				</div><!-- row -->
			</div>
            
            <div class="container">
				<div class="row">
					<div class="col-sm-12">
					
						<div class="headline headline-animation" style="visibility: visible;">
								
							<h2><?php echo get_post_meta( get_the_id(), 'page_timeline_heading_text', true ); ?></h2>
							<p>Timeline</p>
						
						</div><!-- headline -->
					
					</div><!-- col -->
				</div><!-- row -->
			</div>
            <div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<ul class="timeline">
							<li>
							
								<div class="row">
									<div class="col-sm-5">
										
										
										
									</div><!-- col -->
									<div class="col-sm-2">
										
										<div class="period"><?php echo get_post_meta( get_the_id(), 'page_timeline_date_one', true ); ?></div>
										
									</div><!-- col -->
									<div class="col-sm-5">
										
										<h4><?php echo get_post_meta( get_the_id(), 'page_timeline_date_one_achievements_title', true ); ?></h4>
										
											<?php echo get_field('Sept_2015_achievements', get_the_id()); ?>
										
									</div><!-- col -->
								</div><!-- row -->
							
							</li>
							<li>
							
								<div class="row">
									<div class="col-sm-5 col-sm-push-5">
										
										
										
									</div><!-- col -->
									<div class="col-sm-2">
										
										<div class="period"><?php echo get_post_meta( get_the_id(), 'page_timeline_date_two', true ); ?></div>
										
									</div><!-- col -->
									<div class="col-sm-5 col-sm-pull-7 text-right">
										
										<h4><?php echo get_post_meta( get_the_id(), 'page_timeline_date_two_achievements_title', true ); ?></h4>
										
											<?php echo get_field('July_2015_achievements', get_the_id()); ?>
										
									</div><!-- col -->
								</div><!-- row -->
							
							</li>
							<li>
							
								<div class="row">
									<div class="col-sm-5">
										
										
										
									</div><!-- col -->
									<div class="col-sm-2">
										
										<div class="period"><?php echo get_post_meta( get_the_id(), 'page_timeline_date_three', true ); ?></div>
										
									</div><!-- col -->
									<div class="col-sm-5">
										
										<h4><?php echo get_post_meta( get_the_id(), 'page_timeline_date_three_achievements_title', true ); ?></h4>
										
											<?php echo get_field('Sept_2013_achievements', get_the_id()); ?>
										
									</div><!-- col -->
								</div><!-- row -->
							
							</li>
							<li>
							
								<div class="row">
									<div class="col-sm-5 col-sm-push-5">
										
										
										
									</div><!-- col -->
									<div class="col-sm-2">
										
										<div class="period"><?php echo get_post_meta( get_the_id(), 'page_timeline_date_four', true ); ?></div>
										
									</div><!-- col -->
									<div class="col-sm-5 col-sm-pull-7 text-right">
										
										<h4><?php echo get_post_meta( get_the_id(), 'page_timeline_date_four_achievements_title', true ); ?></h4>
										
											<?php echo get_field('August_2012_achievements', get_the_id()); ?>
										
									</div><!-- col -->
								</div><!-- row -->
							
							</li>
							<li>
							
								<div class="row">
									<div class="col-sm-5">

									</div><!-- col -->
									<div class="col-sm-2">
										
										<div class="period"><?php echo get_post_meta( get_the_id(), 'page_timeline_date_five', true ); ?></div>
										
									</div><!-- col -->
									<div class="col-sm-5">
										
										<h4><?php echo get_post_meta( get_the_id(), 'page_timeline_date_five_achievements_title', true ); ?></h4>
										
											<?php echo get_field('April_2011_achievements', get_the_id()); ?>
										
									</div><!-- col -->
								</div><!-- row -->
							
							</li>
						</ul>
						
					</div><!-- col -->
				</div><!-- row -->
			</div>
            
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
