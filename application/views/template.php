<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Kohana::$charset ?>" />
<title>KohanaPHP</title>

<?php echo
	HTML::style('media/css/print.css', array('media' => 'print')), "\n",
	HTML::style('media/css/screen.css', array('media' => 'screen')), "\n",
	HTML::style('media/css/kohana.css', array('media' => 'screen'))
?>

</head>
<body>

<div id="wrapper">
	<div id="header">
		<div class="container">
			<?php echo HTML::anchor('', HTML::image('media/img/kohana.png', array('alt' => 'Kohana')), array('id' => 'logo')) ?>
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
	<div id="content" class="container">
		<div class="about span-12">
			Blurb
		</div>
		<div class="versions span-12 last">
			<div class="v3">
				3.0
			</div>
			<div class="v2">
				2.3
			</div>
		</div>
	</div>
	<div id="showcase" class="container">
		<div class="span-24">
			Showcase
		</div>
	</div>
</div>

<div id="footer" class="container">
	<div class="copyright span-8">
		<p class="caps top"><?php echo HTML::anchor('', HTML::image('media/img/kohana_dark.png', array('alt' => 'Kohana'))) ?><br/>
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
	<div class="changes feed span-8 last">
		<h6 class="caps top">Latest Development</h6>
		<ol>
			<?php echo View::factory('template/feed', array(
				'feed'  => 'http://dev.kohanaphp.com/activity.atom?key=yUHDvnjJryqHZmgiSNAaReHU6V5JHXBNnew8gRLu&show_changesets=1',
				'limit' => 5,
				'link'  => 'id',
				'more'  => 'More development',
			)) ?>
		</ol>
	</div>
</div>

</body>
</html>