<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Feed extends Controller {

	public function action_load($name, $type = NULL)
	{
		// Load the feed configuration
		$feed = Kohana::config("feeds.$name");

		if ( ! $feed)
		{
			throw new Kohana_Exception('Requested feed not found: :name', array(
				':name' => $name,
			));
		}

		$this->request->response = View::factory('template/feed')
			->bind('links', $links)
			->bind('feed', $feed)
			->bind('name', $name);

		if (Request::$is_ajax)
		{
			// Actually load the list of feed items and return it

			// Set the caching key name
			$cache = "feed:{$feed['title']}";

			// Load the feed items from cache
			$links = Kohana::cache($cache, NULL, $feed['cache']);

			if ( ! $links)
			{
				// Parse the feed with the given limit
				$items = Feed::parse($feed['feed'], $feed['limit']);

				$links = array();
				foreach ($items as $item)
				{
					// Choose the item link
					$link = isset($item['id']) ? $item['id'] : $item['link'];

					// Add the link to the list
					$links[$link] = (string) $item['title'];
				}

				// Cache the parsed feed
				Kohana::cache($cache, $links, $feed['cache']);
			}
		}
	}

} // End Feed
