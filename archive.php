<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">
				
					<?php if (is_category('Portfolio')) { ?>
						<h1 class="h1_portfolio">
							<?php single_cat_title(); ?>
						</h1>
						<h3 class="h2_portfolio" style="text-align: center">Web Design and Development<h3>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<section class="post_portfolio clearfix">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'eriks-portfolio-thumb' ); ?></a>

						</section> <!-- end article section -->
						<header>
							
							<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						
						</header> <!-- end article header -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->
					<?php } elseif (is_category('Sketchbook')) { ?> 
						<h1 class="h1_sketchbook">
							<?php single_cat_title(); ?>
						</h1>
						<?php echo category_description(); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article class="post_sketch" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							<h1 class="h2_sketch"><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->

						<section class="post_sketch">
							<?php the_content(); ?>
						</section> <!-- end article section -->

						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->

					<?php endwhile; ?>
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->

				<?php } elseif (is_category('Blog')) { ?> 	
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article class="post_blog" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							<a href="<?php the_permalink() ?>" class="h2_blog"><?php the_title(); ?></a>
						
						</header> <!-- end article header -->

						<section class="post_blog">
							<?php the_excerpt(); ?>
						</section> <!-- end article section -->

						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->

					<?php endwhile; ?>
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Monthly Archives:", "bonestheme"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Yearly Archives:", "bonestheme"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } ?>

					<div style="clear:both"></div>

<?php get_footer(); ?>