<div id="download" class="span-22 prefix-1 suffix-1 last">
	<h1>Get yours today!</h1>

	<p class="intro">Kohana has a couple different versions to choose from. All versions are supported for two years from the release date.</p>

	<!-- <p>Releases follow the format of <code>release.major.minor.bugfix</code>. Bugfix releases will never make any feature or API changes. Minor versions may introduce new features that do not change the API. Major versions may introduce new features that require changing the API. Upgrading between minor and bugfix versions will never break an application, except in the case of a serious security flaw being discovered. <small>To date, this has never happened.</small></p> -->

	<div class="featured span-12 suffix-2 colborder">
		<div class="package span-12 last">
			<?php $latest = Kohana::config('files.kohana-latest') ?>
			<h2><?php echo $latest['version'] ?> <small class="fancy">"<?php echo $latest['codename'] ?>"</small> <small class="status">stable</small></h2>
			<p class="description">Current stable release of the 3.x series, this is the recommended version for all new projects.
				Support will last until October 2012.</p>
			<ul class="links">
				<li><?php echo HTML::anchor($latest['download'], 'Download', array('class' => 'download')) ?></li>
				<li><?php echo HTML::anchor($latest['changelog'], 'Changes', array('class' => 'changelog')) ?></li>
				<li><?php echo HTML::anchor(Route::get('docs/guide')->uri(), 'Documentation', array('class' => 'documentation')) ?></li>
				<li><?php echo HTML::anchor('http://dev.kohanaphp.com/projects/kohana3/issues', 'Issues', array('class' => 'issues')) ?></li>
			</ul>
		</div>
		<div class="package span-11 last">
			<h2>v2.3.4 <small class="fancy">"buteo regalis"</small> <small class="status">final</small></h2>
			<p class="description">Final release of the 2.3 series, no longer supported. Not recommended for new projects.</p>
			<ul class="links">
				<li><?php echo HTML::anchor('http://dev.kohanaframework.org/attachments/download/1355/kohana-v2.3.4.zip', 'Download', array('class' => 'download')) ?></li>
				<li><?php echo HTML::anchor('http://docs.kohanaphp.com/', 'Documentation', array('class' => 'documentation')) ?></li>
			</ul>
		</div>
	</div>
	<div class="sidebar span-8 last">
		<div class="package span-8 last">
			<h2>v3.1.0 <small class="status">RC1</small></h2>
			<p class="description">Currently under development, this will be the next major release of the 3.x series.</p>
			<ul class="links">
				<li><?php echo HTML::anchor('http://dev.kohanaframework.org/kohana-3.1-release-3.1.0-7.zip', 'Download', array('class' => 'download')) ?></li>
				<li><?php echo HTML::anchor('http://dev.kohanaframework.org/versions/show/130', 'Status', array('class' => 'changelog')) ?></li>
				<li><?php echo HTML::anchor('http://github.com/kohana/kohana/tree/3.1/develop', 'Repository', array('class' => 'repository')) ?></li>
			</ul>
		</div>

		
	</div>
</div>
