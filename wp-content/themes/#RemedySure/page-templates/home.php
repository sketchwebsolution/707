<?php
/**
 * Template Name: Homepage Template
 * @package RemedySure
 */

 get_header(); ?>




	<div id="main-container">
		
		<!-- HEADER -->
		<!-- HEADER -->

			
		<!-- CONTENT -->
        <div id="page-content">
                <div class="rev_slider" data-version="5.0">
                    <ul>
                        <li data-transition="fade">

                            <img src="<?php bloginfo('template_directory'); ?>/images/index/revolution-slider/bg-slide-1.jpg" alt="">
                            
                            <div class="tp-caption"
                                 data-x="right"
                                 data-y="bottom"
                                 data-speed="700"
                                 data-start="1400"
                                 data-transform_in="o:0;s:700;"
                                 data-transform_out="0:0;s:700;">
                                 <img src="<?php bloginfo('template_directory'); ?>/images/index/revolution-slider/slide-1-image-1.png" alt="">
                            </div>
                            
                            <div class="tp-caption text"
                                 data-x="30"
                                 data-y="90"
                                 data-speed="700"
                                 data-start="1800"
                                 data-transform_in="y:100;s:700;e:Expo.easeIn;"
                                 data-transform_out="x:-100;s:700;">
                                 Start Better Life
                            </div>
                            
                            <div class="tp-caption title"
                                 data-x="30"
                                 data-y="125"
                                 data-speed="700"
                                 data-start="2600"
                                 data-transform_in="x:-100;s:700;"
                                 data-transform_out="x:-100;s:700;">
                                 REBUILD AND FEEL <br> JUST LIKE NEW
                            </div>
                            
                            <div class="tp-caption text-2"
                                 data-x="30"
                                 data-y="230"
                                 data-speed="700"
                                 data-start="3200"
                                 data-transform_in="o:0;s:700;"
                                 data-transform_out="o:0;s:700;">
                                 • Support healthy immune system<br>• Promote metabolism efficiency<br>• Support bone and tissue health
                            </div>
                            
                            <div class="tp-caption"
                                 data-x="30"
                                 data-y="340"
                                 data-speed="700"
                                 data-start="3800"
                                 data-transform_in="y:100;s:700;"
                                 data-transform_out="y:100;s:700;">
                                 <a target="_blank" class="btn btn-sm" href="#"><i class="fa fa-send"></i>Purchase now</a>
                            </div>
                        </li>
                        
                        <li data-transition="fade">

                            <img src="<?php bloginfo('template_directory'); ?>/images/index/revolution-slider/bg-slide-3.jpg" alt="">
                            
                            <div class="tp-caption text title-bswhite"
                                 data-x="right"
                                 data-y="55"
                                 data-hoffset="30"
                                 data-speed="700"
                                 data-start="1400"
                                 data-transform_in="y:100;s:700;e:Expo.easeIn;"
                                 data-transform_out="x:100;s:700;">
                                 Get your product
                            </div>
                            
                            <div class="tp-caption title-white text-right"
                                 data-x="right"
                                 data-y="80"
                                 data-hoffset="30"
                                 data-speed="700"
                                 data-start="2200"
                                 data-transform_in="x:100;s:700;"
                                 data-transform_out="x:100;s:700;">
                                 Happy Life With <br> RemedySure
                            </div>
                            
                            <div class="tp-caption"
                                 data-x="right"
                                 data-y="165"
                                 data-hoffset="30"
                                 data-speed="700"
                                 data-start="2600"
                                 data-transform_in="y:100;s:700;"
                                 data-transform_out="y:100;s:700;">
                                 <a target="_blank" class="btn btn-sm" href="http://themeforest.net/item/startup-basic-business-html5-css3-template/15365005?s_rank=1"><i class="fa fa-send"></i>Purchase now</a>
                            </div>
                        
                        </li>
                    </ul>
                </div><!-- rev_slider -->
			</div>
         <?php
               $post_id = 41;
               $queried_post = get_post($post_id);
               $title = $queried_post->post_title;
               $content = $queried_post->post_content;
         ?>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    
                        <div class="customheading">
                                
                            <h2><?php echo $title; ?></h2>
                            <!-- <h2>2016's Best <span>Joint Supplements</span></h2> -->
                            <p>Tired of Joint Pain and Limited Mobility?</p>
                        
                        </div><!-- headline -->
                        
                        <?php echo $content; ?>
                        
                    </div><!-- col -->
                </div><!-- row -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-centered">
                        <div class="row">
                    <?php
                        $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'orderby' =>'date','order' => 'DESC','product_cat' => 'medicine' );

                    //    $product_style_counter = array('productBox pro1', 'productBox pro2', 'productBox pro3', 'productBox pro4', 'productBox pro5', 'productBox pro6');
                        
                        $loop = new WP_Query( $args );
                        $count = 0;
                        while ( $loop->have_posts() ) : $loop->the_post(); global $product;  $count++;
                    ?>
                        <div class="col-sm-4">
                            <div class="productBox pro pro1 home-pro-box">       
                                <div class="pro-tag">New</div>
                                <div class="prdtImg">
                           <a href="<?php echo get_permalink($loop->post->ID); ?>" style="text-decoration: none;"> <?php 
                                 if (has_post_thumbnail( $loop->post->ID )) {
                                    echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');                        
                                 } else {
                                     echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />';
                                 }
                                 ?></a>
                                </div>
                                <div class="pro-price"><?php echo $product->get_price_html(); ?></div>
                                <div class="pro-title"><a href="<?php echo get_permalink($loop->post->ID); ?>" style="text-decoration: none;"><?php echo the_title(); ?></a></div>
                                <p><?php echo the_excerpt();?></p>
                                <center><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></center>                                
                                <?php
                                   if(!empty ($product->is_in_stock())){
                                ?>

                                <div class="btns-strip">
                                    <div class="pro-strip-txt" style="color:green;">In stock</div>
                                    <a href="<?php echo get_permalink($loop->post->ID); ?>" class="pro-love">Love</a>
                                    <a href="#" class="pro-reload">reload</a>
                                    <a href="#" class="pro-zoom" data-toggle="modal" data-target="#myModal<?php echo get_the_ID();?>">zoom</a>
                                    <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="pro-cart" >cart</a>
                                </div>
                                <div class="modal fade" id="myModal<?php echo get_the_ID(); ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="text-center">
                                        <p> <a href="<?php echo get_permalink($loop->post->ID); ?>" style="text-decoration: none;"><?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?></a></p>
                                    </div>
                                </div>
                            </div>
                                <?php
                            } else {
                            ?>
                                <div class="btns-strip">
                                    <div class="pro-strip-txt" style="color:red;">Out of Stock</div>
                                    <a href="<?php echo get_permalink($loop->post->ID); ?>" class="pro-love">Love</a>
                                    <a href="#" class="pro-reload">reload</a>
                                    <a href="#" class="pro-zoom" data-toggle="modal" data-target="#myModal<?php echo get_the_ID();?>">zoom</a>
                                    <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="pro-cart" >cart</a>
                                </div>
                                <div class="modal fade" id="myModal<?php echo get_the_ID(); ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="text-center">
                                        <p> <a href="<?php echo get_permalink($loop->post->ID); ?>" style="text-decoration: none;"><?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?></a></p>
                                    </div>
                                </div>
                            </div>

                            <?php
                            }
                                ?>                          
                            </div>
                            
                        </div><!-- col -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>
                    
