<?php
/* Template Name: Comments*/
 
if ( post_password_required() ) {
	return;
}
?>

<div id="commentaires" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'Un commentaire sur &ldquo;%s&rdquo;', 'comments title' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s commentaire sur &ldquo;%2$s&rdquo;',
							'%1$s commentaires sur &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p><?php _e( 'Les commentaires sont fermés.' ); ?></p>
	<?php endif; ?>

	<?php
        // on génère le formulaire avec du html personnalisé
        comment_form([
            'title_reply' => '<h2>Laissez un commentaire</h2>',
            'fields' => apply_filters('comment_form_default_fields', [
                'author' => '<label for="author">Nom</label><br>
                            <input id="author" name="author" type="text" value="" required>',

                'email'  => '<label for="email">Email</label><br>
                            <input id="email" name="email" type="email" value="" required>'
            ]),

            'comment_field' => '<label for="comment">Commentaire </label><br>
                                    <textarea id="comment" name="comment"  required></textarea>',
            'comment_notes_before' => '',
            'submit_button' => "<button>Envoyer</button>"
        ]);
		?>


</div><!-- .comments-area -->
