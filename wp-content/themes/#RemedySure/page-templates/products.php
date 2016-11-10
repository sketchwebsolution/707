<?php
/**
 * Template Name: Products Page
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
					<div class="col-sm-12">
						<div class="customheading">
							<h2><?php echo get_post_meta( get_the_id(), 'page_title', true ); ?></h2>
							<p>Tired of Joint Pain and Limited Mobility?</p>
						
						</div><!-- headline -->
						      <?php  while ( have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                              <?php  endwhile; ?>
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-centered">                
                        <div class="row">
                        <?php
                            $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'orderby' =>'date','order' => 'DESC' );
                            $loop = new WP_Query( $args );
                            // $product_style_counter = array('prodBox pro1', 'prodBox pro2', 'prodBox pro3', 'prodBox pro4', 'prodBox pro5', 'prodBox pro6');
                             $count = 0;
                            while ( $loop->have_posts() ) : $loop->the_post(); global $product;  $count++;
                        ?>

                            <div class="col-sm-6">
                                <div class="prodBox pro">
                                    <div class="prodBox-image"></div>
                                    <div class="prodBox-tag">New</div>
                            <a href="<?php echo get_permalink($loop->post->ID); ?>"><?php 
                                 if (has_post_thumbnail( $loop->post->ID )) {
                                    echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');                        
                                 } else {
                                     echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />';
                                 }
                                 ?></a>                                   
                                    <div class="prodBox-price"><?php echo $product->get_price_html(); ?></div>                             
                                    <div class="prodBox-info">
                                        <div class="prodBox-title"><a href="<?php echo get_permalink($loop->post->ID); ?>" style="text-decoration: none;"><?php echo the_title(); ?></a></div>
                                        <?php echo the_excerpt();?>
                                            <center><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></center>
                                <?php
                                   if(!empty ($product->is_in_stock())){
                                ?>                                
                                        <div class="prodBox-btns-strip">
                                            <a href="<?php echo get_permalink($loop->post->ID); ?>" class="prodBox-love">Love</a>
                                            <a href="#" class="prodBox-reload">reload</a>
                                            <a href="#" data-toggle="modal" data-target="#myModal<?php echo get_the_ID();?>" class="prodBox-zoom">zoom</a>
                                            <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="prodBox-cart" >cart</a>
                                        </div>
                                        <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="prodBox-btn"></a>      
                                        <p class="prodBox-btxt" style="color:green;">In Stock</p> 
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
                                        <div class="prodBox-btns-strip">
                                            <a href="<?php echo get_permalink($loop->post->ID); ?>" class="prodBox-love">Love</a>
                                            <a href="#" class="prodBox-reload">reload</a>
                                            <a href="#" class="prodBox-zoom" data-toggle="modal" data-target="#myModal<?php echo get_the_ID();?>">zoom</a>
                                            <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="prodBox-cart" >cart</a>
                                        </div>
                                        <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="prodBox-btn"></a>      
                                        <p class="prodBox-btxt" style="color:red;">Out of Stock</p> 
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
                                    
                                    <div class="clearfix"></div>
                                </div><!--prodBox-->
                            </div><!-- col -->

<?php endwhile; ?>
<?php wp_reset_query(); ?>

                    </div>
                </div>
            </div>
        </div>

<!--             <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-centered">                
            <div class="row">
                <div class="col-sm-6">
                    <div class="prodBox pro1">
                        <div class="prodBox-image"></div>
                        <div class="prodBox-tag">New</div>
                        <div class="prodBox-price">$27<span>.89</span></div>                                    
                        <div class="prodBox-info">
                            <div class="prodBox-title">MULTI<span>Vitamin</span></div>
                            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
                            <div class="prodBox-btns-strip">
                                <a href="#" class="prodBox-love">Love</a>
                                <a href="#" class="prodBox-reload">reload</a>
                                <a href="#" class="prodBox-zoom">zoom</a>
                                <a href="#" class="prodBox-cart">cart</a>
                            </div>
                            <a href="products-detail.html" class="prodBox-btn"></a>
                            <p class="prodBox-btxt">In Stock</p>   
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>prodBox
                </div>col
                
                <div class="col-sm-6">
                    <div class="prodBox pro2">
                        <div class="prodBox-image"></div>
                        <div class="prodBox-tag">New</div>
                        <div class="prodBox-price">$27<span>.89</span></div>                                    
                        <div class="prodBox-info">
                            <div class="prodBox-title">BRAIN<span>Support</span></div>
                            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
                            
                            <div class="prodBox-btns-strip">
                                <a href="#" class="prodBox-love">Love</a>
                                <a href="#" class="prodBox-reload">reload</a>
                                <a href="#" class="prodBox-zoom">zoom</a>
                                <a href="#" class="prodBox-cart">cart</a>
                            </div>
                            
                            <a href="products-detail.html" class="prodBox-btn"></a>
                            <p class="prodBox-btxt">In Stock</p>
                            
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>prodBox
                </div>col
            </div>
        
        
        </div>col
                </div>row
    <div class="row">
                    <div class="col-sm-11 col-centered">
            
                    
            <div class="row">
                <div class="col-sm-6">
                    <div class="prodBox pro3">
                        
                        <div class="prodBox-image"></div>
                        <div class="prodBox-tag">New</div>
                        <div class="prodBox-price">$27<span>.89</span></div>                                    
                        <div class="prodBox-info">
                            <div class="prodBox-title">SLEEP<span>Support</span></div>
                            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
                            
                            <div class="prodBox-btns-strip">
                                <a href="#" class="prodBox-love">Love</a>
                                <a href="#" class="prodBox-reload">reload</a>
                                <a href="#" class="prodBox-zoom">zoom</a>
                                <a href="#" class="prodBox-cart">cart</a>
                            </div>
                            
                            <a href="products-detail.html" class="prodBox-btn"></a>
                            <p class="prodBox-btxt">In Stock</p>
                            
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>prodBox
                </div>col
                
                <div class="col-sm-6"><div class="prodBox pro4">
                        
                        <div class="prodBox-image"></div>
                        <div class="prodBox-tag">New</div>
                        <div class="prodBox-price">$27<span>.89</span></div>                                    
                        <div class="prodBox-info">
                            <div class="prodBox-title">JOINT<span>Support</span></div>
                            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
                            
                            <div class="prodBox-btns-strip">
                                <a href="#" class="prodBox-love">Love</a>
                                <a href="#" class="prodBox-reload">reload</a>
                                <a href="#" class="prodBox-zoom">zoom</a>
                                <a href="#" class="prodBox-cart">cart</a>
                            </div>
                            
                            <a href="products-detail.html" class="prodBox-btn"></a>
                            <p class="prodBox-btxt">In Stock</p>
                            
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>prodBox
                </div>col
                
            </div>
        </div>col
                </div>row
    <div class="row">
                    <div class="col-sm-11 col-centered">
            
                    
            <div class="row">
                <div class="col-sm-6">
                    <div class="prodBox pro5">
                        
                        <div class="prodBox-image"></div>
                        <div class="prodBox-tag">New</div>
                        <div class="prodBox-price">$27<span>.89</span></div>                                    
                        <div class="prodBox-info">
                            <div class="prodBox-title">BONE<span>Support</span></div>
                            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
                            
                            <div class="prodBox-btns-strip">
                                <a href="#" class="prodBox-love">Love</a>
                                <a href="#" class="prodBox-reload">reload</a>
                                <a href="#" class="prodBox-zoom">zoom</a>
                                <a href="#" class="prodBox-cart">cart</a>
                            </div>
                            
                            <a href="products-detail.html" class="prodBox-btn"></a>
                            <p class="prodBox-btxt">In Stock</p>
                            
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>prodBox
                </div>col
                
                <div class="col-sm-6"><div class="prodBox pro6">
                        
                        <div class="prodBox-image"></div>
                        <div class="prodBox-tag">New</div>
                        <div class="prodBox-price">$27<span>.89</span></div>                                    
                        <div class="prodBox-info">
                            <div class="prodBox-title">MUSCLE<span>Support</span></div>
                            <p>You don’t have to suffer from weak, limited, painful joints. Joint supplements meet your unique needs for strong, flexible joints and help to repair existing damage and prevent future damage.</p>
                            
                            <div class="prodBox-btns-strip">
                                <a href="#" class="prodBox-love">Love</a>
                                <a href="#" class="prodBox-reload">reload</a>
                                <a href="#" class="prodBox-zoom">zoom</a>
                                <a href="#" class="prodBox-cart">cart</a>
                            </div>
                            
                            <a href="products-detail.html" class="prodBox-btn"></a>
                            <p class="prodBox-btxt">In Stock</p>
                            
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>prodBox
                </div>col
                
            </div>
        
        
        </div>col
                </div>row
    
            </div>container -->
            
            
                <br><br>
                <div class="row">
                    <div class="col-sm-4 col-centered">
							<a class="btnFullPack" href="#">Buy Full Pack</a>
                    </div><!-- col -->
                    <div class="col-sm-12">
							<p class="btnFullPacktxt">Just For $99.50</p>
                    </div><!-- col -->
                    <div class="col-sm-12">
							<img class="center-block" alt="" src="<?php bloginfo('template_directory'); ?>/assets/images/pack.png">
                    </div><!-- col -->
                    
                    
                </div>
                <div class="container">
						<div class="row">
                        <div class="col-sm-12">
							<?php echo get_post_meta( get_the_id(), 'products_description_bottom_section', true ); ?>
                    </div><!-- col -->
                        </div>
                 </div>
                 
            <section class="full-section dark-section parallax" id="section-2" data-stellar-background-ratio="0.1" style="margin-bottom:0px;">
                <div class="full-section-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-10">
                                <div class="testimonials-slider-container">
                                    <div class="owl-carousel testimonials-slider">

<?php
    $arg = array(
            'cat' => 11,
            'order_by' => 'date',
            'order' => 'ASC',   
            'posts_per_page' => -1
        );
  
    $a1 = get_posts($arg);

    foreach ($a1 as $b1){

      $title = $b1->post_title;
      $content = $b1->post_content;
      $featured_images = wp_get_attachment_image_src( get_post_thumbnail_id($b1->ID), 'recent-image');


?>                                      <div class="item">
                                            
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
