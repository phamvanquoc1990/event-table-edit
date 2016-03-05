<?php
// No direct access to this file
defined('_JEXEC') or die;
jimport('joomla.html.html.list');

class JFormFieldTablenumber extends JFormFieldList {
        protected $type = 'Tablenumber';
        
        protected function getOptions() {
                $db = JFactory::getDBO();
                
                $query = "SELECT id, name " .
                		 "FROM #__eventtableedit_details " .
                		 "WHERE published = 1 " .
                		 "ORDER BY name ASC";
                $db->setQuery($query);
                
                $messages = $db->loadObjectList();
                $options = array();
                
                foreach($messages as $message) {
                        $options[] = JHtml::_('select.option', $message->id, $message->name);
                }
                $options = array_merge(parent::getOptions() , $options);
                return $options;
        }
}

?>
