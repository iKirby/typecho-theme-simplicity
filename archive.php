<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
	<header>
		<a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>&nbsp;/
		<h1><?php $this->archiveTitle(array(
			'category'  =>  _t('%s 分类下的文章'),
			'search'    =>  _t('包含关键词 %s 的文章'),
			'tag'       =>  _t('被贴上 %s 标签的文章'),
			'author'    =>  _t('%s 的文章')
			), '', ''); ?></h1>
	</header>
<?php if ($this->have()): ?>
	<div class="content">
		<div class="post">
			<ul class="post-list">
				<?php while($this->next()): ?>
				<li class="post-item">
					<a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a>
					<span class="post-meta">
						&nbsp;/&nbsp;
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
<?php else: ?>
	<div class="content">
		<div class="post">
			<div class="post-content">
				<p>没有找到相关内容，请更换查找条件后再试。</p>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php $this->need('footer.php'); ?>