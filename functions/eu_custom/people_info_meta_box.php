<?php 

$meta_box_people_info =
array(

	"position" => array(
	"name" => "position",
	"type" => "input",
	"std" => "",
	"description" => "Enter the position for this person",
	"title" => "<strong>Position</strong>"),
	
	"emailaddress" => array(
	"name" => "emailaddress",
	"type" => "input",
	"std" => "",
	"description" => "Enter the email address for this person",
	"title" => "<strong>Email</strong>")

);

function meta_box_people_info() {
global $post, $meta_box_people_info;
	
	foreach($meta_box_people_info as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo $meta_box['title'].'<br />';
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		}
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';	
	}
}		

function create_people_info_meta_box(){
	global $theme_name, $meta_box_people_info;
	if (function_exists('add_meta_box') ) {	
	add_meta_box( 'meta-box-people-info', 'People Info', 'meta_box_people_info', 'people', 'normal', 'high' );	
	}
}

function save_people_info($post_id){
	global $post, $meta_box_people_info;  
	
	foreach($meta_box_people_info as $meta_box) {  
		
		// Verify  
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		return $post_id;  
		}  
	
	if ( 'page' == $_POST['post_type'] ) {  
	if ( !current_user_can( 'edit_page', $post_id ))  
	return $post_id;  
	} else {  
	if ( !current_user_can( 'edit_post', $post_id ))  
	return $post_id;  
	}  
	
	$data = $_POST[$meta_box['name'].'_value'];  
	
	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
	add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
	update_post_meta($post_id, $meta_box['name'].'_value', $data);  
	elseif($data == "")  
	delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
	}
}


add_action('admin_menu', 'create_people_info_meta_box');
add_action('save_post', 'save_people_info');

?>