$(document).ready(function()
{
	$('ol.feed').each(function()
	{
		var self = $(this);

		self.find('li:last-child').prepend('<li><small>Loading items...</small></li>');

		self.load(base_url + self.attr('rel'));
	});
});
