<?php
get_header();
$course = new Course(get_the_ID());
var_dump($course->get_module()->get_speciality());
get_footer();