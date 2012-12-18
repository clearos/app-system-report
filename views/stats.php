<?php

/**
 * System report stats view.
 *
 * @category   ClearOS
 * @package    System_Report
 * @subpackage Views
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
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('system_report');

///////////////////////////////////////////////////////////////////////////////
// Form handler
///////////////////////////////////////////////////////////////////////////////

$headers = array(
    lang('system_report_item'),
    lang('system_report_value')
);

$rows = array();

foreach ($data as $id => $entry) {
    $row['details'] = array ($id,$entry[0]);
    $rows[] = $row;
}

///////////////////////////////////////////////////////////////////////////////
// Table
///////////////////////////////////////////////////////////////////////////////

$options['no_action'] = TRUE;
$options['sort'] = FALSE;

echo summary_table(
    lang('system_report_system_details'),
    $anchors,
    $headers,
    $rows,
    $options
);
