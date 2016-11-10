<?php get_header(); ?>


		<!-- CONTENT -->
        <div id="page-content">       
            <div id="page-header" data-stellar-background-ratio="0.1" style="background-image:url(images/backgrounds/page-header-1.png);">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
                            <h3>RemedySure Products Details</h3>
							
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
								
	                   <h2 class="logoColor">Remedy<span>Sure</span> - <?php the_title(); ?></h2>
					   <p>Tired of Joint Pain and Limited Mobility?</p>
						
						</div><!-- headline -->
						<?php
                            global $product;
                            $heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'woocommerce' ) ) );
                       ?>
                        <p class="cusptxt"><?php strip_tags(the_content()); ?></p>
                        
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
            
            <br>
            <div class="container">
				<div class="row">
					<div class="col-sm-12">
                    	
                                
                        <div class="row">
                            <div class="col-sm-7">
                            	
                                <div class="row">
                            		<div class="col-xs-5 proDImg">
                                    	
                        <?php do_action(  'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); ?>
                                    </div>
                            		<div class="col-xs-7">
                                    	<div class="proDT">
  
                                            <h2><?php the_title(); ?></h2>
                    <div class="subH2"><?php echo $product->get_stock_quantity(); ?> Caplets / Item# <?php echo $product->get_sku(); ?></div>
                                            
                                            <p><?php strip_tags(the_excerpt()); ?></p>
                                            
<!--                                             <br><br> -->
                                            
                                            <span class="proDTc">Supported Goal:</span> <?php echo $product->get_categories($post->ID); ?><br>
                                            
                                            

<!--                                             <span class="proDTc">Supported Goal:</span> Health & Wellness<br>
                                            <span class="proDTc">Main Ingredient:</span> Multivitamins -->
                                            <br>

                                            <div class="ovRa">OVERALL RATING</div>
                                            <?php 
                                            $average  = $product->get_average_rating();
                                            if($average ==0){
                                                echo "No reviews yet";

                                              }else {

                                            echo $product->get_rating_html();
                                            //echo "I am testing Rating".$average;

											?>
                                            <div class="raStars"><?php printf( __( 'Rated %s out of 5 stars', 'woocommerce' ), $average ); ?>  | <span><?php echo rating_text($average); ?></span></div>

                                            <?php } ?>
                                            <div class="prodDe-btns-strip">  
                                                
                                                <a class="prodDe-reload" href="#">reload</a>
                                                <a class="prodDe-zoom" href="#">zoom</a>
                                                <a class="prodDe-cart" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>">cart</a>
                                                
                                            </div>
                                            <div class="wishlist-sec">
                                                <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
                                            </div>
                                            
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix">
                                        <?php echo do_shortcode( '[table id='.get_post_meta($post->ID,'ingredient-details', true ).' /]' ); ?>
                                    </div>
                                  <div class="other-ingrediant">
                                  <h4>Other ingredients</h4>
                                  <?php echo get_post_meta($post->ID,'other_ingredients',true); ?></div>
                            	</div>

                                
                            </div><!-- col -->
                            
                            <div class="col-sm-5">
                            	
                                <div class="addToCatBox">
                                
                                	<h2><?php the_title(); ?></h2>
                                	<div class="prodCart-tag">You Save: $4.91 (16%)</div>
<?php // do_action(  'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); ?>
                                    <div class="prodCartDbox">
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
    <div class="item inner-banner"><a href=""><img src="<?php echo $featured_images[$i][full]; ?>" alt=""></a></div>
           
           
   <?php    
       }
       
       ?>
                                    	Buy 1, Get 1 Free<br>Add 2 items into the cart
<!--                                         <span class="pdCP">List Price: $29.90</span> -->
                                        <span class="pdAP">Price: <?php echo $product->get_price_html(); ?></span>
                                        <!-- <span class="pdAP">Price: $24.99 <span class="pdGtxt">($4.03 / Ounce)</span></span> -->
                                        <span class="pdGtxt">& FREE Shipping on orders over $49</span>
                                        <div class="cartBtnB">
<!--                                         	<label>Qty:</label>
                                            <select>
                                            	<option>1</option>
                                            	<option>2</option>
                                            	<option>3</option>
                                            	<option>4</option>
                                            	<option>5</option>
                                            	<option>6</option>
                                            </select> -->
