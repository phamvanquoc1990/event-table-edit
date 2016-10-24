<?php
/**
 * @version		$Id: $
 * @package		eventtableedit
 * @copyright	Copyright (C) 2007 - 2016 Manuel Kaspar and Matthias Gruhn
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Component Helper
jimport('joomla.application.component.helper');

class eteHelper {
	public static function date_german_to_mysql($date) {
		$d    =    explode(".",$date);
	    
		if ($date == '') {
			return NULL;
		}
		
	    return    sprintf("%04d.%02d.%02d", $d[2], $d[1], $d[0]);
	}
	
	public static function date_mysql_to_german($date, $format) {
		if ($date == NULL) {
			return NULL;
		}
		
	    return strftime( $format, strtotime( $date ));
	}
	
	public static function format_time($time, $format) {
		if ($time == NULL) {
			return NULL;
		}
		return strftime( $format, strtotime( $time ));
	}

	public static function parseBoolean($cell) {
		if ($cell != '' && $cell != null) {
			if ((int) $cell == 1) {
	  			$cell = '<img src="' . JURI::root() . 'administrator/components/com_eventtableedit/template/images/cross.png">';
			}
			else if ((int) $cell == 0) {
				$cell = '<img src="' . JURI::root() . 'components/com_eventtableedit/template/images/tick.png">';
			}
			else {
				$cell = '';
			}
		}

		return $cell;
	}

	public static function parseFloat($cell, $separator) {
		if ($cell != '' && $separator == ',') {
			$cell = str_replace('.', ',', $cell);
		}

		return $cell;
	}

	public static function parseLink($cell, $target, $cellbreak) {
		if ($cell != '') {
			// Add http:// if necessary
			$cellHref = $cell;
			if (substr($cell, 0, 7) != 'http://') {
				$cellHref = 'http://' . $cell;
			}
		
			// Spaces at the end, that the cell can be clicked
			$cell = '<a href="' . $cellHref . '" target="' . $target . '">' . eteHelper::breakCell($cell, $cellbreak) . '</a>&nbsp;&nbsp;&nbsp;';
		}

		return $cell;
	}

	public static function parseMail($cell, $cellbreak) {
		if ($cell != '') {
			// Spaces at the end, that the cell can be clicked
			$cell = '<a href="mailto:' . $cell . '">' . eteHelper::breakCell($cell, $cellbreak) . '</a>&nbsp;&nbsp;&nbsp;';
		}

		return $cell;
	}

	public static function parseText($cell, $bbcode, $bbcode_img, $link_target_p, $cellbreak) {
		if ($bbcode) {
			global $link_target;
			require_once JPATH_ROOT.'/components/com_eventtableedit/helpers/bbcode.php';
	
			$link_target = $link_target_p;
			$bbcode = new eteBBCode();
			$bbcode->addbbcode($bbcode_img);
			
			$cell = $bbcode->parsebbcode->parse($cell);
		}
		$cell = eteHelper::breakCell($cell, $cellbreak);

		return $cell;
	}

	private static function breakCell($cell, $cellbreak) {
		if (strlen(strip_tags($cell)) > $cellbreak && $cellbreak != 0) {
			$cellShort = substr(strip_tags($cell), 0, $cellbreak) . '...';
			$cell = JHTML::tooltip($cell, '', '', $cellShort);
		}

		return $cell;
	}
}
