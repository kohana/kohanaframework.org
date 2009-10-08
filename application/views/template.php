<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Kohana::$charset ?>" />
<title>Kohana: <?php echo $title ?></title>

<?php foreach ($styles as $style => $media)
	echo HTML::style($style, array('media' => $media)), "\n" ?>

<?php foreach ($scripts as $script)
	echo HTML::script($script), "\n" ?>

</head>
<body>

<div id="header">
	<div class="container">
		<?php echo HTML::anchor('', HTML::image('media/img/kohana.png', array('alt' => 'Kohana: Develop Swiftly')), array('id' => 'logo')) ?>
		<div id="menu">
			<ul>
				<li class="home first"><?php echo HTML::anchor('', 'Home') ?></li>
				<li class="download"><?php echo HTML::anchor('download', 'Download') ?></li>
				<li class="documentation"><?php echo HTML::anchor('documentation', 'Documentation') ?></li>
				<li class="community"><?php echo HTML::anchor('community', 'Community') ?></li>
				<li class="development last"><?php echo HTML::anchor('development', 'Development') ?></li>
			</ul>
		</div>
	</div>
</div>

<div id="content">
	<div class="wrapper">
		<div class="container">
			<?php echo $content ?> 
		</div>
	</div>
</div>

<div id="footer">
	<div class="container">
		<div class="copyright span-6 prefix-1">
			<p class="caps top"><?php echo HTML::anchor('', 'Kohana', array('class' => 'logo')) ?>
				Copyright &copy;2007-2009<br/>
				All rights reserved<br/>
				The awesome <?php echo HTML::anchor('team', 'Kohana Team') ?>
			</p>
		</div>
		<div class="discussions feed span-8">
			<h6 class="caps top">Latest Discussions</h6>
			<ol>
				<?php echo View::factory('template/feed', array(
					'feed'  => 'http://forum.kohanaphp.com/search.php?PostBackAction=Search&Advanced=1&Type=Comments&Feed=RSS2',
					'limit' => 5,
					'more'  => 'More discussions',
				)) ?>
			</ol>
		</div>
		<div class="changes feed span-8 suffix-1 last">
			<h6 class="caps top">Latest Development</h6>
			<ol>
				<?php echo View::factory('template/feed', array(
					'feed'  => 'http://dev.kohanaphp.com/activity.atom?show_changesets=1',
					'limit' => 5,
					'link'  => 'id',
					'more'  => 'More development',
				)) ?>
			</ol>
		</div>
	</div>
</div>

</body>
</html>