<?php 

/**
 * Speciality CPT CUstom Fields
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'register_speciality_custom_fields' );
function register_speciality_custom_fields() {
    Container::make( 'post_meta', __( 'Speciality' ) )
        ->where( 'post_type', '=', 'speciality' )
		->add_fields(array(
            Field::make( 'radio', 'school_year', __( 'School Year' ) )
            ->set_options( array(
                'l1'=>'L1','l2'=>'L2','l3'=>'L3','m1'=>'M1','m2'=>'M2'
            ) ),
        ));
    }