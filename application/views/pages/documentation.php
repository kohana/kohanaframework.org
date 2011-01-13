<div id="documentation" class="span-22 prefix-1 suffix-1 last">

	<h1>Help, it doesn't work!</h1>

	<p class="intro">Documentation is provided for both v2.x and v3.x, in separate places.</p>

	<div id="feature">
		<h2><?php echo HTML::anchor(Route::get('docs/guide')->uri(), HTML::image('media/img/book.png', array('alt' => 'Documentation')) . 'v3.x Documentation') ?></h2>
		<p>Documentation for v3.x can be <?php echo HTML::anchor(Route::get('docs/guide')->uri(), 'found here') ?>.  It is also included in the <code>userguide module</code> in all releases. Once the userguide module is enabled in the bootstrap, it is accessible from your site with <code>/guide</code></p>
	</div>

	<h3><?php echo HTML::anchor('http://docs.kohanaphp.com/', 'v2.x Documentation') ?></h3>
	<p>For documentation of v2.x, please use the <?php echo HTML::anchor('http://docs.kohanaphp.com/', 'Kohana Documentation Wiki') ?>.</p>

	<h3>I still need help!</h3>

	<p>The Kohana <?php echo HTML::anchor('community', 'user community') ?> may be able to help you find the answer you are looking for.</p>

</div>
