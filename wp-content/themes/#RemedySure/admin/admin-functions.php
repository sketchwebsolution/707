<?php

/*-----------------------------------------------------------------------------------*/
/* Head Hook
/*-----------------------------------------------------------------------------------*/

function of_head() { do_action( 'of_head' ); }

/*-----------------------------------------------------------------------------------*/
/* Get the style path currently selected */
/*-----------------------------------------------------------------------------------*/

function of_style_path() {
    $style = $_REQUEST['style'];
    if ($style != '') {
        $style_path = $style;
    } else {
        $stylesheet = get_option('of_alt_stylesheet');
        $style_path = str_replace(".css","",$stylesheet);
    }
    if ($style_path == "default")
      echo 'images';
    else
      echo 'styles/'.$style_path;
}

/*-----------------------------------------------------------------------------------*/
/* Add default options after activation */
/*-----------------------------------------------------------------------------------*/
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	add_action('admin_head','of_option_setup');
}

function of_option_setup(){

	//Update EMPTY options
	$of_array = array();
	add_option('of_options',$of_array);

	$template = get_option('of_template');
	$saved_options = get_option('of_options');
	
	foreach($template as $option) {
		if($option['type'] != 'heading'){
			$id = $option['id'];
			$std = $option['std'];
			$db_option = get_option($id);
			if(empty($db_option)){
				if(is_array($option['type'])) {
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						update_option($c_id,$c_std);
						$of_array[$c_id] = $c_std; 
					}
				} else {
					update_option($id,$std);
					$of_array[$id] = $std;
				}
			}
			else { //So just store the old values over again.
				$of_array[$id] = $db_option;
			}
		}
	}
	update_option('of_options',$of_array);
}

