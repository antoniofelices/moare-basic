wp.domReady( function() {

	const unusedSocialIcons = [
		'amazon',
		'bandcamp',
		'behance',
		'chain',
		'codepen',
		'deviantart',
		'dribbble',
		'dropbox',
		'etsy',
		'feed',
		'fivehundredpx',
		'flickr',
		'foursquare',
		'gravatar',
		'goodreads',
		'google',
		'github',
		'lastfm',
		'mastodon',
		'meetup',
		'medium',
		'patreon',
		'pinterest',
		'pocket',
		'reddit',
		'skype',
		'snapchat',
		'soundcloud',
		'spotify',
		'tumblr',
		'twitch',
		'vimeo',
		'vk',
		'wordpress',
		'yelp'
	];
	unusedSocialIcons.forEach( ( icon ) => wp.blocks.unregisterBlockVariation( 'core/social-link', icon ) );

	const unusedEmbedPlatforms = [
		'amazon-kindle',
		'animoto',
		'cloudup',
		'crowdsignal',
		'dailymotion',
		'mixcloud',
		'photobucket',
		'reverbnation',
		'screencast',
		'smugmug',
		'speaker-deck',
		'videopress',
		'wolfram-cloud',
		'wordpress',
		'wordpress-tv'
	];
	unusedEmbedPlatforms.forEach( ( platform ) => wp.blocks.unregisterBlockVariation( 'core/embed', platform ) );

})