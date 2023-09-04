<?php
get_header();

echo $_GET['module'];
echo get_query_var('speciality');
echo '<br />';
echo get_query_var('semester');

get_footer();
