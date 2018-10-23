<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
	<footer id="footer">
		<nav>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
			<a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
		<?php endwhile; ?>
		</nav>
		<div id="copyright">
			&copy;<?php echo date('Y'); ?> <?php $this->options->title(); ?>. Powered by <a href="http://typecho.org" target="_blank">Typecho</a>.
		</div>
	</footer>
</div>
</div>
<?php $this->footer(); ?>
<script>if(top.location!==self.location){top.location=self.location};</script>
</body>
</html>