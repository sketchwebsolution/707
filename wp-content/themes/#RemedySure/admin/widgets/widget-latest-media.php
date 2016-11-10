<?php
/**
 * Plugin Name: News Widget
 */

add_action( 'widgets_init', 'lp_media_load_widgets' );

function lp_media_load_widgets() {
	register_widget( 'LP_Media_Widget' );
}

class LP_Media_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function LP_Media_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'lp_media_widget', 'description' => __('A widget that displays your latest videos and screenshots', 'lp_media_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'lp_media_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'lp_media_widget', __('LeetPress: Latest Media', 'lp_media_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];

		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1, 'post_type' => array( 'videos', 'screenshots' ) );
		$loop = new WP_Query($query);
		if ($loop->have_posts()) :
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			
			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
			
			<div class="side-item">
						
				<div class="media-thumb">
					<div class="<?php if ( get_post_type() == 'videos' ) { ?>video<?php } elseif ( get_post_type() == 'screenshots' ) { ?>screenshot<?php } ?>-icon"></div>
					<a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('media-thumb-big'); ?></a>
				</div>
								
			</div>
			
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<?php endif; ?>
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest Media'), 'number' => __('5'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>


	<?php
	}
}

?>