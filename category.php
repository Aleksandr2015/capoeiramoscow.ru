<?php
$post = $wp_query->post;
if ( in_category('1') ) {
include(TEMPLATEPATH . '/category_news.php');
} elseif ( in_category('16') ) {
include(TEMPLATEPATH . '/category_video.php');
} elseif ( in_category('17') ) {
include(TEMPLATEPATH . '/category_photo.php');
} else {
include(TEMPLATEPATH . '/category_default.php');
}
?>