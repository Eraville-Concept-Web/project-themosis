<?php

	/*
	|--------------------------------------------------------------------------
	| Notes - README
	|--------------------------------------------------------------------------
	|
	| You can add as many WordPress constants as you want here. Just make sure
	| to add them at the end of the file or at least after the "WordPress
	| authentication keys and salts" section.
	|
	*/

	/*
	|--------------------------------------------------------------------------
	| WordPress authentication keys and salts
	|--------------------------------------------------------------------------
	|
	| @link https://api.wordpress.org/secret-key/1.1/salt/
	|
	*/
	define('AUTH_KEY', config('auth.keys.auth_key'));
	define('SECURE_AUTH_KEY',  config('auth.keys.secure_auth_key'));
	define('LOGGED_IN_KEY', config('auth.keys.logged_in_key'));
	define('NONCE_KEY',  config('auth.keys.nonce_key'));
	define('AUTH_SALT', config('auth.keys.auth_salt'));
	define('SECURE_AUTH_SALT',  config('auth.keys.secure_auth_salt'));
	define('LOGGED_IN_SALT',  config('auth.keys.logged_in_salt'));
	define('NONCE_SALT',  config('auth.keys.nonce_salt'));

	/*
	|--------------------------------------------------------------------------
	| WordPress database
	|--------------------------------------------------------------------------
	*/
	define('DB_NAME', config('database.connections.mysql.database'));
	define('DB_USER', config('database.connections.mysql.username'));
	define('DB_PASSWORD', config('database.connections.mysql.password'));
	define('DB_HOST', config('database.connections.mysql.host'));
	define('DB_CHARSET', config('database.connections.mysql.charset'));
	define('DB_COLLATE', config('database.connections.mysql.collation'));

	/*
	|--------------------------------------------------------------------------
	| WordPress URLs
	|--------------------------------------------------------------------------
	*/
	define('WP_HOME', config('app.url'));
	define('WP_SITEURL', config('app.wp.url'));
	define('WP_CONTENT_URL', config('app.url') . '/' . CONTENT_DIR);

	/*
	|--------------------------------------------------------------------------
	| WordPress debug
	|--------------------------------------------------------------------------
	*/
	define('SAVEQUERIES', config('app.debug'));
	define('WP_DEBUG', config('app.debug'));
	define('WP_DEBUG_DISPLAY', config('app.debug'));
	define('SCRIPT_DEBUG', config('app.debug'));

	/*
	|--------------------------------------------------------------------------
	| WordPress auto-update
	|--------------------------------------------------------------------------
	*/
	define('WP_AUTO_UPDATE_CORE', FALSE);

	/*
	|--------------------------------------------------------------------------
	| WordPress file editor
	|--------------------------------------------------------------------------
	*/
	define('DISALLOW_FILE_EDIT', config('app.debug'));
	define('WP_MEMORY_LIMIT', config('app.wp.memory_limit'));
	define('WP_MAX_MEMORY_LIMIT', config('app.wp.memory_limit_max'));
	define('WP_POST_REVISIONS', config('app.wp.number_revisions'));
	define('DISALLOW_FILE_MODS', FALSE);

	/*
	|--------------------------------------------------------------------------
	| WordPress Cron
	|--------------------------------------------------------------------------
	*/

	define('DISABLE_WP_CRON', FALSE);

	/*
	|--------------------------------------------------------------------------
	| WordPress default theme
	|--------------------------------------------------------------------------
	*/
	define('WP_DEFAULT_THEME', config('app.name'));

	/*
	|--------------------------------------------------------------------------
	| Application Text Domain
	|--------------------------------------------------------------------------
	*/
	define('APP_TD', config('app.text_domain'));

	/*
	|--------------------------------------------------------------------------
	| JetPack
	|--------------------------------------------------------------------------
	*/
	define('JETPACK_DEV_DEBUG', config('app.debug'));

	/*
	|--------------------------------------------------------------------------
	| Private Extensions Keys
	|--------------------------------------------------------------------------
	*/

	define('WP_ROCKET_EMAIL', config('app.plugins.wp_rocket_email'));
	define('WP_ROCKET_KEY', config('app.plugins.wp_rocket_key'));
