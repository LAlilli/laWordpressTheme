<?php

get_header();
	
	if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
		
	<article class="post page">
		
		<nav class="site-nav children-links clearfix">
		
		<?php
		if ( $post->post_parent ) {
			$title = get_the_title( $post->post_parent );
			$children = wp_list_pages( array(
				'title_li' => '',
				'child_of' => $post->post_parent,
				'echo'     => 0
			) );
		} else {
			$title = get_the_title( $post->post_parent );
			$children = wp_list_pages( array(
				'title_li' => '',
				'child_of' => $post->ID,
				'echo'     => 0
			) );
		}
 
		if ( $children ) : ?>
			<ul>
				<?php echo $title; ?>
				<?php echo $children; ?>
			</ul>
			
		<?php endif; ?>
		</nav>
		
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</article>
		
		<?php endwhile;
		
		else : 
			echo '<p>No content found</p>';
			
		endif;
		
get_footer();

?>