<!--                         <div class="col-sm-4">
    <div class="productBox pro2">
        
        <div class="pro-tag">New</div>
        <div class="pro-price">$27<span>.89</span></div>
        <div class="pro-title">BRAIN<span>Support</span></div>
        <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
        <div class="btns-strip">
            <div class="pro-strip-txt">In stock</div>
            <a href="#" class="pro-love">Love</a>
            <a href="#" class="pro-reload">reload</a>
            <a href="#" class="pro-zoom">zoom</a>
            <a href="#" class="pro-cart">cart</a>
        </div>
        
    </div>
</div>col
                    
<div class="col-sm-4">
    <div class="productBox pro3">
        
        <div class="pro-tag">New</div>
        <div class="pro-price">$27<span>.89</span></div>
        <div class="pro-title">SLEEP<span>Support</span></div>
        <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
        <div class="btns-strip">
            <div class="pro-strip-txt">In stock</div>
            <a href="#" class="pro-love">Love</a>
            <a href="#" class="pro-reload">reload</a>
            <a href="#" class="pro-zoom">zoom</a>
            <a href="#" class="pro-cart">cart</a>
        </div>
        
    </div>
</div>col -->
                    
                    </div>
                </div>   
                </div><!-- row -->

<!--                 <div class="row">
    <div class="col-sm-10 col-centered">
    <div class="row">
    
    <div class="col-sm-4">
        <div class="productBox pro4">
            
            <div class="pro-tag">New</div>
            <div class="pro-price">$27<span>.89</span></div>
            <div class="pro-title">JOINT<span>Support</span></div>
            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
            <div class="btns-strip">
                <div class="pro-strip-txt">In stock</div>
                <a href="#" class="pro-love">Love</a>
                <a href="#" class="pro-reload">reload</a>
                <a href="#" class="pro-zoom">zoom</a>
                <a href="#" class="pro-cart">cart</a>
            </div>
            
        </div>
    </div>col

    <div class="col-sm-4">
        <div class="productBox pro5">
            
            <div class="pro-tag">New</div>
            <div class="pro-price">$27<span>.89</span></div>
            <div class="pro-title">MUSCLE<span>Support</span></div>
            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
            <div class="btns-strip">
                <div class="pro-strip-txt">In stock</div>
                <a href="#" class="pro-love">Love</a>
                <a href="#" class="pro-reload">reload</a>
                <a href="#" class="pro-zoom">zoom</a>
                <a href="#" class="pro-cart">cart</a>
            </div>
            
        </div>
    </div>col

    <div class="col-sm-4">
        <div class="productBox pro6">
            
            <div class="pro-tag">New</div>
            <div class="pro-price">$27<span>.89</span></div>
            <div class="pro-title">BONE<span>Support</span></div>
            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
            <div class="btns-strip">
                <div class="pro-strip-txt">In stock</div>
                <a href="#" class="pro-love">Love</a>
                <a href="#" class="pro-reload">reload</a>
                <a href="#" class="pro-zoom">zoom</a>
                <a href="#" class="pro-cart">cart</a>
            </div>
            
        </div>
    </div>col

