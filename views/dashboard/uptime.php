<?php

/**
 * System report uptime view.
 *
 * @category   apps
 * @package    system-report
 * @subpackage views
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

///////////////////////////////////////////////////////////////////////////////
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('base');

echo box_open(lang('base_uptime'), array('class' => 'system_report_uptime'));
echo box_content_open();
echo row_open();

echo column_open(3);
echo "<div class='theme-center-text'>";
echo "<div class='theme-biggest-text'>" . $uptime['d'] . "</div>";
echo "<div class='theme-smaller-text'>" . strtoupper(($uptime['d'] == 1 ? lang('base_day') : lang('base_days'))) . "</div>";
echo "</div>";
echo column_close();

echo column_open(3);
echo "<div class='theme-center-text'>";
echo "<div class='theme-biggest-text'>" . $uptime['h'] . "</div>";
echo "<div class='theme-smaller-text'>" . strtoupper(($uptime['h'] == 1 ? lang('base_hour') : lang('base_hours'))) . "</div>";
echo "</div>";
echo column_close();

echo column_open(3);
echo "<div class='theme-center-text'>";
echo "<div class='theme-biggest-text'>" . $uptime['m'] . "</div>";
echo "<div class='theme-smaller-text'>" . strtoupper(($uptime['m'] == 1 ? lang('base_minute') : lang('base_minutes'))) . "</div>";
echo "</div>";
echo column_close();

echo column_open(3);
echo "<div class='theme-center-text'>";
echo "<div class='theme-biggest-text'>" . $uptime['s'] . "</div>";
echo "<div class='theme-smaller-text'>" . strtoupper(($uptime['s'] == 1 ? lang('base_second') : lang('base_seconds'))) . "</div>";
echo "</div>";
echo column_close();

echo row_close();
echo box_content_close();
echo box_close();