/*-----------------------------------------------------------------------------------*/
/* Admin Backend */
/*-----------------------------------------------------------------------------------*/
function optionsframework_admin_head() { 
	
	//Tweaked the message on theme activate
	?>
    <script type="text/javascript">
    jQuery(function(){
	var message = '<p>This theme comes with an <a href="<?php echo admin_url('admin.php?page=optionsframework'); ?>">options panel</a> to configure settings. This theme also supports widgets, please visit the <a href="<?php echo admin_url('widgets.php'); ?>">widgets settings page</a> to configure them.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
    <?php
}

add_action('admin_head', 'optionsframework_admin_head'); 

function your_wish_form() {
	global $wpdb;
    // print some HTML for the widget to display here
	if(isset($_POST['submit_wish']))
	{
		$wish_text=$_POST['wishes'];
		$wish_date=date("Y-m-d");
		$wish_time=date("H:i:s");
		$ip=$_SERVER['REMOTE_ADDR'];
		if(str_replace(" ","",$wish_text)==""){
			$wishmsg='<span class="err">Bitte geben Sie Ihren Wunsch.</span>';			
		}
		else{
			$tab_name=$wpdb->prefix."webq_wishes";
			
		/*-------------create table if not exists------------*/
			$create_tab="CREATE TABLE IF NOT EXISTS ".$tab_name."(
				wish_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  			wish_text VARCHAR(100),
				wish_date DATE,
				wish_time TIME,
				wish_ip VARCHAR(100)		
			);
			";
			$wpdb->query($create_tab);
		 /*--------------End of create table---------------*/
		 			 
		 	$wish=$wpdb->get_results("select * from ".$tab_name." where wish_text='$wish_text' AND wish_ip='$ip'");
			if($wpdb->num_rows>0){
				$wishmsg="<span class=\"err\">Sie haben bereits diesen Wunsch vorgelegt.</span>";//You already have submitted this wish.
			}
			else{
				$wish=$wpdb->get_results("select * from ".$tab_name." where wish_date='$wish_date' AND wish_ip='$ip'");
				if($wpdb->num_rows>0){
					$wishmsg="<span class=\"err\">Heute kann man nur einen einzigen Wunsch.</span>";//Today you can submit only one wish.
				 }
				 else {
					 if(strlen($wish_text)<=50)
					 {
					 	$wpdb->insert($tab_name,array('wish_text'=>$wish_text,'wish_date'=>$wish_date,'wish_time'=>$wish_time,'wish_ip'=>$ip));
					 	$wishmsg="<span class=\"msg\">Ihr Wunsch wurde erfolgreich übermittelt.</span>";//Your wish has been successfully submitted.
					 	$admin_email = get_bloginfo( 'admin_email');
					 	$emailmsg="
						 <table>
						 <tr>
						 <td>Wish:</td><td>".$wish_text."</td>
						 </tr>
						 <tr>	
						 <td>Wish Date:</td><td>".date("jS M Y")."</td>
						 </tr>
						 <tr>	
						 <td>IP:</td><td>".$ip."</td>
						 </tr>					  
						 ";
					 	$emailsub='wünschen-'.$wish_date.'-'.$ip;
					 	$headers = "From: ".get_bloginfo( 'name')." \r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
						@mail($admin_email,$emailsub,$emailmsg,$headers);	
					 }
					 else
					 	$wishmsg="<span class=\"err\">Schreiben Sie Ihre Wünsche mit in 50 Buchstaben.</span>";//Write your wish with in 50 letters.
				 }
			}
		}
	}
    
	?>
    <script type="text/javascript">
	function validate_wish()
	{
		var fld=document.getElementById('wishes');
		if(fld.value=="" || fld.value==fld.defaultValue){
			alert('Bitte geben Sie Ihren Wunsch.');
			return false;
		}
		else
		 return true;
	}
		function fld_blur(fld){
			if (fld.value=='') fld.value=fld.defaultValue;
		}
		function fld_click(fld){
			if (fld.defaultValue==fld.value) fld.value='';
		}
	
	</script>   
    <div class="wish_div">	
		<form action="" method="post" id="wishform" onsubmit="return validate_wish();">
        	<div class="wish_div_in">
				<div class="wish_text">WISH WHAT YOU WANT ...</div>
                <div class="wish_msg"><?php echo $wishmsg; ?></div>
				<div class="wish_text_felid"><input name="wishes" type="text" id="wishes" value="Geben Sie Ihren Wunsch .." onblur="fld_blur(this);" onclick="fld_click(this);" maxlength="50"  /></div>
				<div class="ok_but"><input name="submit_wish" type="submit" value="" /></div>
			</div>
    	</form>
	</div>
<?php
}

wp_register_sidebar_widget(
    'your_wish',        // your unique widget id
    'Your Wish',          // widget name
    'your_wish_form',  // callback function
    array(                  // options
        'description' => 'Description of what your widget does'
    )
);
class Widget_banner extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'widget_banner', // Base ID
			'Banner Widget', // Name
			array( 'description' => __( 'A Widget to display banner in sidebar ', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		global $wpdb;
		extract( $args );
		$image=$instance['img'];
		$lnk=$instance['img_link'];
		$images=array("jpg","gif","bmp","png","jpeg","JPG","GIF","BMP","PNG","JPEG");
		
		if(in_array(end(explode(".",$image)),$images))
		{
		//echo $before_widget;
		
			?>
        
      	<div class="vermas_img">
      		<a href="<?php echo $lnk; ?>">
            	<img src="<?php echo $image; ?>" alt="" border="0"/>
            </a>
        </div>  			
            <?php
		
		//echo $after_widget;
		}
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['img'] = strip_tags( $new_instance['img'] );
		$instance['img_link'] = strip_tags( $new_instance['img_link'] );
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( $instance ) {
			
			$img=esc_attr( $instance[ 'img' ]);
			$img_lnk=esc_attr( $instance[ 'img_link' ]);
		}
		?>
		<p>
	
        <label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'Image:' ); ?></label> 
        <input name="<?php echo $this->get_field_name( 'img' ); ?>" class="widefat" type="text" value="<?php echo $img; ?>"  size="10"  />
        <label for="<?php echo $this->get_field_id( 'img_link' ); ?>"><?php _e( 'Link:' ); ?></label> 
        <input name="<?php echo $this->get_field_name( 'img_link' ); ?>" class="widefat" type="text" value="<?php echo $img_lnk; ?>"  size="10" />
		</p>
		<?php 
	}

} // class Foo_Widget


// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "Widget_banner" );' ) );

//function to change admin login page logo
function my_custom_login_logo() {
    echo '	<style type="text/css">
    			h1 a { background-image:url('.stripslashes(get_option('webq_logo')).') !important; }	 
    		</style>';
    }
	
if(get_option('webq_logo') && get_option('webq_logo')!=""){	
   add_action('login_head', 'my_custom_login_logo');   
}
//------------------------------------------------ 

// changing the login page URL
    function put_my_url(){
    	return get_bloginfo('url'); // putting my URL in place of the WordPress one
    }
add_filter('login_headerurl', 'put_my_url');

//--------------------------------------------------

// changing the login page URL hover text
    function put_my_title(){
    return get_bloginfo('name'); // changing the title from "Powered by WordPress" to whatever you wish
    }
add_filter('login_headertitle', 'put_my_title');
//---------------------------------------------------

//Remove admin footer text
 function custom_admin_display()
 {
	 echo '<style type="text/css">
	 #footer-thankyou { display:none}
	  </style>';
 }
add_action('admin_head', 'custom_admin_display');
//--------------------------------------------------

//remove links from admin bar
function annointed_admin_bar_remove() {
	global $wp_admin_bar;

    /* Remove their stuff */
    $wp_admin_bar->remove_menu('wp-logo');
		
	if ( !is_super_admin() || !is_admin_bar_showing() )
     {
		$wp_admin_bar->remove_menu('updates');
		$wp_admin_bar->remove_menu('comments');
	  }
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);
//------------------------------------------------------

//remove admin menu for other user
function my_remove_menu_pages() {
	
	if (!is_super_admin()){
		remove_menu_page('link-manager.php');
		remove_menu_page('tools.php');	
		remove_menu_page('edit-comments.php');
		remove_menu_page('aec_calendar_options');	
		remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );	
	 }
}
add_action( 'admin_menu', 'my_remove_menu_pages' );
//----------------------------------------

//remove dashboar widgets for others user
function remove_editors_dashboar_widgets() {
	
	if (!is_super_admin()){
		
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		
		
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
				
		
	 }
}
add_action( 'wp_dashboard_setup', 'remove_editors_dashboar_widgets' );
//----------------------------------------

// Create the function to output the contents of our Dashboard Widget

function dashboard_text_widget_function() {
	// Display whatever it is you want to show
	if(get_option('wp_widget_text') && get_option('wp_widget_text')!="")
	 	echo stripslashes(get_option('wp_widget_text'));
	else
		echo "Empty";
} 

// Create the function use in the action hook

function add_dashboard_text_widgets() {
	if(get_option('wp_widget_title') && get_option('wp_widget_title')!=""){
	wp_add_dashboard_widget('dashboard_text_widget', stripslashes(get_option('wp_widget_title')), 'dashboard_text_widget_function');
	}
} 

// Hook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'add_dashboard_text_widgets' );
//----------------------------------------------------------------