</div>
</div>   
</div>row -->
                
            </div>
            <br><br><br>
            <section class="full-section parallax" data-stellar-background-ratio="0.1" style="background-image:url(<?php bloginfo('template_directory'); ?>/images/backgrounds/bg-3.jpg); padding:50px 0 40px;">
				
				
				
				<div class="full-section-container">
					<div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                
                                <div class="headlineService">
                                    
                                    <h2>Make your Family Happy</h2>
                                    <p><?php echo category_description( 8 ); ?></p>
                                    
                                </div><!-- headline -->
                                
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- container -->
					<div class="container">
                        <div class="row">
<?php
    $arg = array(
            //post-image
            'cat' => 8,
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
                            <div class="col-sm-4">
                                
                                <div class="service-box greenpng style-1">
                                    
                                    <i class="<?php echo get_post_meta($b1->ID, 'font_awesome_icon_class', true ); ?>"></i>
                                    
                                    <div class="service-box-content">
                                        
                                        <h4><a href="#"><?php echo $title; ?></a></h4>
                                        
                                        <p><?php echo $content; ?></p>
                                        
                                    </div><!-- service-box-content -->
                                    
                                </div><!-- service-box -->
                                
                            </div><!-- col -->

<?php
    }
?>

                        </div><!-- row -->
                    </div>
					<!-- container -->
					
				</div><!-- full-section-container -->
				
			</section>

            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
