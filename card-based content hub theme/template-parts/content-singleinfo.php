<?php
/**
 * Template part for displaying article info (read time and taxonomy)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sfig
 */
	
?>

<?php
	$terms = get_the_terms( $post->id, 'topic-tax' );
	if ( $terms ):
		$termsTotalCount = count($terms);
		$termCount = 0;
	endif;
?>

<div class="single-info"><span><?php echo reading_time(); ?></span><?php if ( $terms ): echo '&nbsp; | &nbsp;'; foreach( $terms as $term ) : if ($termCount > 0 ): echo ', '; endif; echo "<a href=\"/topic/". $term->slug  ."\">" . esc_html( $term->name ) . "</a>"; $termCount++; endforeach; endif; ?> </div>