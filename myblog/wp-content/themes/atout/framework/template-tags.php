<?php
/**
 * Custom template tags.
 *
 * @package Atout
 * @author Frenchtastic.eu
 */

/**
* Display the post thumbnail if applicable 
* 
* @since Atout 1.0
*/
function atout_thumbnail(){
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }
  ?>

  <figure class="thumbnail">
      <?php if(get_theme_mod('thumbnail_link') == 'yes' ): ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      <?php else:
        the_post_thumbnail();
      endif; ?>
  </figure>
  <?php    
}

/**
* Display navigation to next/previous set of posts when applicable.
*
* @since Atout 1.0
*/
function atout_paging_nav( $query=null ) {

  global $wp_query, $wp_rewrite;

  // Don't print empty markup if there's only one page.
  if ( $wp_query->max_num_pages < 2 ) {
    return;
  }

  $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
  $pagenum_link = html_entity_decode( get_pagenum_link() );
  $query_args   = array();
  $url_parts    = explode( '?', $pagenum_link );

  if ( isset( $url_parts[1] ) ) {
    wp_parse_str( $url_parts[1], $query_args );
  }

  $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
  $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

  $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
  $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

  // Set up paginated links.
  $links = paginate_links( array(
    'base'     => $pagenum_link,
    'format'   => $format,
    'total'    => $wp_query->max_num_pages,
    'current'  => $paged,
    'mid_size' => 1,
    'add_args' => array_map( 'urlencode', $query_args ),
    'prev_text' => __( '&larr; Previous', 'atout' ),
    'next_text' => __( 'Next &rarr;', 'atout' ),
  ) );

  if ( $links ) :

  ?>
  <nav class="pagination" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'atout' ); ?></h1>
    <div class="loop-pagination">
      <?php echo $links; ?>
    </div><!-- .pagination -->
  </nav><!-- .navigation -->
  <?php
  endif;
}


if ( ! function_exists( 'atout_posted_on' ) ) :
/**
* Prints HTML with meta information for the current post-date/time and author.
*
* @since Atout 1.0
*/
function atout_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    // if ( !is_home() ){
    //   $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
    // }
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'atout' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'atout' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
* Display copyright text in footer area
*
* @since Atout 1.0
*/
function atout_footer(){
  if(get_theme_mod('footer_copyright') != ''){
    return get_theme_mod('footer_copyright');
  } else {
    return __('Design by ', 'atout'). '<a href="http://frenchtastic.eu/">Frenchtastic.eu</a>';
  }
}

if ( ! function_exists( 'atout_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Atout 1.0
 *
 * @see get_url_in_content()
 *
 * @return string The Link format URL.
 */
function atout_get_link_url() {
  $has_url = get_url_in_content( get_the_content() );

  return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;