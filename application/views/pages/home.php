<div id="home" class="span-22 prefix-1 suffix-1">
	<div class="about span-22 last">
		<h1>The Kohana PHP Framework</h1>
		<p class="intro">Kohana is an elegant <abbr title="Hierarchical Model View Controller">HMVC</abbr> PHP5 framework that provides a rich set of components for building efficient and reusable web applications. It requires very little configuration, fully supports UTF-8 and <abbr title="internationalization">i18n</abbr>, and provides many of the tools that a developer needs within a highly flexible system.</p>
	</div>
	<div class="features span-12 suffix-2">
		<h2>Why Use Kohana?</h2>
		<dl>
			<dt>You need to build applications quickly.</dt>
			<dd>Many common components are included: translation tools, database access, code profiling, encryption, validation, and more.</dd>

			<dt>You need to use specific libraries and tools.</dt>
			<dd>Extending existing components and adding new libraries is very easy.</dd>

			<dt>You need to write commercial applications.</dt>
			<dd>Licensed under BSD, so you can use and modify it for commercial purposes.</dd>

			<dt>You want a very fast framework.</dt>
			<dd>Benchmarking a framework is hard and rarely reflects the real world, but Kohana is very efficient and carefully optimized.</dd>

			<dt>You want good debugging and profiling tools.</dt>
			<dd>Simple and effective tools help identify and solve issues quickly.</dd>

			<dt>You want to know what the framework is doing.</dt>
			<dd>Very well commented code and a simple routing structure makes it easy to understand what is happening.</dd>

			<dt>You like working with objects and classes, rather than files and functions.</dt>
			<dd>This is an <abbr title="Object Oriented Programming">OOP</abbr> framework that is extremely <abbr title="Don't Repeat Yourself">DRY</abbr>. Everything is built using strict PHP 5.2 classes and objects.</dd>

			<dt>You prefer to write your own code, rather than having it generated for you.</dt>
			<dd>There are no code generators and endless configuration files, so setting up is <em>fast</em>.</dd>


			<!-- <dt>You care about web standards.</dt>
			<dd>We do too.</dd> -->
		</dl>
	</div>
	<div class="download span-8 last">
		<h2>Download &amp; Use</h2>
		<dl>
			<dt>Stable</dt>
			<dd><?php echo html::anchor(Route::get('file')->uri(array('file' => 'kohana-3.0.4.2.zip')), 'v3.0.4.2') ?></dd>
			<dd><?php echo html::anchor(Route::get('docs/guide')->uri(), 'User Guide') ?></dd>

			<dt>Legacy</dt>
			<dd><?php echo html::anchor(Route::get('file')->uri(array('file' => 'kohana-2.4rc1.zip')), 'v2.4rc1') ?></dd>

			<dt>Unsupported</dt>
			<dd>v3.2.4</dd>
			<dd><?php echo html::anchor('http://legacy.kohanaphp.com/wiki', 'Wiki') ?></dd>
		</dl>
	</div>
	<div class="showcase span-22 last">
		<h1>Application Showcase</h1>
		<p>Want to show off a website you built using Kohana? Email <?php echo HTML::mailto('showcase@kohanaframework.org') ?> and we will add to the list.</p>
	</div>
</div>
