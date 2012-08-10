<?php
/*
Template Name: Custom Page Example
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">
					<div id="image_slider">
						<ul class="bjqs">
							<?php
							$the_query = new WP_Query('showposts=5&orderby=rand&cat=1');
							while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<li>
											<span class="slider_caption"><?php the_title(); ?></span>
											<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(920,999)); ?></a>
										</li>
							<?php endwhile; ?>
						</ul>
					</div>
						<div style="clear: both"></div>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h1><?php the_title(); ?></h1>
							
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>