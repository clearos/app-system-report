<?php

/**
 * System Report Dashboard controller.
 *
 * @category   apps
 * @package    system_report
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2015 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/system_report/
 */

///////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

class System_Report_Dashboard extends ClearOS_Controller
{
    /**
     * Dashboard default controller.
     *
     * @return view
     */

    function index()
    {
        // Default to system uptime
        $this->uptime();
    }

    /**
     * Uptime.
     *
     * @return view
     */

    function uptime()
    {
        // Load libraries
        //---------------
        $this->lang->load('base');
        $this->lang->load('system_report');
        $this->load->library('base/Stats');

        $secondsInAMinute = 60;
        $secondsInAnHour  = 60 * $secondsInAMinute;
        $secondsInADay    = 24 * $secondsInAnHour;

        $uptime = $this->stats->get_uptimes()['uptime'];

        $days = floor($uptime / $secondsInADay);

        $hourSeconds = $uptime % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        $data['uptime'] = array(
            'd' => (int) $days,
            'h' => (int) $hours,
            'm' => (int) $minutes,
            's' => (int) $seconds,
        );

        $this->page->view_form('system_report/dashboard/uptime', $data, lang('system_report_uptime'));
	}
}
