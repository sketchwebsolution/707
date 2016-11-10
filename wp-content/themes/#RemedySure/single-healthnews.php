<?php
get_header();

?>
		
			
		<!-- CONTENT -->
		<div id="page-content">
			
			<div id="page-header">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
							<h3>Health News Detail</h3>
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				
				<a class="go-to-section" href="#go-to-section"><i class="fa fa-angle-down"></i></a>
				
			</div><!-- page-header -->
			
			<div id="go-to-section"></div>
			
            
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<div class="headline" style="margin-bottom:20px;">
							
							<h2><?php echo get_the_title(get_the_ID()); ?></h2>
							<p>Curb your sweet tooth</p>
							
						</div><!-- headline -->
                        
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
            
            <div class="container" >
             <?php  
			wp_reset_query();
	  	
		if(have_posts()){
		
		the_post();
		?>
				<div class="row">
					<div class="col-sm-8">
						
                         
                        <div class="owl-carousel images-slider">
                        <?php  if( class_exists('Dynamic_Featured_Image') ) {
       global $dynamic_featured_image;
       $featured_images = $dynamic_featured_image->get_featured_images(); 
                         }
       //echo $featured_images;
                        // echo "Testing". $featured_images[0][full];
                         //print_r($featured_images);
       for($i=0; $i<count($featured_images);$i++)
       {
           ?>
							<div class="item">
								<img src="<?php echo $featured_images[$i][full]; ?>" alt="">
							</div><!-- item -->

							<?php } ?>
							
							
						</div>
                        
                        <p class="text-center"><?php echo get_the_excerpt(); ?></p>
                        <br>
                        
                      <div class="tabs style-1">

							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#tab-1-1">Why Us?</a></li>
								<li><a data-toggle="tab" href="#tab-1-2">Features</a></li>
								<li><a data-toggle="tab" href="#tab-1-3">Elements</a></li>
							</ul>

							<div class="tab-content">
								<div id="tab-1-1" class="tab-pane fade in active">
											
								<?php echo get_post_meta(get_the_ID(),'why-us',true); ?>
									
								</div><!-- tab-pane -->
								<div id="tab-1-2" class="tab-pane fade">
											
									<?php echo get_post_meta(get_the_ID(),'features',true); ?>

								</div><!-- tab-pane -->
								<div id="tab-1-3" class="tab-pane fade">
											
								<?php echo get_post_meta(get_the_ID(),'elements',true); ?>

								</div><!-- tab-pane -->
							</div><!-- tab-content -->

						</div>  
					</div><!-- col -->
                    <div class="col-sm-4">
						
						<div class="title">
							<h4>Health Tip Points</h4>
						</div><!-- title -->
						
						<ul class="project-details">
							<li><span>Tip: </span> <?php echo get_post_meta(get_the_ID(),'healthtips',true); ?></li>
							<li><span>Date Posted: </span> February 22, 2016</li>
							<li><span>Suggested: </span> <?php echo get_post_meta(get_the_ID(),'suggested',true); ?></li>
							<li><span>Related Url: </span> <a href="#"><?php echo get_post_meta(get_the_ID(),'related_url',true); ?></a></li>
							<!--li><span>Category: </span> Teeth, Health, Tips</li-->
						</ul>
						<br>
                        <div class="title">
							<h4>Health Tip Overview</h4>
						</div><!-- title -->
						
						<?php the_content(); ?>
                        <br>
							<?php $add_datas=explode(',', get_post_meta(get_the_ID(),'statistics',true)); 
							//print_r($add_datas);
							?>
							<?php foreach ($add_datas as $add_data) {

								# code...
								$add_field=explode(':',$add_data);
								//print_r($add_field);
							?>
						<div class="progress-bar-title"><?php echo $add_field[0];?></div>

						<div class="progress">
							<div class="progress-bar" data-width="<?php echo $add_field[1];?>">
								<span><?php echo $add_field[1];?>%</span>
							</div><!-- progress-bar -->
						</div><!-- progess -->
						<?php } ?>
						
						
					
                        
					</div><!-- col -->
				</div><!-- row -->
				<?php } ?>
			</div><!-- container -->
            <br><br>
						
                       
			
			<br><br>
			
			
			
			
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
			
		</div><!-- PAGE CONTENT -->
		
		
		<!-- FOOTER -->
  <?php
  get_footer(); 

 