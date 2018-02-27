<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Menu card', 'fw' );
$manifest['description'] = __(
	'This extension will add menu card in your website. It is suitable for restaurant website.',
	'fw'
);
$manifest['version'] = '1.0.2';
$manifest['display'] = true;
$manifest['standalone'] = true;

$manifest['github_update'] = 'hlaporthein/menucard';

$manifest['github_repo'] = 'https://github.com/hlaporthein/menucard';
$manifest['uri'] = 'https://github.com/hlaporthein/menucard';
$manifest['author'] = 'hlaporthein';
$manifest['author_uri'] = 'https://github.com/hlaporthein';
