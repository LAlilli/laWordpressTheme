<?php

get_header();
	
	if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
		
	<article class="post page">
		
		<nav class="site-nav children-links clearfix">
			<span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>">
			<?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
			
			<?php
			if ( $post->post_parent ) {
				$children = wp_list_pages( array(
					'title_li' => '',
					'child_of' => get_top_ancestor_id(),
					'echo'     => 0
				) );
			} else {
				$children = wp_list_pages( array(
					'title_li' => '',
					'child_of' => get_top_ancestor_id(),
					'echo'     => 0
				) );
			}
 
			if ( $children ) : ?>
				<ul>
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