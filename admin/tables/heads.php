<?php
/**
 * @version		$Id: $
 * @package		eventtableedit
 * @copyright	Copyright (C) 2007 - 2010 Manuel Kaspar
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

class EventtableeditTableHeads extends JTable {
	public function __construct(& $db) {
		parent::__construct('#__eventtableedit_heads', 'id', $db);
	}
}
