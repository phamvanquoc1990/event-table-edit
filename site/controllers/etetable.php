<?php
/**
 * @version
 * @copyright	Copyright (C) 2007 - 2017 Manuel Kaspar and Matthias Gruhn
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class EventtableeditControllerEtetable extends JControllerLegacy
{
	/**
	 * Get cellcontent
	 */
	function ajaxGetCell() {

		$main  = JFactory::getApplication()->input;
		$rowId = 	$main->getInt('rowId', '-1');
		if (!$this->aclCheck('edit') && !$this->checkAclOwnRow($rowId)) {
			return false;
		}
		$postget = $main->getArray($_POST);
		
		$cell    = $postget['cell'];
		
		//Get Model and perform action
		$model = $this->getModel('etetable');
		$ret = $model->getCell($rowId, $cell);
		
		echo $ret;
		exit;
	}
	
	/**
	 * Saves a cellcontent
	 */
	function ajaxSaveCell() {
		$main  = JFactory::getApplication()->input;
		$rowId = 	$main->getInt('rowId', '-1');
		if (!$this->aclCheck('edit') && !$this->checkAclOwnRow($rowId)) {
			return false;
		}
		$postget = $main->getArray($_POST);
		$cell    = $postget['cell'];
		$content = $postget['content'];
		$db = JFactory::getDBO();
		// START if appointment text changed from appointment view then below code is efected //
		$gettable_settings = "SELECT * FROM #__eventtableedit_details WHERE id='".$postget['id']."'";
		$db->setQuery($gettable_settings);
		$current_table_settings = $db->loadobject();
		//Get Model and perform action
		$model = $this->getModel('etetable');
		$ret = $model->saveCell($rowId, $cell, $content);
		if($current_table_settings->normalorappointment == 1){
			if($ret == 'free'){
				$ret =  '<span class="buleclass">'.JText::_(strtoupper($ret)).'</span>'; // free appointment
			}else if($ret == 'reserved'){
				$ret =  '<span class="redclass">'.JText::_(strtoupper($ret)).'</span>'; // reserved appointment
			}else{
				$ret = $ret;
			}	
		}else{
			$ret = $ret;
		}
		// END if appointment text changed from appointment view then below code is efected //
		echo $ret;
		exit;
	}
	
	/**
	 * Create a new row through an ajax request
	 */
	function ajaxNewRow() {
		if (!$this->aclCheck('add')) {
			return false;
		}
		
		//Get Model and perform action
		$model = $this->getModel('etetable');
		$ret = $model->newRow();
		
		echo $ret;
		exit;
	}
	
	/**
	 * Delete a row through an ajax request
	 */
	function ajaxDeleteRow() {
		$main  = JFactory::getApplication()->input;
		$rowId = 	$main->getInt('rowId', '-1');

		if (!$this->aclCheck('delete') && !$this->checkAclOwnRow($rowId)) {
			return false;
		}
		
		
		//Get Model and perform action
		$model =& $this->getModel('etetable');
		$model->deleteRow($rowId);
		
		exit;
	}
	
	function saveOrder() {
		if (!$this->aclCheck('reorder')) {
			return false;
		}
		$main    = JFactory::getApplication()->input;
		$postget = $main->getArray($_POST);
		$rowIds  = $postget['rowId'];
		$order   = $postget['order'];
		$Itemid  = $postget['Itemid'];
		$id      = $postget['id'];
		
		$model = $this->getModel('etetable');
		$model->saveOrder($rowIds, $order);

		$this->setRedirect(JRoute::_('index.php?option=com_eventtableedit&view=etetable&id='.$id.'&Itemid='.$Itemid,false), 
						   JText::_('COM_EVENTTABLEEDIT_SUCCESSFUL_REORDER'));
	}
	
	private function aclCheck($object) {
		$user = JFactory::getUser();

		$main  = JFactory::getApplication()->input;
		$id = 	$main->getInt('id', '-1');
		$asset	= 'com_eventtableedit.etetable.'.$id;
		
		if (!$user->authorise('core.' . $object, $asset)) {
			return false;
		}
		return true;
	}
	
	/**
	 * Check if a user created a row himself and
	 * has the right to edit it
	 */
	private function checkAclOwnRow($rowId) {
		$user   = JFactory::getUser();
		$uid = $user->get('id');
		
		$model =& $this->getModel('etetable');
		return $model->checkAclOwnRow($rowId, $uid);
	}
}
?>