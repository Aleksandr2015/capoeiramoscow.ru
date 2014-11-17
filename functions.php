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
				QTags.addButton( 'paragraph', 'p', '<p></p>');
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

/** 
 * Выводит заголовок страницы <title>
 *
 * Для меток и категорий указывается в настройках, в описании: [title=Заголовок].
 * Для записей, если нужно, чтобы заголовок страницы отличался от заголовка записи, 
 * создайте произвольное поле title и впишите туда произвольный заголовок.
 *
 * @ $sep - разделитель
 * @ $add_blog_name - добавлять ли название блога в конец заголовка для архивов (true|false)
 *
 * version 2.0
 */
function kama_meta_title( $sep = " » ", $add_blog_name = true ){
	global $wp_query, $post;

	if( $add_blog_name )
		$add_blog_name = $sep . get_bloginfo('name');
	
    if( is_front_page() )
		$out = get_bloginfo('name').' - '.'Главная';
    
    elseif( is_page() )
		$out = get_bloginfo('name').' - '. get_the_title();
    
    elseif( in_category('news') )
		$out = get_bloginfo('name').' - '.'Новости';

	elseif( is_category() || is_tag() || is_tax() ){
		if( $desc = $wp_query->get_queried_object()->description ) 
			preg_match ('!\[title=(.*)\]!iU', $desc, $match);

		if( $match[1] )
			$out = $match[1];
		elseif( is_tax() ) {
			$term = get_queried_object();  
			if ( $term ) {
				$tax = get_taxonomy( $term->taxonomy );  
				$out = single_term_title( $tax->labels->name . $sep, false );  
			}
		}
		else {
			$out = single_term_title( '', 0 );
		}

		$out .= $add_blog_name;
	}

	elseif( is_singular() || ( is_home() && !is_front_page() ) || ( is_page() && !is_front_page() ) ){

		$before_out = ( isset($wp_query->query_vars['cpage']) ) ? "Комментарии {$wp_query->query_vars['cpage']}: " : '';

		if( $post->post_type == 'func' ){
			$cterms = get_the_terms( $post->ID, array('wpfunccat') );
			$cterm = array_shift($cterms);
			$out = single_post_title( '', false ) . '() - '. ($cterm->slug=='classes'?'класс':'функция') .' WordPress'; 
		} else {
			$out = ( $free_title = get_post_meta($post->ID, "title", true) ) ? $free_title : single_post_title( '', false );
		}

		$out = $before_out . $out;
	}

	elseif ( is_author() ){
		$author = get_queried_object();  
		$out = 'Статьи автора: '. $author->display_name . $add_blog_name;
	}

	elseif ( is_day() || is_month() || is_year() ){
		$rus_month = array('','янваль','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябть','ноябрь','декабрь');
		$rus_month2 = array('','янваля','февраля','марта','апреля','мая','июня','июля','августа','сентября','октябтя','ноября','декабря');
		$year = get_query_var('year');  
		$monthnum = get_query_var('monthnum');  
		$day = get_query_var('day'); 

		if( is_year() )
			$dat = "$year год";
		elseif( is_month() )
			$dat = "$rus_month[$monthnum] $year года";
		elseif( is_day() )
			$dat = "$day $rus_month2[$monthnum] $year года";

		$out = 'Архив за '. $dat . $add_blog_name;	
	}

	elseif ( is_search() ) 
		$out = 'Результаты поиска по запросу: '. get_query_var('s');

	elseif ( is_404() ) 
		$out = "Ошибка 404: такой страницы не существует";

	else
		$out = wp_title($sep, 0, 'right');

	// номера страниц для пагинации и деления записи
	$page = ( $page = get_query_var('paged') ) ? $page : get_query_var('page');
	if( $page )
		$out = "$out (страница $page)";

	return print $out;
}

/**
 * Выводит метатег description
 * 
 * Для страниц меток, категорий и таксономий указывается в настройках: [description=текст описания]
 * У постов сначала проверяется, произвольное поле description, если оно есть описание берется от туда, 
 * если его нет, то проверяется "цитата", если цитаты нет, то описание берется как начальная часть контента.
 * Цитата или контент обрезаются до указаного во втором параметре числа символо.
 * 
 * @ $home_description - указывается описание для главной страницы сайта.
 * @ $maxchar - Максимальная длина описания (в символах).
 *
 * version 0.1
 */
