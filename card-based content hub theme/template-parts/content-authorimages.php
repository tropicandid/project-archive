<?php
/**
 * Template part for displaying author images
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sfig
 */
	
?>

<?php if ( have_rows('authors') ): $authorCount; ?>

	<div class="authorimage-wrap">

	    <?php while ( have_rows('authors') ) : the_row();

	    	$authorType = get_sub_field('author_type');
        	$authorName;
        	$authorTitle;
        	$socialGroup;
        	$socialTwitter;
        	$socialFacebook;
        	$socialYoutube;
        	$socialLinkedin;
        	$authorImage = false;

        	if ( $authorType == 'API Author'):

	        	$apiAuthorObj = get_sub_field('api_author');
        	
				if ( has_post_thumbnail($apiAuthorObj->ID) ):
					$authorImageSrc = wp_get_attachment_image_src( get_post_thumbnail_id($apiAuthorObj->ID), 'thumbnail' );
					$authorImageUrl = $authorImageSrc[0];
					$authorImage = true;
				endif;	

				$authorName = get_the_title($apiAuthorObj->ID);

				$authorTitle = get_field('author_title', $apiAuthorObj->ID);
				
				$socialGroup = get_field('author_social', $apiAuthorObj->ID);
				if ($socialGroup):
					$socialTwitter = $socialGroup['author_social_twitter'];
		        	$socialFacebook = $socialGroup['author_social_facebook'];
		        	$socialYoutube = $socialGroup['author_social_youtube'];
		        	$socialLinkedin = $socialGroup['author_social_linkedin'];
		        endif;	

       		elseif ( $authorType == 'External Author' ):
       			
	       		if ( get_sub_field('external_author_image') ):
					$authorImageArr = get_sub_field('external_author_image');
					$authorImageUrl = $authorImageArr['sizes']['thumbnail'];
					$authorImage = true;
				endif;

				$authorName = get_sub_field('external_author');

				$authorTitle = get_sub_field('external_author_title');
				
				$socialGroup = get_sub_field('external_author_social');
				if ($socialGroup):
					$socialTwitter = $socialGroup['external_author_social_twitter'];
		        	$socialFacebook = $socialGroup['external_author_social_facebook'];
		        	$socialYoutube = $socialGroup['external_author_social_youtube'];
		        	$socialLinkedin = $socialGroup['external_author_social_linkedin'];
		        endif;				

	   		endif; ?>

			<div class="authorimage-inner">
			    <div class="authorimage-image" <?php if ($authorImage): ?>style="background-image: url('<?php echo esc_url( $authorImageUrl ); ?>')"<?php endif; ?>></div>
			    <div class="authorimage-text">

			    	<p class="authorimage-text-name"><?php echo esc_html( $authorName ); ?></p>

			    	<?php if ( $authorTitle ): ?>
			    		<p class="authorimage-text-title"><?php echo esc_html( $authorTitle ); ?></p>
			    	<?php endif; ?>

			    	<?php if ( $socialGroup ): ?>
			    		<?php if ( $socialTwitter || $socialFacebook || $socialYoutube || $socialLinkedin ): ?>
				    		<div class="global-social small">
				    			<span>Follow:</span>
								<?php if ($socialTwitter): ?>
									<a href="<?php echo esc_url( $socialTwitter ); ?>" class="global-social-icon twitter">Twitter</a>
								<?php endif; ?>
								<?php if ($socialFacebook): ?>
									<a href="<?php echo esc_url( $socialFacebook ); ?>" class="global-social-icon facebook">Facebook</a>
								<?php endif; ?>
								<?php if ($socialYoutube): ?>
									<a href="<?php echo esc_url( $socialYoutube ); ?>" class="global-social-icon youtube">Youtube</a>
								<?php endif; ?>
								<?php if ($socialLinkedin): ?>
									<a href="<?php echo esc_url( $socialLinkedin ); ?>" class="global-social-icon linkedin">LinkedIn</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>

			    </div>
			</div>

	    <?php endwhile; ?>

	</div>

<?php endif; ?>