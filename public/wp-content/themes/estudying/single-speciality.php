<?php
get_header();

$speciality = new Speciality(get_the_ID());
var_dump($speciality->get_modules());

get_footer();
