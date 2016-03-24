<?php
/**
 * @version		$Id: $
 * @package		eventtableedit
 * @copyright	Copyright (C) 2007 - 2011 Manuel Kaspar
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.controller');

class EventtableeditControllerCsvexport extends JControllerLegacy {
	protected $text_prefix = 'COM_EVENTTABLEEDIT_CSVEXPORT';
	protected $app;
	
	protected $id;
	protected $separator;
	protected $doubleqt;
	protected $model;
	
	function __construct() {
		parent::__construct();
		$this->app = JFactory::getApplication();
	}
	
	/**
	 * Task that is called when exporting a table
	 */
	public function export() {
		// ACL Check
		$user = JFactory::getUser();
		if (!$user->authorise('core.csv', 'com_eventtableedit')) {
			JError::raiseWarning(403, JText::_('JERROR_ALERTNOAUTHOR'));
			$this->setRedirect(JRoute('index.php?option=com_eventtableedit'));
			return false;
		}
		
		// Initialize Variables
		$this->model =& $this->getModel('csvexport');

		$input  =  JFactory::getApplication()->input;
		$postget = $input->getArray($_POST);
		
		$this->id 		 = $postget['tableList'];
		$this->separator = $postget['separator'];
		$this->doubleqt  = $postget['doubleqt'];

		$input->set('com_eventtableedit.layout','summary');
		$input->set('view','csvexport');

		
		$this->model->setVariables($this->id, $this->separator, $this->doubleqt);
		$this->model->export(); 
		
		parent::display();
	}

	public function cancel() {
		$this->setRedirect(JRoute::_('index.php?option=com_eventtableedit'));
		return false;
	}
}
