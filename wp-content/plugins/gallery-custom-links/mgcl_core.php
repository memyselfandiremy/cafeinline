<?php

require_once 'vendor/autoload.php';

use DiDom\Document;
use DiDom\Element;

class Meow_Gallery_Custom_Links
{
	public $isEnabled = true;
	public $isOb = false;

	public function __construct() {

		if ( is_admin() ) {
			add_filter( 'attachment_fields_to_edit', array( $this, 'attachment_fields_to_edit' ), 10, 2 );
			add_filter( 'attachment_fields_to_save', array( $this, 'apply_filter_attachment_fields_to_save' ), 10 , 2 );
		}
		else {
			// Extra support
			add_action( 'init', array( $this, 'init' ) );

			$this->isOb = false;

			// Processing
			add_action( 'init', array( $this, 'start' ) );
			if ( $this->isOb )
				add_action( 'shutdown', array( $this, 'shutdown' ) );
			else
				add_filter( 'the_content', array( $this, 'linkify' ), 20 );
			add_action( 'wp_footer', array( $this, 'unlink_lightboxes_script' ) ) ;
		}
	}

	function attachment_fields_to_edit( $fields, $post ) {
		$fields['gallery_link_url'] = array(
			'label' => __( 'Link URL', 'gallery-custom-links' ),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, '_gallery_link_url', true )
		);
		$target_value = get_post_meta( $post->ID, '_gallery_link_target', true );
		$fields['gallery_link_target'] = array(
			'label' => __( 'Link Target', 'gallery-custom-links' ),
			'input' => 'html',
			'html'  => '
				<select name="attachments[' . $post->ID . '][gallery_link_target]" id="attachments[' . $post->ID . '][gallery_link_target]">
					<option value="_self"' . ( $target_value == '_self' ? ' selected="selected"' : '' ) . '>' .
						__( 'Same page', 'gallery-custom-links' ) .
					'</option>
					<option value="_blank"' . ( $target_value == '_blank' ? ' selected="selected"' : '' ) . '>' .
						__( 'New page', 'gallery-custom-links' ) .
					'</option>
				</select>'
			);
		return $fields;
	}

	function apply_filter_attachment_fields_to_save( $post, $attachment ) {
		if ( isset( $attachment['gallery_link_url'] ) )
			update_post_meta( $post['ID'], '_gallery_link_url', $attachment['gallery_link_url'] );
		if ( isset( $attachment['gallery_link_target'] ) )
			update_post_meta( $post['ID'], '_gallery_link_target', $attachment['gallery_link_target'] );
		return $post;
	}

	function start() {
		$this->isEnabled = apply_filters( 'gallery_custom_links_enabled', true );
		if ( !$this->isEnabled )
			return;
		if ( $this->isOb )
			ob_start( array( $this, "linkify" ) );
	}

	// Clean the path from the domain and common folders
	// Originally written for the WP Retina 2x plugin
	function get_pathinfo_from_image_src( $image_src ) {
		$uploads = wp_upload_dir();
		$uploads_url = trailingslashit( $uploads['baseurl'] );
		if ( strpos( $image_src, $uploads_url ) === 0 )
			return ltrim( substr( $image_src, strlen( $uploads_url ) ), '/');
		else if ( strpos( $image_src, wp_make_link_relative( $uploads_url ) ) === 0 )
			return ltrim( substr( $image_src, strlen( wp_make_link_relative( $uploads_url ) ) ), '/');
		$img_info = parse_url( $image_src );
		return ltrim( $img_info['path'], '/' );
	}

	function resolve_image_id( $url ) {
		global $wpdb;
		$pattern = '/[_-]\d+x\d+(?=\.[a-z]{3,4}$)/';
		$url = preg_replace( $pattern, '', $url );
		$url = $this->get_pathinfo_from_image_src( $url );
		$query = $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid LIKE '%s'", '%' . $url . '%' );
		$attachment = $wpdb->get_col( $query );
		return empty( $attachment ) ? null : $attachment[0];
	}

	function linkify_element( $element ) {
		$classes = $element->attr('class');
		$mediaId = null;

		// Check if the wp-image-xxx class exists
		if ( preg_match( '/wp-image-([0-9]{1,10})/i', $classes, $matches ) )
			$mediaId = $matches[1];
		// Otherwise, resolve the ID from the URL
		else {
			$url = $element->attr('src');
			$mediaId = $this->resolve_image_id( $url );
		}

		if ( $mediaId ) {
			$url = get_post_meta( $mediaId, '_gallery_link_url', true );
			if ( !empty( $url ) ) {
				$target = get_post_meta( $mediaId, '_gallery_link_target', true );
				if ( empty( $target ) )
					$target = '_self';
				$parent = $element->parent();

				// Let's look for the closest link tag enclosing the image
				$potentialLinkNode = $parent;
				$maxDepth = 10;
				do {
					if ( $potentialLinkNode->tag === 'a' ) {
						$potentialLinkNode->attr( 'href', $url );
						$class = $potentialLinkNode->attr( 'class' );
						$class = empty( $class ) ? 'custom-link no-lightbox' : ( $class . ' custom-link no-lightbox' );
						$potentialLinkNode->attr( 'class', $class );
						$potentialLinkNode->attr( 'onclick', 'event.stopPropagation()' );
						$potentialLinkNode->attr( 'target', $target );
						return true;
					}
					if ( method_exists( $potentialLinkNode, 'parent' ) )
						$potentialLinkNode = $potentialLinkNode->parent();
					else
						break;
				}
				while ( $potentialLinkNode && $maxDepth-- >= 0 );

				// There is no link tag, so we add one and move the image under it
				if ( $parent->tag === 'figure' )
					$parent = $parent->parent();
				$a = new Element('a');
				$a->attr( 'href', $url );
				$a->attr( 'class', 'custom-link no-lightbox' );
				$a->attr( 'onclick', 'event.stopPropagation()' );
				$a->attr( 'target', $target );
				$a->appendChild( $parent->children() );
				foreach( $parent->children() as $img ) {
					$img->remove();
				}
				$parent->appendChild( $a );
				return true;
			}
		}
		return false;
	}

	function init() {
		include "mgcl_extra.php";
		new Meow_Gallery_Custom_Links_Extra();
	}

	function linkify( $buffer ) {
		if ( !$this->isEnabled || !isset( $buffer ) || trim( $buffer ) === '' )
			return $buffer;
		$html = new Document();
		$html->preserveWhiteSpace();
		$html->loadHtml( $buffer, 0 );
		$hasChanges = false;
		$classes = apply_filters( 'gallery_custom_links_classes', array( '.gallery', '.wp-block-gallery' ) );
		foreach ( $classes as $class ) {
			foreach ( $html->find( $class . ' img' ) as $element )
				$hasChanges = $this->linkify_element( $element ) || $hasChanges;
		}
		return $hasChanges ? $html->html() : $buffer;
	}

	function shutdown() {
		if ( !$this->isEnabled )
			return;
		@ob_end_flush();
	}

	function unlink_lightboxes_script() {
		?>
			<script>
				// Used by Gallery Custom Links to handle tenacious Lightboxes
				jQuery(document).ready(function () {

					function mgclInit() {
						if (jQuery.fn.off) {
							jQuery('.no-lightbox, .no-lightbox img').off('click'); // jQuery 1.7+
						}
						else {
							jQuery('.no-lightbox, .no-lightbox img').unbind('click'); // < jQuery 1.7
						}
						jQuery('a.no-lightbox').click(mgclOnClick);

						if (jQuery.fn.off) {
							jQuery('a.set-target').off('click'); // jQuery 1.7+
						}
						else {
							jQuery('a.set-target').unbind('click'); // < jQuery 1.7
						}
						jQuery('a.set-target').click(mgclOnClick);
					}

					function mgclOnClick() {
						if (!this.target || this.target == '' || this.target == '_self')
							window.location = this.href;
						else
							window.open(this.href,this.target);
						return false;
					}

					// From WP Gallery Custom Links
					// Reduce the number of  conflicting lightboxes
					function mgclAddLoadEvent(func) {
						var oldOnload = window.onload;
						if (typeof window.onload != 'function') {
							window.onload = func;
						} else {
							window.onload = function() {
								oldOnload();
								func();
							}
						}
					}

					mgclAddLoadEvent(mgclInit);
					mgclInit();

				});
			</script>
		<?php
	}
}

?>