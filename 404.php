<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
	<header>
		<a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>&nbsp;/
		<h1>404 Not Found</h1>
	</header>
	<div class="content">
		<div class="post">
			<div class="post-content">
				<p>此页面不存在。</p>
			</div>
		</div>
	</div>
<?php $this->need('footer.php'); ?>