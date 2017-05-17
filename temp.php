<?php

/*
Plugin Name: Category Importer
Description: A plugin that allows you to import lots of categories with a single button click. All you need to do is add the required categories as a comma separated value in the textarea and click on the import categories button.
Version: 1.00.001
Author: Vishnu Ajit (Co-Founder at Rufora Web Technologies)

*/


function rfrCategoryImporter_install()
{


}

function rfrCategoryImporter_deactivation()
{


}

function rfrCategoryImporter_uninstall()
{

}

register_activation_hook(__FILE__,'rfrCategoryImporter_install');
register_deactivation_hook(__FILE__, 'rfrCategoryImporter_deactivation');
register_uninstall_hook(__FILE__,'rfrCategoryImporter_uninstall');


add_action('admin_menu','rfr_my_admin_menu');

function rfr_my_admin_menu()
{
	add_menu_page('Category Importer plugin', 'Bulk Category Importer','manage_options', __FILE__,'rfrCategoryImporter_admin_page', 'dashicons-tickets', 6);
}


function rfrCategoryImporter_admin_page()
{
	?>
	<div class="wrap">
		<h2> Bulk Category Importer </h2>
		<form method="POST" action="<?php echo plugins_url().'/'. plugin_basename(__DIR__).'/submitForm.php'; ?>">
		<p> Current plugin directory: <?php echo plugins_url().'/'. plugin_basename(__DIR__).'/submitForm.php'; ?>
		</p>
		<textarea name="categories_textarea" cols="52" rows="6"></textarea>
		
		<input type="submit" value="Bulk Create Categories" name="submit">
		</form>
	</div>

	<?php 
}


function import_categories()
{


}