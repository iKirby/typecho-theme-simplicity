<?php
/**
 * 一款超简单和速度飞快的主题。
 * 
 * @package Simplicity
 * @author iKirby
 * @version 1.1
 * @link https://ikirby.me
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
	<header>
		<h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></h1>
	</header>
	<div class="content">
		<div class="post">
			<ul class="post-list">
				<?php while($this->next()): ?>
				<li class="post-item">
					<a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a>
					<span class="post-meta">
						<span class="slash">/</span>
						<time datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time>
					</span>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="pagenav">
			<?php $this->pageLink('&laquo;上一页','prev'); ?><?php $this->pageLink('下一页&raquo;','next'); ?>
		</div>
	</div>
<?php $this->need('footer.php'); ?>