<label class="quty-label">Qty:</label>
                                        <?php do_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 ); ?>
                                            <!-- <a href="#" class="btnAddCart">Buy Full Pack</a> -->
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div><!--addToCatBox-->
                            </div><!-- col -->
                            
                        </div>
                    
                    
                    </div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
            
            
                <br><br>
                
                <div class="container">
                    <div class="row">
                    	<div class="col-sm-7">

                            <div class="tabs style-1">
    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1-1" aria-expanded="true">Description</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-1-2" aria-expanded="false">Label Information</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-1-3" aria-expanded="false">Ratings & Reviews</a></li>
                                </ul>
    
                                <div class="tab-content">
                                    <div id="tab-1-1" class="tab-pane fade active in">
                                                
                                        <h4><?php the_title(); ?></h4>  
                                        
                                        <p><?php strip_tags(the_excerpt()); ?></p>
                                       
                                        
                                    </div><!-- tab-pane -->
                                    <div id="tab-1-2" class="tab-pane fade">
                                                
<!--                                         <h4>Lorem ipsum dolor sit amet.</h4> -->
                                        
                                        <br>
                                        
                                        <p><?php strip_tags(the_content()); ?></p>
    
                                    </div><!-- tab-pane -->
                                    <div id="tab-1-3" class="tab-pane fade">
                                  <?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title"><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
				printf( esc_html( _n( '%1$s review for %2$s%3$s%4$s', '%1$s reviews for %2$s%3$s%4$s', $count, 'woocommerce' ) ), $count, '<span>', get_the_title(), '</span>' );
			else
				_e( 'Reviews', 'woocommerce' );
		?></h2>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</span>',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
										'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
										'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>',
						),
						'label_submit'  => __( 'Submit', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => '',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) . '</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'woocommerce' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>      
<!--                                        <h4>Phasellus gravida risus vitae.</h4>
                                        
                                        <br>
                                        
                                        <p>Vivamus id nunc porta urna vulputate viverra. Phasellus sapien lectus, luctus accumsan 
                                        mollis vitae, tempus eu dolor. In in condimentum ante, in fringilla purus. Nulla et libero 
                                        ac nulla iaculis blandit et et nunc. In eu ornare erat, vel blandit nisi. Maecenas in porta 
                                        elit. Sed porttitor nunc non tortor maximus, non suscipit arcu pretium augue metus. Mauris 
                                        at commodo metus, non porttitor erat</p> -->
    
                                    </div><!-- tab-pane -->
                                </div><!-- tab-content -->
                                
                                 <img src="<?php bloginfo('template_directory'); ?>/assets/images/badges.png" alt="">
                                 <br><br>
                                 <img src="<?php bloginfo('template_directory'); ?>/assets/images/proDetailic.png" alt="">
    
                            </div><!-- tabs -->
    
                        </div>
                        <div class="col-sm-4 col-sm-offset-1">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/proDetailPageImg.png" alt="">
                        </div><!-- col -->
                    </div>
                 </div><!-- container -->
                 <br>
                 <br>
                 <br>
                 <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="customheading1 headline-animation">
                                
                                <h2>RECOMMENDED PRODUCTS</h2>
                                <p>You may also like</p>
                                
                            </div><!-- headline -->
                            
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
                
                 <br><br>
          
                <div class="container">
				<div class="row">
					<div class="col-sm-12">	
						
<?php
        global $product, $woocommerce_loop;

            if ( empty( $product ) || ! $product->exists() ) {
            
            return;
}

            $related = $product->get_related( $posts_per_page );

            if ( sizeof( $related ) == 0 ) return;


           $args = apply_filters( 'woocommerce_related_products_args', array(
    'post_type'            => 'product',
    'ignore_sticky_posts'  => 1,
    'no_found_rows'        => 1,
    'posts_per_page'       => 10,
    'orderby'              => rand,
    'post__in'             => $related,
    'post__not_in'         => array( $product->id )
) );

        $loop = new WP_Query( $args );
        
       
     // echo "<pre>";
      //print_r($products); 
     // echo "</pre>";

       

?> 
        <h2><?php // _e( 'Related Products', 'woocommerce' ); ?></h2>

        
                <?php  //woocommerce_product_loop_start(); ?>
               <div class="owl-carousel logos-slider"> 
                   <?
                                while ( $loop->have_posts() )
								{
								
								$loop->the_post(); global $product;
				
				
				 ?>
 
                          
                            <?php $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ) ); ?>
                            <div>
                                <a href="<?php echo get_the_permalink($loop->post->ID ); ?>"><img src="<?php echo $image_attributes[0]; ?>" alt=""></a>
                                <a href="<?php echo get_the_permalink($loop->post->ID ); ?>"><span class="related-title"><?php echo get_the_title($loop->post->ID ); ?></span></a>
                                <div class="price"><?php echo $product->get_price_html(); ?></div>
                                
                                <a class="single_add_to_cart_button button alt" href="<?php echo esc_url($product->add_to_cart_url()); ?>">Add to Cart</a>
                                
                            </div>
                           
                    <?php } ?>
                   
                </div><!-- logos-slider -->
       




					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
            <br>

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
?>