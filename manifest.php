<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Menucard', 'fw' );
$manifest['description'] = __(
	'This extension will add menucard in your website. It is suitable for restaurant website.',
	'fw'
);
$manifest['version'] = '1.0.1';
$manifest['display'] = true;
$manifest['standalone'] = true;

$manifest['github_update'] = 'hlaporthein/menucard';

$manifest['github_repo'] = 'https://github.com/hlaporthein/menucard';
$manifest['uri'] = 'http://manual.unyson.io/en/latest/extension/portfolio/index.html#content';
$manifest['author'] = 'hlaporthein';
$manifest['author_uri'] = 'https://github.com/hlaporthein';
