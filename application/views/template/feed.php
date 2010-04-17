<ol class="feed" rel="<?php echo Route::get('feed')->uri(array('name' => $feed->name)) ?>">
<?php if (is_array($links)): ?>
<?php foreach ($links as $link => $title): ?>
	<li><?php echo HTML::anchor($link, $title) ?></li>
<?php endforeach ?>
<?php endif ?>
	<li class="more">&raquo; <?php echo HTML::anchor($feed->more, $feed->title) ?></li>
</ol>