function kama_meta_description( $home_description = 'ABADA Capoeira в Москве. Направления, адреса залов, новости, видео, фото.', $maxchar = 250 ){
	global $wp_query, $post;

	if( is_front_page() ) 
		$out = $home_description;
    
    elseif ( is_page('contacts') ) 
		$out = 'Адреса залов, интерактивная карта расположения, фото наших залов, телефоны для связи.';

	elseif( is_singular() ){
		if ( $description = get_post_meta($post->ID, "description", true) )
			$out = $description;
		elseif( $post->post_excerpt != '' )
			$out = $post->post_excerpt;
		else
			$out = $post->post_content;

		$out = trim( strip_tags( $out ) );

		$char = iconv_strlen( $out, 'utf-8' );
		if( $char > $maxchar ){
			$out = iconv_substr( $out, 0, $maxchar, 'utf-8' );
			$words = explode(' ', $out ); 
			$maxwords = count($words) - 1; //убираем последнее слово, ибо оно в 90% случаев неполное
			$out = join(' ', array_slice($words, 0, $maxwords)).' ...';
		}
	}
	elseif( is_category() || is_tag() || is_tax() ){
		if( $desc = $wp_query->queried_object->description ) 
			preg_match ('!\[description=(.*)\]!iU', $desc, $match);
		$out = $match[1] ? $match[1] : '';
	}

	if( $out ){
		$out = str_replace( array("\n", "\r"), ' ', $out );
		$out = preg_replace("@\[[^\]]+]\]@", '', $out); //удаляем шоткоды
		echo '<meta name="description" content="'. esc_attr($out) .'" />'."\n";
	}
	return;
}

/** 
 * Генерирует метатег keywords для head части сайта
 *
 * Чтобы задать свои keywords для записи, создайте произвольное поле keywords и впишите в значения необходимые ключевые слова. 
 * Для постов (post) ключевые слова генерируются из меток и названия категорий, если не указано произвольное поле keywords.
 *
 * Для меток, категорий и произвольных таксономий, ключевые слова указываются в описании, в шоткоде: [keywords=слово1, слово2, слово3]
 *
 * @ $home_keywords: Для главной, ключевые слова указываются в первом параметре: kama_meta_keywords( 'слово1, слово2, слово3' );
 * @ $def_keywords: сквозные ключевые слова - укажем и они будут прибавляться к остальным на всех страницах 
 *
 * version 0.2
 */
function kama_meta_keywords( $home_keywords = 'капоэйра, капуэйра, капуэро, capoeira, kapoeira, капоэйра в москве, капоэйра москва, capoeira moscow, capoeiramoscow, алексей найденов, alexey naydenov, найденов алексей, алексей найденов капоэйра, градуадо фалкао, фалькао, graduado falcao, абада капоэйра, abada capoeira, капоэйра занятия, капоэйра тренер, jogos brasileiros, jogos mundiais, jogos europeos, местре камиза, зелёный пояс, капоэйра шоу группа, выступление на корпоративах, бразильские барабаны, бразильская перкуссия, шоу бразильских барабанов, шоу бразильской прекуссии, batucada batykada batukada batycada, батукада, бразильская батукада', $def_keywords = '' ){
	global $wp_query, $post;

	$out = '';

	if ( is_front_page() ){
		$out = $home_keywords;
	}
	elseif( is_singular() ){
		$out = get_post_meta($post->ID, 'keywords', true);

		// для постов указываем ключами метки и категории, если не указаны ключи в произвольном поле
		if( ! $out && $post->post_type == 'post' ){
			$res = wp_get_object_terms( $post->ID, array('post_tag', 'category'), array('orderby' => 'none') ); // получаем категории и метки
			if( $res ) 
				foreach( $res as $tag )
					$out .= ", $tag->name";

			$out = ltrim($out, ', ');
		}
	}
	elseif ( is_category() || is_tag() || is_tax() ){
		if( $desc = $wp_query->queried_object->description ){
			preg_match( '!\[keywords=([^\]]+)\]!iU', $desc, $match );
			$out = $match[1] ? $match[1] : '';
		}
	}
	
	if( $out && $def_keywords )
		$out = $out .', '. $def_keywords;

	if ( $out ) 
		return print "<meta name=\"keywords\" content=\"$out\" />\n";

	return false;
}
	
#все новые функции писать до этого комментария
	
?>