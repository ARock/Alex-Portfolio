<?php get_header(); ?>
		<?php if (in_category('Blog')) { ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="blog_single" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
							<ul class="soc-media">
								<li class="soc-item"><a href="https://twitter.com/share" class="twitter-share-button" data-via="eriks_b" data-related="eriks_b">Tweet</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
								<li><iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=212281168870575" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe></li>
							</ul>

						</header> <!-- end article header -->

						<div style="clear:both"></div>
					
						<section class="post_content clearfix" itemprop="articleBody">

							<?php the_content(); ?>
							
					
						</section> <!-- end article section -->

						<div style="margin-left: 70px" class="fb-comments" data-href="<?php echo urlencode(get_permalink($post->ID)); ?>" data-num-posts="10" data-width="800"></div>
					
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
				<div style="clear: both"></div>
    
			</div> <!-- end #content -->
		<?php } elseif (in_category('Portfolio')) { ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="portfolio_single" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>

							<ul class="soc-media">
								<li class="soc-item"><a href="https://twitter.com/share" class="twitter-share-button" data-via="eriks_b" data-related="eriks_b">Tweet</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
								<li><iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=212281168870575" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe></li>
							</ul>

						

						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">

							<?php the_content(); ?>
							
					
						</section> <!-- end article section -->
					
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
				<div style="clear: both"></div>
					<?php if ( is_active_sidebar( 'sidebar_right' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar_right' ); ?>

					<?php endif; ?>
    
			</div> <!-- end #content -->
		<?php } ?>

<?php get_footer(); ?>