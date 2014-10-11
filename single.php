<?php
$post = $wp_query->post;
if ( in_category('1') ) {
include(TEMPLATEPATH . '/single_news.php');
} elseif ( in_category('16') ) {
include(TEMPLATEPATH . '/single_video.php');
} elseif ( in_category('17') ) {
include(TEMPLATEPATH . '/single_photo.php');
} else {
include(TEMPLATEPATH . '/single_default.php');
}
?>