function rfr_CreateCategories()
{
		

		$returnedStr = esc_attr($_POST['option_bulkcategories']);

		//$str =  esc_attr(get_option('option_bulkcategories') ); 
		$trimmed = trim($str);
		
		$categories_array = explode(',',$trimmed);

		
	

	foreach ($categories_array as $key => $value)
	{

		
		$catString = $value.'';

		$term = term_exists($value,'category');
		if($term==0 || $term!=null)
		{
			create_category($value);
			//wp_create_category($value);
		}

		
	}

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
