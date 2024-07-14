<?php
/**
 * this class encapsulate an inject query result
 * @package     IO
 * @subpackage  DB
 * @copyright   &copy; 2005-2023 PHPBoost
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL-3.0
 * @author      Loic ROUCHON <horn@phpboost.com>
 * @version     PHPBoost 6.0 - last update: 2014 12 22
 * @since       PHPBoost 3.0 - 2009 11 02
*/

interface InjectQueryResult extends QueryResult
{
    /**
     * returns the number of affected rows by this query
     * @return int the number of affected rows by this query
     */
    function get_affected_rows();

    /**
     * returns the primary key value generated by the last insert query
     * @return int the primary key value generated by the last insert query
     */
    function get_last_inserted_id();
}
?>