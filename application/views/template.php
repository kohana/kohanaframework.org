<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Kohana::$charset ?>" />

<meta name="description" content="Kohana is an elegant HMVC PHP5 framework that provides a rich set of components for building web applications." />
<meta name="keywords" content="kohana, php, php 5, framework, mvc, hmvc, oop, object oriented, bsd license, open source, free, utf8, utf-8, i18n, internationalization, translation, international, database, modeling, views, controllers, classes, libraries, dry, secure, fast, lightweight, encryption, extensible, cascading filesystem">

<link rel="shortcut icon" href="/media/img/favicon.png" type="image/png" />

<title>Kohana: <?php echo $title ?></title>

<?php foreach ($styles as $style => $media)
	echo HTML::style($style, array('media' => $media)), "\n" ?>


<script type="text/javascript">
var base_url = '<?php echo URL::site() ?>';
</script>

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
				Copyright &copy;2007-<?php echo date('Y') ?><br/>
				All rights reserved<br/>
				The awesome <?php echo HTML::anchor('team', 'Kohana Team') ?><br/>
				Uses the excellent <?php echo html::anchor('http://www.famfamfam.com/lab/icons/silk/', 'silk icons') ?>
			</p>
		</div>
		<div class="discussions feed span-8">
			<h6 class="caps top">Latest Discussions</h6>
			<?php echo Request::factory(Route::get('feed')->uri(array(
					'name' => 'forum',
				)))->execute()->response ?>
		</div>
		<div class="changes feed span-8 suffix-1 last">
			<h6 class="caps top">Latest Development</h6>
			<?php echo Request::factory(Route::get('feed')->uri(array(
					'name' => 'dev',
				)))->execute()->response ?>
		</div>
	</div>
</div>

<?php include Kohana::find_file('views', 'template/stats') ?>

</body>
</html>