<?php

///Security Hooks///

	//Отключение сообщений об ошибках авторизации
	add_filter('login_errors',create_function('$a', "return null;"));
	//No display WordPress version in header
	remove_action('wp_head','wp_generator');

//Удаление из верхней панели кнопки комментарии, обновления, новый контент
function my_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('new-content');
	
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

//Добавляем кнопки в HTML редактор
add_action('admin_footer', 'htm_eg_quicktags');
function htm_eg_quicktags(){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			if(typeof(QTags) !== 'undefined'){
				QTags.addButton( 'show-all-gallery-photo', 'Перейти к архиву', '<div class="show-all-gallery-photo"><a href="/archive/photos.html">Перейти к архиву</a></div>' );
				QTags.addButton( 'left-arrow', '&laquo;', '«');
			}
		});
	</script>
	<?php 
}

//Изменяем шрифт HTML редактора
function htm_change_editor_font(){
	echo "<style type='text/css'>
		#wp-content-editor-container textarea#content {
			font-family: Verdana;
			font-size: 14px;
			color: #333333;
		}
	</style>";
}
add_action('admin_print_styles', 'htm_change_editor_font');

//Отключение вкладки комментарии
function remove_menus () {global $menu;$restricted = array(__('Comments'), __('Tools'))
;end ($menu);
while (prev($menu)){$value = explode(' ',$menu[key($menu)][0]);if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}}}
add_action('admin_menu', 'remove_menus');

// задаем поддержку миниатюр и автоматизируем вывод начало
	add_theme_support( 'post-thumbnails' ); 
	function get_post_thumbnail() {
	$files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image');
	if($files) :
	$keys = array_reverse(array_keys($files));
	$j=0;
	$num = $keys[$j];
	$image=wp_get_attachment_image($num, 'large', false);
	$imagepieces = explode('"', $image);
	$imagepath = $imagepieces[1];
	$thumb=wp_get_attachment_thumb_url($num);
	print $thumb;
	else:
	print "";
	endif;
	}
	add_action( 'after_setup_theme', 'twentyten_setup' );
 	if ( ! function_exists( 'twentyten_setup' ) ):
 	function twentyten_setup() {
    	add_theme_support( 'post-thumbnails' );
	}
	endif; 

//Добавляем поддержку нескольких меню второй способ
register_nav_menus(array(
    'primary' => 'Главное меню',      // Первое меню
));

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Wp-pagenavi for Bootstrap 3 Styles
//attach our function to the wp_pagenavi filter
add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );
  
//customize the PageNavi HTML before it is output
function ik_pagination($html) {
    $out = '';
  
    //wrap a's and span's in li's
    $out = str_replace("<div","",$html);
    $out = str_replace("class='wp-pagenavi'>","",$out);
    $out = str_replace("<a","<li><a",$out);
    $out = str_replace("</a>","</a></li>",$out);
    $out = str_replace("<span","<li><span",$out);  
    $out = str_replace("</span>","</span></li>",$out);
    $out = str_replace("</div>","",$out);
  
    return '<ul class="pagination">'.$out.'</ul>';
	
	#return '<div class="pagination pagination-centered">
    #        <ul>'.$out.'</ul>
    #    </div>';
}

//Отображаем миниатюры записей.
    if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
    // for post and page
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );
    function fb_AddThumbColumn($cols) {
    $cols['thumbnail'] = __('Thumbnail');
    return $cols;
    }
    function fb_AddThumbValue($column_name, $post_id) {
    $width = (int) 35;
    $height = (int) 35;
    if ( 'thumbnail' == $column_name ) {
    // thumbnail of WP 2.9
    $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
    // image from gallery
    $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
    if ($thumbnail_id)
    $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
    elseif ($attachments) {
    foreach ( $attachments as $attachment_id => $attachment ) {
    $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
    }
    }
    if ( isset($thumb) && $thumb ) {
    echo $thumb;
    } else {
    echo __('None');
    }
    }
    }
    // for posts
    add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
    add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
    // for pages
    add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
    add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );
    }


//Запретить размещение обратных ссылок, указывающих на свой блог
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );


//Отключаем оповещения об обновлении wordpress
//remove_action( 'load-update-core.php', 'wp_update_plugins' );
//add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
//Старый вариант
//add_action('admin_menu','wphidenag');
//function wphidenag() {
//remove_action( 'admin_notices', 'update_nag', 3 );
//}


//Удаляем имя админа из CSS-классов в комментариях
function remove_comment_author_class( $classes ) {
	foreach( $classes as $key => $class ) {
		if(strstr($class, "comment-author-")) {
			unset( $classes[$key] );
		}
	}
	return $classes;
}
add_filter( 'comment_class' , 'remove_comment_author_class' );


//Фикс появления пустого параграфа <p></p>
add_filter('the_content', 'shortcode_empty_paragraph_fix');

function shortcode_empty_paragraph_fix($content)
{   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);

	$content = strtr($content, $array);
	$content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );
	
	return $content;
}

//Добавляем вывод нескльких миниатюр для одной записи (должен быть установлен плагин Multiple Post Thumbnails)

add_image_size('post-secondary-image-thumbnail', 490, 263);
add_image_size('post-third-image-thumbnail', 490, 263);

if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(			
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' => 'post'
            )
        );
		new MultiPostThumbnails(			
            array(
                'label' => 'Third Image',
                'id' => 'third-image',
                'post_type' => 'post'
            )
        );
    }	

/* - - - Ограничение вывода цитаты - - - */
/* Для вывода в шаболне используется код 
<?php do_excerpt(get_the_excerpt(), 55); ?>
где 55 - количество слов.
*/
function do_excerpt($string, $word_limit) {
$words = explode(' ', $string, ($word_limit + 1));
if (count($words) > $word_limit)
array_pop($words);
echo implode(' ', $words).' ...';
}	

/**
 * ====================================================
 * Help Contact Form 7 Play Nice With Bootstrap
 * ==================================================== 
 * Add a Bootstrap-friendly class to the "Contact Form 7" form
 */
add_filter( 'wpcf7_form_class_attr', 'wildli_custom_form_class_attr' );
function wildli_custom_form_class_attr( $class ) {
	$class .= ' form-horizontal';
	return $class;
}

/* Добавление областей виджетов*/
if ( function_exists('register_sidebar') ) {
  register_sidebar(array(    
	'name' => __( 'Написать Алексею' ),
	'id' => 'write_to_aleksey',
	'description' => __( '' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('write_to_aleksey') ); ?>
*/
  
  register_sidebar(array(    
	'name' => __( 'Написать Татьяне' ),
	'id' => 'write_to_tanya',
	'description' => __( '' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('write_to_tanya') ); ?>
*/

}
	
#все новые функции писать до этого комментария
	
?>