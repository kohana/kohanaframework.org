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
		<div class="span-24">
			Blurb
		</div>
		<div class="span-12">
			3.0
		</div>
		<div class="span-12 last">
			2.4
		</div>
		<div class="span-24">
			showcase
		</div>
	</div>
</div>

<div id="footer" class="container">
	<div class="span-8">
		kohana
	</div>
	<div class="span-8">
		Feed 1
	</div>
	<div class="span-8 last">
		Feed 2
	</div>
</div>

</body>
</html>