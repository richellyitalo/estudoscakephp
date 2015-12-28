<h1>
	Bookmarks marcados com
	<?php echo $this->Text->toList($tags, ','); ?>
</h1>

<section>
	<?php foreach ($bookmarks as $v): ?>
		<article>
			<h4>
				<?php echo $this->Html->link($v->title, $v->url); ?>
			</h4>
			<small><?php echo h($v->url); ?></small>
			<?php echo $this->Text->autoParagraph($v->description); ?>
		</article>
	<?php endforeach; ?>
</section>