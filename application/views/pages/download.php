<div id="download" class="span-22 prefix-1 suffix-1 last">
	<h1>Get yours today!</h1>

	<p class="intro">Kohana has a couple different versions to choose from. All major versions are <a href="https://github.com/kohana/kohana/wiki/Kohana-Development-Procedures">supported</a> for one year from the release date.</p>

	<!-- <p>Releases follow the format of <code>release.major.minor.bugfix</code>. Bugfix releases will never make any feature or API changes. Minor versions may introduce new features that do not change the API. Major versions may introduce new features that require changing the API. Upgrading between minor and bugfix versions will never break an application, except in the case of a serious security flaw being discovered. <small>To date, this has never happened.</small></p> -->

	<div class="featured span-10 suffix-1 colborder">
		<div class="package span-10">
			<?php $version = Kohana::config('files.kohana-latest') ?>
			<h2><?php echo $version['version'] ?> <small class="fancy">"<?php echo $version['codename'] ?>"</small> <small class="status">stable</small></h2>
			<p class="description">Latest stable release of the 3.x series, this is the recommended version for all new projects. Support will last until February 2012.</p>
			<ul class="links">
				<li><?php echo HTML::anchor($version['download'], 'Download', array('class' => 'download')) ?></li>
				<li><?php echo HTML::anchor($version['changelog'], 'Changes', array('class' => 'changelog')) ?></li>
				<li><?php echo HTML::anchor($version['documentation'], 'Documentation', array('class' => 'documentation')) ?></li>
				<li><?php echo HTML::anchor('http://dev.kohanaphp.com/projects/kohana3/issues', 'Issues', array('class' => 'issues')) ?></li>
			</ul>
		</div>
	</div>
	<div class="featured span-10 prefix-1 last">
		<div class="package span-10">
			<?php $version = Kohana::config('files.kohana-3.0.x') ?>
			<h2><?php echo $version['version'] ?> <small class="fancy">"<?php echo $version['codename'] ?>"</small> <small class="status">stable</small></h2>
			<p class="description">3.0.x maintenance branch. Support will last until July 2011.<br /><br /></p>
			<ul class="links">
				<li><?php echo HTML::anchor($version['download'], 'Download', array('class' => 'download')) ?></li>
				<li><?php echo HTML::anchor($version['changelog'], 'Changes', array('class' => 'changelog')) ?></li>
				<li><?php echo HTML::anchor($version['documentation'], 'Documentation', array('class' => 'documentation')) ?></li>
				<li><?php echo HTML::anchor('http://dev.kohanaphp.com/projects/kohana3/issues', 'Issues', array('class' => 'issues')) ?></li>
			</ul>
		</div>
	</div>

	<p class="release">Looking for an older version? You can find unsupported versions of Kohana in the <a href="http://dev.kohanaframework.org/projects/kohana3/files">3.x archives</a> or <a href="http://dev.kohanaframework.org/projects/kohana2/files">2.x archives</a></p>
</div>
