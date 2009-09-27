<?php

// Displayed feeds are cached for 2 minutes
if ( ! Fragment::load('feed:'.$feed.':'.$limit, Date::MINUTE * 2)):

// Parse the feed
$items = Feed::parse($feed, $limit);

// Set the "link" and "title" variable names
isset($link)  or $link  = 'link';
isset($title) or $title = 'title';

?>
<?php foreach ($items as $item): ?>
<li><?php echo HTML::anchor($item[$link], $item[$title]) ?></li>
<?php endforeach ?>
<li>&raquo; <?php echo HTML::anchor($feed, $more) ?>
<?php Fragment::save(); endif ?>