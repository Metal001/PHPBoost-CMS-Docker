<?php
/**
 * @package     MVC
 * @subpackage  Dispatcher
 * @copyright   &copy; 2005-2023 PHPBoost
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL-3.0
 * @author      Loic ROUCHON <horn@phpboost.com>
 * @version     PHPBoost 6.0 - last update: 2014 12 22
 * @since       PHPBoost 3.0 - 2010 10 06
*/

interface UrlMappingsExtensionPoint extends ExtensionPoint
{
	const EXTENSION_POINT = 'url_mappings';

	/**
	 * @return UrlMapping[]
	 */
	function list_mappings();
}
?>
