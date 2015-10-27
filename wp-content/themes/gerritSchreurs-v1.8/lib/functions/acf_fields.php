<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_55740ee40d453',
	'title' => 'Fotografie',
	'fields' => array (
		array (
			'key' => 'field_55740eed055af',
			'label' => 'Afbeeldingen',
			'name' => 'images_obj',
			'type' => 'repeater',
			'instructions' => 'A <em>Photography</em> project can contain more images.<br/>
These images will the resized to divers formats.<br/>
In the overview the image will be cropped to <em>600 x 400px</em>. In all other cases the image won\'t be cropped.<br/>
The original images should be at least <em>3000px</em> width (if possible).<br/>
If this is not possible, the fallback will be that the extra <em>zoom</em> is disabled.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Nieuw beeld',
			'sub_fields' => array (
				array (
					'key' => 'field_55740f15055b0',
					'label' => 'Afbeelding',
					'name' => 'image_obj',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_55a635a9d3a8a',
					'label' => 'Thumbnail',
					'name' => 'thumb',
					'type' => 'image',
					'instructions' => 'If you want a different thumbnail in the photography overview, please select here a new image. This images should alway be 3:2 proportional (minimal of 600x400px).',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_557745750efcb',
					'label' => 'Double the size',
					'name' => 'double_size',
					'type' => 'checkbox',
					'instructions' => 'Make the image twice the size in the overview. Use with care.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 20,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'double' => 'Double',
					),
					'default_value' => array (
						'' => '',
					),
					'layout' => 'vertical',
					'toggle' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'photography_item',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_55a683d29e4b7',
	'title' => 'Google Analytics',
	'fields' => array (
		array (
			'key' => 'field_55a6842a2a91b',
			'label' => 'Tracking ID',
			'name' => 'ga_id',
			'type' => 'text',
			'instructions' => 'Please provide a Google Analytics Tracking ID',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-google-analytics',
			),
		),
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-general-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_557c2ff6d0df0',
	'title' => 'Home - film',
	'fields' => array (
		array (
			'key' => 'field_557c2ff6d37a6',
			'label' => 'Film images',
			'name' => 'film_images',
			'type' => 'repeater',
			'instructions' => 'Images for the <em>Film slideshow</em> on the homepage .<br/>
These images will be resized to 1400px width. Height is variable.<br/>
The list will the random ordered from the images below.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Nieuwe regel',
			'sub_fields' => array (
				array (
					'key' => 'field_557c2ff6d4bf2',
					'label' => 'Film image',
					'name' => 'film_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
	),
));

acf_add_local_field_group(array (
	'key' => 'group_5579893e3d1ba',
	'title' => 'Home - photography',
	'fields' => array (
		array (
			'key' => 'field_55798990d3d74',
			'label' => 'Photography images',
			'name' => 'photography_images',
			'type' => 'repeater',
			'instructions' => 'Images for the <em>Photography slideshow</em> on the homepage .<br/>
These images will be resized to 1400px width. Height is variable.<br/>
The list will the random ordered from the images below.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Nieuwe regel',
			'sub_fields' => array (
				array (
					'key' => 'field_557989b6d3d75',
					'label' => 'Photography image',
					'name' => 'photography_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
	),
));

acf_add_local_field_group(array (
	'key' => 'group_557c2c236ece1',
	'title' => 'Language',
	'fields' => array (
		array (
			'key' => 'field_557c2c7156f9e',
			'label' => 'Text to switch to other language',
			'name' => 'text_to_language',
			'type' => 'text',
			'instructions' => 'A text shown in the navigation to which language.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_557c2c3056f9d',
			'label' => 'Location to other language',
			'name' => 'location_language',
			'type' => 'url',
			'instructions' => 'Provide the link to the other language',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-language',
			),
		),
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-general-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5572c74c30c48',
	'title' => 'Meta info',
	'fields' => array (
		array (
			'key' => 'field_5572c7663715e',
			'label' => 'Who does what',
			'name' => 'who_does_what',
			'type' => 'repeater',
			'instructions' => 'A summary of people involved in the project.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Nieuwe regel',
			'sub_fields' => array (
				array (
					'key' => 'field_5572c7a03715f',
					'label' => 'What',
					'name' => 'what',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5572c7b437160',
					'label' => 'Who',
					'name' => 'who',
					'type' => 'text',
					'instructions' => 'A hyperlink is possible:<br/>
<a href=\'http://www.url.nl\' target=\'_blank\'>Name</a>',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'film_item',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_557727cda6a53',
	'title' => 'Pages',
	'fields' => array (
		array (
			'key' => 'field_557727d5fff51',
			'label' => 'Photography overview',
			'name' => 'photography_overview',
			'type' => 'post_object',
			'instructions' => 'Select the photography overview page',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		),
		array (
			'key' => 'field_55772d7676c78',
			'label' => 'Film overview',
			'name' => 'film_overview',
			'type' => 'post_object',
			'instructions' => 'Select the film overview page',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-general-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5573018f507e8',
	'title' => 'Project description',
	'fields' => array (
		array (
			'key' => 'field_557301a78016c',
			'label' => 'Contents',
			'name' => 'description_content',
			'type' => 'textarea',
			'instructions' => 'A brief description of the project.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'film_item',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'photography_item',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_558aeeb29d1c9',
	'title' => 'Select slideshow',
	'fields' => array (
		array (
			'key' => 'field_558aeebaf2307',
			'label' => 'Select slideshow',
			'name' => 'select_slideshow',
			'type' => 'post_object',
			'instructions' => 'In the <em>\'Slideshow\'</em> menu you can create slideshows.<br/>
If needed, choose here a created \'Slideshow\'.<br/>
If you leave this <em>blank</em> the thumb will be shown.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'slideshow_item',
			),
			'taxonomy' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-contact.php',
			),
		),
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-content-right.php',
			),
		),
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-content-left.php',
			),
		),
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'default',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_558aed83510c2',
	'title' => 'Slideshow',
	'fields' => array (
		array (
			'key' => 'field_558aed8bbb9f5',
			'label' => 'Slideshow images',
			'name' => 'slideshow_images',
			'type' => 'repeater',
			'instructions' => 'Create a slideshow which can be used in the pages.<br/>
The image will be resized to <em>1400px</em> width. Height is variable.<br/>
A slideshow always needs two or more images',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => 2,
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Nieuwe regel',
			'sub_fields' => array (
				array (
					'key' => 'field_558aedb9bb9f6',
					'label' => 'Slideshow image',
					'name' => 'slideshow_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'slideshow_item',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_55730a45dff99',
	'title' => 'Social media',
	'fields' => array (
		array (
			'key' => 'field_55730fa8a5666',
			'label' => 'Tumblr link',
			'name' => 'tumblr_link',
			'type' => 'url',
			'instructions' => 'Always add, http:// of https://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_55730a54b2d2f',
			'label' => 'Facebook link',
			'name' => 'facebook_link',
			'type' => 'url',
			'instructions' => 'Always add, http:// of https://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_55730fbda5667',
			'label' => 'LinkedIn link',
			'name' => 'linkedIn_link',
			'type' => 'url',
			'instructions' => 'Always add, http:// of https://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_55730da7b544b',
			'label' => 'Google Plus link',
			'name' => 'google_plus_link',
			'type' => 'url',
			'instructions' => 'Always add, http:// of https://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_55730d76b5449',
			'label' => 'Twitter link',
			'name' => 'twitter_link',
			'type' => 'url',
			'instructions' => 'Always add, http:// of https://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_55730d90b544a',
			'label' => 'Git hub link',
			'name' => 'github_link',
			'type' => 'url',
			'instructions' => 'Always add, http:// of https://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_5573100b001eb',
			'label' => 'Instagram link',
			'name' => 'instagram_link',
			'type' => 'url',
			'instructions' => 'Always add, http:// of https://',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-social',
			),
		),
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-general-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_55769bf6a6d1f',
	'title' => 'Thumbnail',
	'fields' => array (
		array (
			'key' => 'field_55769c05241c8',
			'label' => 'Thumb',
			'name' => 'thumb',
			'type' => 'image',
			'instructions' => 'This thumb is used in the <em>overview</em> pages.<br/>
The image will be resized to: <em>600 x 400px and cropped</em>. For navigating between the photos and films the thumb is also used and will be <em>cropped to a square of 200px</em>. ',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'photography_item',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'film_item',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array (
				'param' => 'page_template',
				'operator' => '!=',
				'value' => 'page-home.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5572cccb1dd0b',
	'title' => 'Video',
	'fields' => array (
		array (
			'key' => 'field_5572ccd807491',
			'label' => 'Vimeo ID',
			'name' => 'vimeo_embed',
			'type' => 'text',
			'instructions' => 'The ID from Vimeo. This can be found in the URL of the video: <br/>
https://vimeo.com/<strong>32743787</strong>',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'ID',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'film_item',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;
?>