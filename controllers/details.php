<?php

/**
 * System details report controller.
 *
 * @category   Apps
 * @package    System_Report
 * @subpackage Controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2012 ClearFoundation
 * @copyright  2012 Tim Burgess
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

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * System details report controller.
 *
 * @category   Apps
 * @package    System_Report
 * @subpackage Controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2012 ClearFoundation
 * @copyright  2012 Tim Burgess
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/system_report/
 */

class Details extends ClearOS_Controller
{
    /**
     * Stats default controller
     *
     * @return view
     */

    function index()
    {
        // Load dependencies
        //------------------

        $this->lang->load('base');
        $this->lang->load('system_report');
        $this->load->library('base/Stats');

        // Load view data
        //---------------

        try {
            $data[lang('base_version')] = $this->stats->get_clearos_version();
            $data[lang('system_report_kernel_version')] = $this->stats->get_kernel_version();
            $data[lang('system_report_system_time')] = $this->stats->get_system_time();
            $data[lang('system_report_cpu_model')] = $this->stats->get_cpu_model();

            $mem_size = $this->stats->get_mem_size();
            $data[lang('system_report_memory_size')] = array($mem_size .' '. lang(base_gigabytes));

            $uptimes = $this->stats->get_uptimes();
            $days = floor($uptimes['uptime'] / (60*60*24));
            $hours = round(($uptimes['uptime'] - ($days * 60 * 60 * 24))/(60 * 60), 1);
            $data[lang('base_uptime')] = array($days .' '. lang('base_days') .' '. $hours .' '. lang('base_hours'));

            $load = $this->stats->get_load_averages();
            $data[lang('system_report_load')] = array($load['one'] . ' ' . $load['five'] . ' ' . $load['fifteen']);

            $filesystem = $this->stats->get_filesystem_usage();
        } catch (Exception $e) {
            $this->page->view_exception($e);
            return;
        }

        $array['data'] = $data;
        $array['filesystem'] = $filesystem;

        // Load views
        //-----------

        $this->page->view_form('system_report/stats', $array, lang('system_report_system_details'));
    }
}
