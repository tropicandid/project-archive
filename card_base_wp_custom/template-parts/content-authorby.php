<?php
/**
 * Template part for displaying authors
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sfig
 */

$authorCount = 0; 
?>

<?php if ( have_rows('authors') ): ?>

	<?php $totalAuthors = count( get_field('authors') ); ?>

	<p class="authorby"><strong>By</strong> 

	    <?php while ( have_rows('authors') ) : the_row();

	    	$authorType = get_sub_field('author_type');
	        $authorCount++;

	        if ( ($authorCount == $totalAuthors) && ($totalAuthors > 1) ): 
				echo " and "; 
			elseif ( ($authorCount > 1) && ($authorCount != $totalAuthors) ):
				echo ", ";
			endif;

	        if ( $authorType == 'API Author'):
	        	$apiAuthorObj = get_sub_field('api_author');
	        	echo get_the_title($apiAuthorObj->ID);
	       	elseif ( $authorType == 'External Author' ):
	       		echo esc_html( get_sub_field('external_author') );
	       	endif;

	    endwhile; ?>

	</p>

<?php endif; ?>