<div id="home" class="span-22 prefix-1 suffix-1">
	<p class="intro">Kohana is an elegant <abbr title="Hierarchical Model View Controller">HMVC</abbr> PHP5 framework that provides a rich set of components for building web applications.</p>
	<p>It requires very little configuration, fully supports UTF-8 and <abbr title="internationalization">i18n</abbr>, and provides many of the tools that a developer needs within a highly flexible system. The integrated class auto-loading, cascading filesystem, highly consistent <abbr title="Application Programming Interface">API</abbr>, and easy integration with vendor libraries make it viable for any project, large or small.</p>

	<div class="features span-12 suffix-2">
		<h2>Why Use Kohana?</h2>
		<dl>
			<dt>You need to build applications quickly.</dt>
			<dd>Many common components are included: translation tools, database access, code profiling, encryption, validation, and more.</dd>

			<dt>You need to use specific libraries and tools.</dt>
			<dd>Extending existing components and adding new libraries is very easy.</dd>

			<dt>You need to write commercial applications.</dt>
			<dd>Uses the <?php echo HTML::anchor('http://creativecommons.org/licenses/BSD/', 'BSD license') ?>, so you can use and modify it for commercial purposes.</dd>

			<dt>You want a very fast framework.</dt>
			<dd>Benchmarking a framework is hard and rarely reflects the real world, but Kohana is very efficient and carefully optimized for real world usage.</dd>

			<dt>You want good debugging and profiling tools.</dt>
			<dd>Simple and effective tools help identify and solve performance issues quickly.</dd>

			<dt>You want to know what the framework is doing.</dt>
			<dd>Very well commented code and a simple routing structure makes it easy to understand what is happening.</dd>

			<dt>You like working with objects and classes, rather than files and functions.</dt>
			<dd>This is an <abbr title="Object Oriented Programming">OOP</abbr> framework that is extremely <abbr title="Don't Repeat Yourself">DRY</abbr>. Everything is built using strict PHP 5.2 classes and objects.</dd>

			<dt>You prefer to write your own code, rather than having it generated for you.</dt>
			<dd>There are no code generators and endless configuration files, so setting up is fast and easy.</dd>

			<dt>You need community support.</dt>
			<dd>A very active community <?php echo HTML::anchor('http://forum.kohanaframework.org/', 'forum') ?> and <?php echo html::anchor('irc://freenode.net/kohana', 'IRC channel') ?> means that most questions are answered very quickly.</dd>
		</dl>
	</div>
	<div class="sidebar span-8 last">
		<div class="download span-8 last">
			<h2>Download Latest Version</h2>
			<?php $file = Kohana::config('files.kohana-latest') ?>
			<p class="link"><?php echo HTML::anchor(Route::get('file')->uri(array('file' => 'kohana-latest')), $file['version'].' ('.$file['status'].')') ?></p>
			<p class="bottom">Documentation is available online in the <?php echo HTML::anchor(Route::get('docs/guide')->uri(), 'user guide') ?>.</p>
			<p class="top">Other releases can be found in the <?php echo html::anchor(Route::get('page')->uri(array('page' => 'download')), 'download') ?> section.</p>
		</div>

		<div class="donate span-8 last">
			<h2>Giving Back</h2>
			<p class="intro">If you use Kohana, we ask that you <?php echo HTML::anchor(Route::get('page')->uri(array('page' => 'donate'))) ?> to ensure future development is possible.</p>
			<h6>Where will my money go?</h6>
			<p>Your donations are used to cover the cost of maintaining this website and related resources, and services required to provide these resources.</p>
			<p>As part of the <?php echo HTML::anchor('http://conservancy.softwarefreedom.org/', 'Software Freedom Conservancy') ?>, your donations are fully tax-deductible to the extent permitted by law.</p>
		</div>
	</div>
</div>