<?php
    $arg = array(
            //post-image
            'cat' => 9,
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
                        <div class="service-box style-3 icon-right">

                            <i class="<?php echo get_post_meta($b1->ID, 'font_awesome_icon_class', true ); ?>"></i>

                            <div class="service-box-content">

                                <h4><a href="#"><?php echo $title; ?></a></h4>

                                <p><?php echo $content; ?></p>

                            </div><!-- service-box-content -->

                        </div><!-- service-box -->
<?php
    }
?>


                    </div><!-- col -->
					<div class="col-sm-4">
					
						<br class="hidden-xs">
						
						<p><img src="<?php bloginfo('template_directory'); ?>/assets/images/servImg.png" alt=""></p>
						
						<br class="visibl-block-xs">
						
					</div><!-- col -->



                    <div class="col-sm-4">
<?php
    $arg = array(
            //post-image
            'cat' => 10,
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


                        <div class="service-box style-3 icon-left">

                            <i class="<?php echo get_post_meta($b1->ID, 'font_awesome_icon_class', true ); ?>"></i>

                            <div class="service-box-content">

                                <h4><a href="#"><?php echo $title; ?></a></h4>

                                <p><?php echo $content; ?></p>

                            </div><!-- service-box-content -->

                        </div><!-- service-box -->



<?php
    }
?>

                    </div><!-- col -->
                </div><!-- row -->
                
                
                <div class="row">
                    <div class="col-sm-4 col-centered">
							<a href="#" class="btnFullPack">Buy Full Pack</a>
                    </div><!-- col -->
                    <div class="col-sm-12">
							<p class="btnFullPacktxt">Just For $99.50</p>
                    </div><!-- col -->
                    <div class="col-sm-12">
							<img src="<?php bloginfo('template_directory'); ?>/assets/images/pack.png" alt="" class="center-block">
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">
                    
                </div><!-- row -->
                
            </div><!-- container -->
            
            
            <section class="full-section dark-section parallax" id="section-2" data-stellar-background-ratio="0.1" style="margin-bottom:0px;">
				<div class="full-section-container">
					
					<div class="container">
						<div class="row">
							<div class="col-sm-offset-1 col-sm-10">
							
								<div class="testimonials-slider-container">
								
									<div class="owl-carousel testimonials-slider">
<?php
    $arg = array(
            //post-image
            'cat' => 11,
            'order_by' => 'date',
            'order' => 'ASC',   
            'posts_per_page' => -1
        );
  
    $a1 = get_posts($arg);

    foreach ($a1 as $b1){

      $title = $b1->post_title;
      $content = $b1->post_content;
    //  $img = the_post_thumbnail();
      $featured_images = wp_get_attachment_image_src( get_post_thumbnail_id($b1->ID), 'recent-image');


?>										<div class="item">
											
											<div class="testimonial">
								
												<img src="<?php echo $featured_images['0']?>" alt="">
												
												<blockquote>
													<p><?php echo $content; ?></p>
												</blockquote>
												
												<h4><?php echo $title; ?></h4>
												<p><?php echo get_post_meta($b1->ID, 'designation', true ); ?></p>
												
											</div><!-- testimonial -->
											
										</div><!-- item -->
<?php
    } 
?>

									</div><!-- testimonials-slider -->
									
									<div class="testimonials-slider-navigation">
										<span class="prev">Prev</span>
										<span class="next">Next</span>
									</div><!-- testimonials-slider-navigtion -->
								
								</div><!-- testimonials-slider-container -->
								
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
					
				</div><!-- full-section-container -->
			</section><!-- full-section -->


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
