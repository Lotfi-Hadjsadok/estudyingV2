<?php
/**
 * Course CPT CUstom Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'register_course_custom_fields' );
function register_course_custom_fields() {
	Container::make( 'post_meta', __( 'Course' ) )
        ->where( 'post_type', '=', 'course' )
		->add_fields(
			array(
                Field::make( 'radio', 'course_type', __( 'Course Type' ) )
                ->set_options( array(
                    'cours' => 'Cours',
                    'td' => 'TD',
                    'tp' => 'TP',
                ) ),
				Field::make( 'association', 'course_module', __( 'Module' ) )
                ->set_required(true)
                ->set_max(1)
				->set_types(
					array(
						array(
							'type'      => 'post',
							'post_type' => 'module',
						),
					)
				),
                Field::make( 'complex', 'course_data', '' )
                ->add_fields(array(
                   Field::make('file','course_file',__('course File'))
                ) )
                ->set_layout('tabbed-horizontal') 
			)
		);
}
