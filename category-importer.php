<?php

/*
Plugin Name: Category Importer
Description: A plugin that allows you to import lots of categories with a single button click. All you need to do is add the required categories as a comma separated value in the textarea and click on the import categories button.
Version: 1.00.001
Author: Vishnu Ajit (Co-Founder at Rufora Web Technologies)

*/
// create custom plugin settings menu

// create custom plugin settings menu

add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('My Cool Plugin Settings', 'Cool Settings', 'administrator', __FILE__, 'my_cool_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_my_cool_plugin_settings' );
}


function register_my_cool_plugin_settings() {
	//register our settings
	
	register_setting( 'my-cool-plugin-settings-group', 'options_textarea' );

	rfr_CreateCategories();

}
function rfr_CreateCategories()
{
		

		$returnedStr = esc_attr($_POST['options_textarea'] );

		
		$trimmed = trim($returnedStr);
		
		$categories_array = explode(',',$trimmed);

		
	

	foreach ($categories_array as $key => $value)
	{

		
		$catString = $value.'';

		$term = term_exists($value,'category');
		if($term==0 || $term!=null)
		{
			create_category($value);
			
		}

		
	}

//	delete_option('options_textarea');


}

function create_category($value)
{
	$trimmedValue = trim($value);
	$hyphenatedValue = str_replace(" ", "-", $trimmedValue);

	wp_insert_term(
		$trimmedValue,
		'category',
		array(
			'description' => $trimmedValue,
			'slug'=> $hyphenatedValue
			)
		);

	


}



function my_cool_plugin_settings_page() {
?>
<div class="wrap">
<h1>Bulk Category Creater</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
    <table class="form-table">
        
        <tr valign="top">
        <th scope="row">Enter categories separated by commas</th>
        <td>
        <textarea cols="50" rows="8" name="options_textarea"></textarea>
        </td>
        </tr>
    </table>
    
    <?php submit_button('Bulk Create Categories'); ?>

</form>
</div>
<?php } ?>