//add custom logo in admin bar
function custom_menu_logo()
{
	global $wp_admin_bar; 
	
	if (get_option('wp_admin_bar_title') && get_option('wp_admin_bar_title')!="")
		$title=stripslashes(get_option('wp_admin_bar_title'));
	else
		$title=get_bloginfo('name');
	
	if (get_option('wp_admin_bar_logo') && get_option('wp_admin_bar_logo')!="")
		$image='<img src="'.stripslashes(get_option('wp_admin_bar_logo')).'" />';
	else
		$image='<img src="'.get_bloginfo('template_url').'/images/small-logo.png" />';
		
	if (get_option('wp_admin_bar_href') && get_option('wp_admin_bar_href')!="")
		$href=stripslashes(get_option('wp_admin_bar_href'));
	else
		$href=get_bloginfo('url');
		
    $wp_admin_bar->add_menu( array(
    'title' => $image,
    'href' => $href,
	'meta'=>array('title'=>$title)
    ) );
}

add_action("admin_bar_menu", "custom_menu_logo");

//---------------------------------------------------

function remove_dashboar_side_column(){
	if (!is_super_admin()){
		echo '<style type="text/css">
	 			#dashboard-widgets #side-sortables { display:none}
	  		</style>
		';
	}
}
add_action('admin_head','remove_dashboar_side_column');

//add page to settings menu for admin bar logo
function admin_bar(){
	if(isset($_POST['save']))
	{
		update_option('wp_admin_bar_title',$_POST['link_title'],true);
		update_option('wp_admin_bar_logo',$_POST['link_image'],true);
		update_option('wp_admin_bar_href',$_POST['link_href'],true);
		$msg="Settings Successfully Saved";
	}
	
	echo '	<form action="" method="post">
				<table>
					<tr>
						<td colspan="3"><h1>Admin Bar Settings</h1></td>
					</tr>
					<tr>
						<td colspan="3" style="color:#060">'.$msg.'</td>
					</tr>
					<tr>						
						<td>Title:</td>
						<td><input type="text" name="link_title" size="50" value="'.stripslashes(get_option('wp_admin_bar_title')).'" ></td>
						<td style="color:#666; ">Enter a hover title</td>
					</tr>
					<tr>
						<td>Image Url:</td>
						<td><input type="text" name="link_image" size="50" value="'.stripslashes(get_option('wp_admin_bar_logo')).'" ></td>
						<td style="color:#666; ">Enter your 28 X 28 image url here</td>
					</tr>
					<tr>
						<td>Link:</td>
						<td><input type="text" name="link_href" size="50" value="'.stripslashes(get_option('wp_admin_bar_href')).'" ></td>
						<td style="color:#666; ">Enter redirect link</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="save" size="30" value=" Save " class="button-primary"></td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</form>
	';
}


//Page for Dashboard widget
function text_widget(){
	if(isset($_POST['save']))
	{
		update_option('wp_widget_title',$_POST['widget_title'],true);
		update_option('wp_widget_text',$_POST['widget_text'],true);
		$msg="Settings Successfully Saved";
	}
	
	echo '	<form action="" method="post">
				<table width="100%">
					<tr>
						<td colspan="3"><h1>Dashboard Text Widget</h1></td>
					</tr>
					<tr>
						<td colspan="3" style="color:#060">'.$msg.'</td>
					</tr>
					<tr>						
						<td><strong>Title:</strong></td>
						<td><input type="text" name="widget_title" size="100" style=" height:30px;" value="'.stripslashes(get_option('wp_widget_title')).'" ></td>
						<td style="color:#666; ">Enter widget title</td>
					</tr>
					<tr>
						<td><strong>Widget Text:</strong></td>
						<td>'; the_editor(stripslashes(get_option('wp_widget_text')), $id = 'widget_text', $prev_id = 'title', $media_buttons = false);
						echo '</td>
						<td style="color:#666; ">Enter text for widget</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="save" size="30" value=" Save " class="button-primary"></td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</form>
	';
}
function my_plugin_menu() {
	add_options_page('Admin Bar settings', 'Admin Bar settings', '8', 'admin-bar', 'admin_bar');
	add_options_page('Dashboard Widget', 'Dashboard Widget', '8', 'text-widget', 'text_widget');
}
add_action('admin_menu', 'my_plugin_menu');

?>