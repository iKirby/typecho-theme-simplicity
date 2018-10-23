<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
	<header>
		<a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a><span class="slash">/</span>
		<h1><?php $this->title(); ?></h1>
	</header>
	<div class="content">
		<div class="post">
			<div class="post-content"><?php $this->content(); ?></div>
			<div class="post-meta"><?php $this->author(); ?> @ <?php $this->date('Y-m-d'); ?> in <?php $this->category(); ?></div>
		</div>
		<?php $this->need('comments.php'); ?>
	</div>
<?php $this->need('footer.php'); ?>