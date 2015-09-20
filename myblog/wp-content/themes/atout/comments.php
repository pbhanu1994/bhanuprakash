<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package atout
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php // You can start editing here -- including this comment! ?>
	<h3 class="text-center"><?php echo __('Comments', 'atout'); ?></h3>
	<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'atout' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'atout' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'atout' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
	<?php endif; // check for comment navigation ?>

	<ol class="comment-list">
		<?php
		wp_list_comments( array(
		    'walker' => new atout_Walker_Comment()
		) ); ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'atout' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'atout' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'atout' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
	<?php endif; // check for comment navigation ?>

<?php endif; // have_comments() ?>

<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
<p class="no-comments"><?php _e( 'Comments are closed.', 'atout' ); ?></p>
<?php endif;
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$args = array(
	'id_form'           => 'comment-reply-box',
	'id_submit'         => 'submit',
	'title_reply'       => __( '', 'atout' ),
	'title_reply_to'    => __( 'Leave a Reply to %s', 'atout' ),
	'cancel_reply_link' => __( 'Cancel Reply', 'atout'),
	'label_submit'      => __( 'Post Comment', 'atout' ),

	'comment_field' =>  '<textarea name="comment" id="comment" class="field" rows="5" placeholder="' . __('Comment', 'atout') . '" required></textarea>',

	'must_log_in' => '<p class="must-log-in">' .
	sprintf(
		__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		) . '</p>',

	'logged_in_as' => '<p class="logged-in-as">' .
	sprintf(
		__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
		admin_url( 'profile.php' ),
		$user_identity,
		wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
		) . '</p>',

	'comment_notes_before' => '',

	'comment_notes_after' => '',

	'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' =>
		'<div class="row"><div class="col-sm-4"><input type="text" class="field" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="22" placeholder="' . __('Name', 'atout') . '"' . $aria_req . '></div>',

		'email' =>
		'<div class="col-sm-4"><input type="email" class="field" name="email" id="email" value="' . esc_attr($comment_author_email) .
      '" size="22" placeholder="' . __('Email (will not be published)', 'atout') . '"' . $aria_req . '></div>',

		'url' =>
		'<div class="col-sm-4"><input type="url" class="field" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="22" placeholder="' . __('Website', 'atout') . '"></div></div>'
		)
	),
); ?>

	<?php comment_form($args); ?>

</div><!-- #comments -->
