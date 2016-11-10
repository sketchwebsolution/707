<?php

// Hook into WordPress
add_action( 'admin_init', 'add_custom_metabox' );
add_action( 'save_post', 'save_custom_url' );

/**
 * Add meta box
 */
function add_custom_metabox() {
	add_meta_box( 'featured-metabox', __( 'Frontpage Featured Slider' ), 'url_custom_metabox', 'slider', 'normal', 'low' );
}

/**
 * Display the metabox
 */
function url_custom_metabox() {
	global $post;
	$feature_url = get_post_meta( $post->ID, 'feature_url', true );
	?>

	<p><label for="feature_url"><strong>Link to</strong> (eg. http://yoursite.com/reviews/dead-space-2):<br />
		<input id="feature_url" size="65" name="feature_url" value="<?php if( $feature_url ) { echo $feature_url; } ?>" /></label></p>
	
<?php
}


/**
 * Process the custom metabox fields
 */
function save_custom_url( $post_id ) {
	global $post;	

	if( $_POST ) {
		update_post_meta( $post->ID, 'feature_url', $_POST['feature_url'] );
		
	}
}

/**
 * Get and return the values for the URL and description
 */
function get_url_desc_box() {
	global $post;
	$feature_url = get_post_meta( $post->ID, 'feature_url', true );
	return array( $feature_url );
}
?>