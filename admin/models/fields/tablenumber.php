<?php
// No direct access to this file
defined('_JEXEC') or die;
jimport('joomla.html.html.list');

class JFormFieldTablenumber extends JFormField {
       
        function getInput() {

                 $db = JFactory::getDBO();
                
                $query = "SELECT id, name " .
                                 "FROM #__eventtableedit_details " .
                                 "WHERE published = 1 AND normalorappointment=0 " .
                                 "ORDER BY name ASC";
                $db->setQuery($query);
                
                $products = $db->loadObjectList();
                $i = 1;
                $list = array();
                $list[0]['value'] = '';
                $list[0]['text'] = 'Select table';
                        
                foreach ($products as $product) {
                        $list[$i]['value'] = $product->id;
                        $list[$i]['text'] = $product->name;
                        $i++;
                }
             

                $key = ($this->element['key_field'] ? $this->element['key_field'] : 'value');
                $val = ($this->element['value_field'] ? $this->element['value_field'] : $this->name);


                return JHtml::_('select.genericlist',  $list, $this->name, 'class="inputbox"   ', 'value', 'text', $this->value, $this->id);
        }
       
}

?>
