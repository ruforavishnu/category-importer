<?php


if(isset($_POST['submit']))
{
	add_action('admin_init', 'create_bulk_categories');


}

else
{
	echo ' invalid invoke attempt';
}


function create_bulk_categories()
{
	echo ' Submitted categories:'. $_POST['categories_textarea'].'<br/>';

	$returnedString = $_POST['categories_textarea'];
	echo '$returnedString:'.$returnedString.'<br/>';

	$categories_array = explode(',',$returnedString);

	echo '$categories_array exploded array:';
	print_r($categories_array);




	echo '<br/>starting for each loop'.'<br/>';

	

	foreach ($categories_array as $key => $value)
	{

			echo " $value";
			echo '<br/>';
		$catString = $value.'';
		wp_create_category($value);
	}

}


?>