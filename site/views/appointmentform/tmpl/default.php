<?php

/**

 * $Id: default.php 144 2011-01-13 08:17:03Z kapsl $

 * @copyright (C) 2007 - 2009 Manuel Kaspar

 * @license GNU/GPL, see LICENSE.php in the installation package

 * This file is part of Event Table Edit

 *

 * Event Table Edit is free software: you can redistribute it and/or modify

 * it under the terms of the GNU General Public License as published by

 * the Free Software Foundation, either version 3 of the License, or

 * (at your option) any later version.



 * Event Table Edit is distributed in the hope that it will be useful,

 * but WITHOUT ANY WARRANTY; without even the implied warranty of

 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

 * GNU General Public License for more details.



 * You should have received a copy of the GNU General Public License

 * along with Event Table Edit. If not, see <http://www.gnu.org/licenses/>.

 */



// no direct access

defined( '_JEXEC' ) or die;



JHtml::_('behavior.tooltip');

JHtml::_('behavior.formvalidation');

$app = JFactory::getApplication();

$main      = $app->input;
$id        = $main->getInt('id', '');
$postget   = $main->getArray($_POST);

$cols = $this->heads[$postget['col']];
$rows = $this->rows[$postget['row']];
$details = $rows[$postget['col']];



$Itemid   = $main->getInt('Itemid', '');

if($details != 'free'){
	$linkreturn = 'index.php?option=com_eventtableedit&view=appointments&id='.$id.'&Itemid='.$Itemid;
	$msg = JText::_('COM_EVENTTABLEEDIT_YOU_CAN_NOTBOOK_YOUR_APPOINTMENT');
	
	$app->enqueueMessage($msg, 'error');
	$app->redirect(JRoute::_($linkreturn,false));
}



?>

<p>
<?php echo JText::sprintf('COM_EVENTTABLEEDIT_BOOK_BEGIN',$cols->name,$rows['0']);
								 ?>
</p>
<p>
<?php echo JText::_('COM_EVENTTABLEEDIT_BUTTON_GO_BACKTEXT'); ?>
</p>
<input type="button" class="btn" value="<?php echo JText::_('COM_EVENTTABLEEDIT_GO_BACK'); ?>" name="goback" onclick="goback();">

<script>
	function goback(){
		window.location = "<?php echo JRoute::_('index.php?option=com_eventtableedit&view=appointments&id='.$id.'&Itemid='.$Itemid,false) ?>";
	}
</script>
<div class="appointmentforms">



	<h2>

		<?php echo JText::_('COM_EVENTTABLEEDIT_RESERVATION'); ?>

	</h2>



<form action="<?php echo JRoute::_('index.php?option=com_eventtableedit'); ?>" name="adminForm" id="adminForm" method="post" class="form-validate">

	<?php // echo '<pre>';print_r($this->item);


	//If there is already a table set up

	?>

	<div class="control-group">

  <label class="control-label"><?php echo JText::_('COM_EVENTTABLEEDIT_FIRSTNAME'); ?>*</label>

      <div class="controls"><input type="text" value="" name="first_name" class="required"></div>

</div>

<div class="control-group">

  <label class="control-label"><?php echo JText::_('COM_EVENTTABLEEDIT_LASTNAME'); ?>*</label>

      <div class="controls"><input type="text" value="" name="last_name" class="required"></div>

</div>

<div class="control-group">

  <label class="control-label"><?php echo JText::_('COM_EVENTTABLEEDIT_EMAIL'); ?>*</label>

      <div class="controls"><input type="text" value="" name="email" class="required validate-email"></div>

</div>

<div class="control-group">

  <label class="control-label"><?php echo JText::_('COM_EVENTTABLEEDIT_PHONE'); ?></label>

      <div class="controls"><input type="text" value="" name="phone"></div>

</div>

<div class="control-group">

  <label class="control-label"><?php echo JText::_('COM_EVENTTABLEEDIT_COMMENT'); ?></label>

      <div class="controls"><textarea name="comment" id="comment" cols="10" rows="5"></textarea></div>

</div>





	<input type="hidden" name="filter_order" value="<?php echo $this->state->get('list.ordering') ?>" />

	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->get('list.direction') ?>" />

	<input type="hidden" name="filterstring" value="<?php echo $this->params->get('filterstring') ?>" />

	<input type="hidden" name="option" value="com_eventtableedit" />

	<input type="hidden" name="view" value="appointmentform" />

	<input type="submit" name="submit" class="btn" value="<?php echo JText::_('COM_EVENTTABLEEDIT_FINAL_RESERVATION'); ?>">

	<input type="hidden" name="task" value="appointmentform.save" />

	<input type="hidden" name="id" value="<?php echo $this->item->id; ?>" />

	<input type="hidden" name="row" value="<?php echo $postget['row']; ?>" />

	<input type="hidden" name="col" value="<?php echo $postget['col']; ?>" />

	<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />

	<input type="hidden" name="dateappointment" value="<?php echo str_replace('.', '-', $cols->name).' '.$rows['0'].':00'; ; ?>" />

	

	<?php echo JHtml::_('form.token'); ?>

</form>



<p>* <?php echo JText::_('COM_EVENTTABLEEDIT_STAR'); ?></p>



</div>

<div style="clear:both"></div>