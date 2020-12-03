<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */


$terms = get_the_terms( $post->id, 'topic-tax' );
if ( $terms ):
	$termsTotalCount = count($terms);
	$termCount = 0;
endif;
?>

<article class="card card__external-article">

	<div class="external-article">

		<div class="external-article-top">

			<?php if ( $terms ): if ($termsTotalCount > 0): ?>
				<div class="single-info"><?php if ( $terms ): foreach( $terms as $term ) : if ($termCount > 0 ): echo ', '; endif; echo "<a href=\"/topic/". $term->slug ."\">" . $term->name . "</a>"; $termCount++; endforeach; endif; ?>
				</div>
			<?php endif; endif; ?>
			
			<?php if( get_field('external_article_url')): ?>
				<h3><a href="<?php echo esc_url( get_field('external_article_url')['url'] ); ?>" target="<?php echo get_field('external_article_url')['target']; ?>" ><?php the_title(); ?></a></h3>
			<?php else: ?>
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php endif; ?>

		</div>
		
		<div class="lower-data">
			<div class="lower-data__wrapper">

				<?php if(get_field('publisher_logo')): ?>
					<img src="<?php echo esc_url( get_field('publisher_logo') ); ?>" alt="Image of external publisher logo or related image">
				<?php endif;?>

				<?php if(get_field('publication_date')): ?>
					<span class="date"><?php echo esc_html( get_field('publication_date') );?></span>
				<?php endif;?>

			</div>
		</div>

	</div>

</article>