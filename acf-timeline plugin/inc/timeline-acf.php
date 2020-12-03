<?php
/**
*
* Custom Timeline component
*
**/

/*  Create ACF field via json 
*	https://www.advancedcustomfields.com/resources/register-fields-via-php/
*	This will be the best way to ensure it is imported but without duplicating the need for another ACF import via the separate plugin
*/

add_action('init', 'register_timeline_acf');
function register_timeline_acf() {

    if (function_exists('acf_add_options_page')) {

        $page = acf_add_options_page(array(
            'page_title' 	=> 'Timeline',
			'menu_title'	=> 'Timeline',
			'menu_slug' 	=> 'timeline-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
        ));
    }

    if( function_exists('acf_add_local_field_group') ) { 
    	/* 
    	*	YOU CAN GENERATE AN ACF JSON THROUGH THE ACF TOOL IN THE CMS. 
    	*	SIMPLY CREATE THE ACF YOU WANT AND NAVIGAT TO THE TOOLS BUTTON.
    	*	THEN, CLICK GENERATE PHP, AND IT WILL PROVIDE WHAT YOU SEE BELOW.
    	*/
		acf_add_local_field_group(array(
			'key' => 'group_5dc44d038617a',
			'title' => 'Timeline Blocks',
			'fields' => array(
				array(
					'key' => 'field_5dc44d08c1627',
					'label' => 'Timeline Headline',
					'name' => 'timeline_headline',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5dc44d08c1628',
					'label' => 'Timeline Subtext',
					'name' => 'timeline_subtext',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),array(
					'key' => 'field_5dc44d08c1625',
					'label' => 'Graph Label 1',
					'name' => 'timeline_graph_1',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),array(
					'key' => 'field_5dc44d08c1626',
					'label' => 'Graph Label 2',
					'name' => 'timeline_graph_2',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5dc44d08c1629',
					'label' => 'Timeline Blocks',
					'name' => 'timeline_blocks',
					'type' => 'flexible_content',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layouts' => array(
						'layout_5dc44d2caef6f' => array(
							'key' => 'layout_5dc44d2caef6f',
							'name' => 'image_with_text_overlay',
							'label' => 'Image with Text Overlay',
							'display' => 'block',
							'sub_fields' => array(
								array(
									'key' => 'field_5dc44d7bc162a',
									'label' => 'Card Label Year',
									'name' => 'block_year',
									'type' => 'text',
									'instructions' => 'This can container months if desired',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5dd57f910f1d1',
									'label' => 'Numeric Year Value',
									'name' => 'number_year',
									'type' => 'number',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'min' => '',
									'max' => '',
									'step' => '',
								),

								array(
									'key' => 'field_5dd57f910f1d2',
									'label' => 'Graph Value 1',
									'name' => 'number_value_1',
									'type' => 'number',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'min' => '',
									'max' => '',
									'step' => '',
								),
								array(
									'key' => 'field_5dd57f910f1d3',
									'label' => 'Graph Value 2',
									'name' => 'number_value_2',
									'type' => 'number',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'min' => '',
									'max' => '',
									'step' => '',
								)
								,
								array(
									'key' => 'field_5dc44d7bc162d',
									'label' => 'Superscript',
									'name' => 'block_superscript',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5dc44d90c162b',
									'label' => 'Subtext',
									'name' => 'block_subtext',
									'type' => 'textarea',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5dc44d98c162c',
									'label' => 'Image',
									'name' => 'image',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'url',
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
								array(
									'key' => 'field_5dc44d7fc1651',
									'label' => 'Event Tagline',
									'name' => 'year_tagline',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5dcc2ec322c95',
									'label' => 'Change color of bar this year',
									'name' => 'color_change',
									'type' => 'checkbox',
									'instructions' => 'Check this box if you want a visual indicator of status change for the sub bars',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'choices' => array(
										'yes' => 'Yes, chang second bar color this year.',
									),
									'allow_custom' => 0,
									'default_value' => array(
									),
									'layout' => 'horizontal',
									'toggle' => 0,
									'return_format' => 'value',
									'save_custom' => 0,
								),
								array(
									'key' => 'field_5dcaeae946c22',
									'label' => 'Sources',
									'name' => 'timeline_sources',
									'type' => 'repeater',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'collapsed' => '',
									'min' => 0,
									'max' => 3,
									'layout' => 'table',
									'button_label' => '',
									'sub_fields' => array(
										array(
											'key' => 'field_5dc4887149bc6',
											'label' => 'Link Button',
											'name' => 'link_button',
											'type' => 'link',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => array(
												array(
													array(
														'field' => 'field_5dc4896e8b508',
														'operator' => '==',
														'value' => 'Link Button',
													),
												),
											),
											'wrapper' => array(
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'array',
										)
									),
								),
							),
							'min' => '',
							'max' => '',
						),
					),
					'button_label' => 'Add Row',
					'min' => '',
					'max' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'timeline-settings',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
	}
}
