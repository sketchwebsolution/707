<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "lp";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Set the Options Array
$options = array();

/*$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Logo",
					"desc" => "Upload Your Logo",
					"id" => "jetbuzz_logo",
					"std" => "",
					"type" => "upload");
	*/

/*$options[] = array( "name" => "Favicon",
					"desc" => "Upload favicon images.",
					"id" => "jetbuzz_favicon",
					"std" => "",
					"type" => "upload"); */
					
/*$options[] = array( "name" => "Phone no.",
					"desc" => "Here you can enter any text you want",
					"id" => "jetbuzz_phone",
					"std" => "",
					"type" => "text");		

$options[] = array( "name" => "Email Address",
					"desc" => "Give your email address",
					"id" => "jetbuzz_email",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Footer Email Address",
					"desc" => "Give your email address",
					"id" => "jetbuzz_ft_email",
					"std" => "",
					"type" => "text");					
					
$options[] = array( "name" => "Address",
					"desc" => "Here you can enter any text you want",
					"id" => "jetbuzz_address",
					"std" => "",
					"type" => "textarea");*/
					
					
$options[] = array( "name" => "Social Media Options",
					"type" => "heading");

$options[] = array( "name" => "Facebook",
					"desc" => "Enter your Facebook link here.",
					"id" => "jetbuzz_facebook",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Google-plus",
					"desc" => "Enter your Google-plus link here.",
					"id" => "jetbuzz_gplus",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Linked-in",
					"desc" => "Enter your Linked-in link here.",
					"id" => "jetbuzz_lin",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Skype",
					"desc" => "Enter your Skype link here.",
					"id" => "jetbuzz_skype",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => "Twitter",
					"desc" => "Enter your Twitter link here.",
					"id" => "jetbuzz_twitter",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Dribbble",
					"desc" => "Enter your Dribbble link here.",
					"id" => "jetbuzz_dribbble",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Behance",
					"desc" => "Enter your Behance link here.",
					"id" => "jetbuzz_behance",
					"std" => "",
					"type" => "text");		

$options[] = array( "name" => "Vimeo",
					"desc" => "Enter your Vimeo link here.",
					"id" => "jetbuzz_vimeo",
					"std" => "",
					"type" => "text");			

/*$options[] = array( "name" => "Youtube",
					"desc" => "Enter your Youtube link here.",
					"id" => "jetbuzz_youtube",
					"std" => "",
					"type" => "text");*/

/*
$options[] = array( "name" => "Pinterest",
					"desc" => "Enter your pinterest link here.",
					"id" => "jetbuzz_pinterest",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Instragram",
					"desc" => "Enter your Instragram link here.",
					"id" => "jetbuzz_igram",
					"std" => "",
					"type" => "text");*/
					
/*$options[] = array( "name" => "Footer",
					"type" => "heading");

$options[] = array( "name" => "Logo",
					"desc" => "Upload Your Logo",
					"id" => "jetbuzz_logo1",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => "Header",
					"type" => "heading");					
				
$options[] = array( "name" => "Header Text",
					"desc" => "Here you can enter any text you want",
					"id" => "ice_header",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Custom Text",
					"type" => "heading");					
				
$options[] = array( "name" => "Custom Text1",
					"desc" => "Here you can enter any text you want",
					"id" => "text1",
					"std" => "",
					"type" => "textarea");

				
				
$options[] = array( "name" => "Custom Text2",
					"desc" => "Here you can enter any text you want",
					"id" => "text2",
					"std" => "",
					"type" => "textarea");
				
				
$options[] = array( "name" => "Custom Text3",
					"desc" => "Here you can enter any text you want",
					"id" => "text3",
					"std" => "",
					"type" => "textarea");
				
				
$options[] = array( "name" => "Custom Text4",
					"desc" => "Here you can enter any text you want",
					"id" => "text4",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Custom Text5",
					"desc" => "Here you can enter any text you want",
					"id" => "text5",
					"std" => "",
					"type" => "textarea");*/

					
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>