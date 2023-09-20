<?php
get_header();

$module = new Module( get_the_ID() );
var_dump( $module->get_semester() );

get_footer();
