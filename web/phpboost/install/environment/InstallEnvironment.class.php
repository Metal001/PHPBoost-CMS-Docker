<?php
/**
 * @copyright   &copy; 2005-2023 PHPBoost
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL-3.0
 * @author      Benoit SAUTEL <ben.popeye@phpboost.com>
 * @version     PHPBoost 6.0 - last update: 2018 10 09
 * @since       PHPBoost 2.0 - 2009 09 28
 * @contributor Loic ROUCHON <horn@phpboost.com>
 * @contributor Julien BRISWALTER <j1.seth@phpboost.com>
 * @contributor mipel <mipel@phpboost.com>
*/

require_once PATH_TO_ROOT . '/kernel/framework/core/environment/Environment.class.php';

class InstallEnvironment extends Environment
{
	public static function load_imports()
	{
		Environment::load_imports();
	}

	public static function init()
	{
		Environment::fit_to_php_configuration();
		Environment::init_http_services();
		Environment::load_static_constants();
		self::load_dynamic_constants();
		self::init_output_bufferization();
		self::set_locale();
		self::init_admin_role();
	}

	public static function init_output_bufferization()
	{
		ob_start();
	}

	public static function load_dynamic_constants()
	{
		define('HOST', Appcontext::get_request()->get_site_url());
		$server_path = !empty($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : getenv('PHP_SELF');
		define('FILE', $server_path);
		define('DIR', str_replace('/install/index.php', '', $server_path));
		define('TPL_PATH_TO_ROOT', PATH_TO_ROOT);
	}

	private static function set_locale()
	{
		$locale = AppContext::get_request()->get_getstring('locale', 'french');
		LangLoader::set_locale($locale);
	}

	private static function init_admin_role()
	{
		AppContext::set_session(new AdminSessionData());
		AppContext::set_current_user(new AdminUser());
	}

	public static function destroy()
	{
		ob_end_flush();
	}
}
?>
