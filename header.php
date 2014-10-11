<?php
$post = $wp_query->post;
if ( is_page() ) {
include(TEMPLATEPATH . '/header_page.php');
} elseif ( in_category('17') ) {
include(TEMPLATEPATH . '/header_categories.php');
} else {
include(TEMPLATEPATH . '/header_default.php');
}
?>