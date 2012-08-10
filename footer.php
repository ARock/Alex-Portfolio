			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
					
					<nav>
						<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
			
					<p class="attribution">&copy;2012 <?php bloginfo('name'); ?>&nbsp&nbsp Designed and Developed by Eriks Briedis. &nbsp&nbsp Powered by <strong>SchemersPress</strong></p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<!-- scripts are now optimized via Modernizr.load -->	
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->

		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31769392-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>