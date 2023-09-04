<?php 
/**
 * Module CPT CUstom Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'register_module_custom_fields' );
function register_module_custom_fields() {
    Container::make( 'post_meta', __( 'Module' ) )
        ->where( 'post_type', '=', 'module' )
		->add_fields(array(
            Field::make( 'radio', 'module_semestre', __( 'Module Semester' ) )
            ->set_options( array(
                's1' => 'S1',
                's2' => 'S2',
            ) ),
            Field::make( 'association', 'module_speciality', __( 'Speciality' ) )
                ->set_required(true)
                ->set_max(1)
				->set_types(
					array(
						array(
							'type'      => 'post',
							'post_type' => 'speciality',
						),
					)
				),
        ));
    }