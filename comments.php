<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function threadedComments($comments, $singleCommentOptions) {
	$commentClass = '';
	$userClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
			$userClass .= ' author';
		} else {
			$commentClass .= ' comment-by-user';
			$userClass .= ' user';
		}
	}
	$commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
	echo ' comment-child';
} else {
	echo ' comment-parent';
}
echo $commentClass;
?>">
	<div id="<?php $comments->theId(); ?>">
		<span class="comment-author<?php echo $userClass; ?>">
			<cite class="fn"><?php $comments->author(); ?></cite>: 
		</span>
		<?php if ($comments->status == 'waiting'): ?><span class="danger">[待审核]</span><?php endif; ?>
		<?php $comments->content(); ?>
		<span class="comment-meta">
			<a href="<?php $comments->permalink(); ?>"><?php $comments->date(); ?></a>
			<span class="comment-reply"><?php $comments->reply('回复'); ?></span>
		</span>
	</div>
<?php if ($comments->children) { ?>
	<div class="comment-children">
		<?php $comments->threadedComments(); ?>
	</div>
<?php } ?>
</li>
<?php } ?>
<?php $this->comments()->to($comments); ?>
<div id="comments">
<?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>" class="respond">
<p class="comment-head">留下一条评论 <span class="cancel-comment-reply"><?php $comments->cancelReply('取消回复'); ?></span></p>
<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form" class="form">
	<p class="comment-user-info"><?php if($this->user->hasLogin()): ?>
	已经作为 <a href="<?php $this->options->profileUrl(); ?>" target="_blank"><?php $this->user->screenName(); ?></a> 登录。 <a href="<?php $this->options->logoutUrl(); ?>">注销&raquo;</a>
		<?php else: ?>
			<input type="text" name="author" id="author" placeholder="昵称 *" value="<?php $this->remember('author'); ?>" required />
			<input type="email" name="mail" id="mail" placeholder="E-mail<?php if ($this->options->commentsRequireMail): ?> *<?php endif; ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
			<input type="url" name="url" id="url" placeholder="网站<?php if ($this->options->commentsRequireURL): ?> *<?php endif; ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
		<?php endif; ?></p>
	<textarea rows="5" name="text" id="comment" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="在这里输入您的评论…" required><?php $this->remember('text'); ?></textarea>
<p class="comment-button"><input type="button" value="清空内容" onclick="this.form.text.value='';" class="button" /> <input type="submit" value="提交评论 (Ctrl+Enter)" class="button" id="submit" /></p>
</form>
<?php else: ?>
	<div class="alert info">对于此页的评论已被停用。</div>
<?php endif; ?>
</div>
<p class="comment-head"><?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('共有 %d 条评论')); ?></p>
<?php $comments->listComments(); ?>
</div>