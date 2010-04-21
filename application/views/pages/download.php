<div id="download" class="span-22 prefix-1 suffix-1 last">

	<h1><?php echo __('Package Downloads') ?></h1>
	<p class="intro"><?php echo __('Kohana has multiple versions to choose from:') ?></p>

<?php

$packages = Sprig::factory('package')->load(NULL, FALSE);

?>
<?php foreach ($packages as $i => $package): ?>
	<div class="package span-11 <?php if(($i + 1) % 2 === 0) echo ' last' ?>">
		<div class="details">
			<h2 class="bottom">v<?php echo $package->version ?> <small class="fancy">"<?php echo $package->codename ?>"</small>  <small class="warning"><?php echo __($package->type) ?></small></h2>
			<ul>
<?php foreach ($package->links as $link): ?>
				<li class="<?php echo URL::title($link->title) ?>"><?php echo HTML::anchor($link->url(), __($link->title)) ?></li>
<?php endforeach ?>
			</ul>
		</div>
	</div>
<?php endforeach ?>

	<!-- <div class="span-22 last">
		<dl>
			<dt>Never used Kohana before?</dt>
			<dd>Try v3.x and see if you like it.</dd>

			<dt>Building a completely new application and expect to launch in 4+ months?</dt>
			<dd>We recommend v3.x for new applications.</dd>

			<dt>Upgrading an existing Kohana-based application?</dt>
			<dd>Upgrade to v2.3.x first, then review the changes in v2.4.x.</dd>
		</dl>
	</div> -->

	</div>
</div>
