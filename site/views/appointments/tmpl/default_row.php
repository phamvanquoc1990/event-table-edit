<?php

/**

 * @version		$Id: $

 * @package		eventtableedit

 * @copyright	Copyright (C) 2007 - 2016 Manuel Kaspar and Matthias Gruhn

 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 */



// no direct access

defined('_JEXEC') or die;

$main   = JFactory::getApplication()->input;
$id 	= $main->getInt('id');
$Itemid = $main->getInt('Itemid');



/**

 * Optional first row

 */

if ($this->item->show_first_row) :?>

	<td id="first_row" class="first_row_<?php echo $this->rowCount; ?>">

		<?php echo ((int) $this->state->get('list.start') + $this->rowCount + 1); ?>

	</td>

<?php endif; ?>



<?php
$hoursitem = $this->item->hours;
/*

$bookdats     = date('Y-m-d H:i:s',strtotime($post['dateappointment']));

$effectiveDate = strtotime("-$hoursitem hours", strtotime($bookdats));
$currenttimestemp = strtotime('now');

if($currenttimestemp > $effectiveDate){
	//$mssg = JText::sprintf('COM_EVENTEDITTABLE_APPOINTMENT_DO_NOT_BOOK_THIS_TIME', $hoursitem);
	//$app->redirect(JRoute::_('index.php?option=com_eventtableedit&view=appointments&id='.$tableeditpost.'&Itemid='.$Itemid,false),$mssg);
}
*/
for($colCount = 0; $colCount < count($this->rows[0]) - 1; $colCount++) { 

if($colCount == 0){
	$mydyanmiclass = 'title';
}else{
	$colCount1 = $colCount + 1;
	$mydyanmiclass = 'tablesaw-priority-'.$colCount;	
}

$bookdats         = str_replace('.','-',$this->heads[$colCount]->name).' '.$this->rows[$this->rowCount][0].':00';
$currenttimestemp = strtotime('now');
$effectiveDate    = strtotime("-$hoursitem hours", strtotime($bookdats));


	if($colCount != 0 && strtolower(trim($this->rows[$this->rowCount][$colCount])) != 'reserved'){
		$temptd= 'tdblue';
	}else{
		$temptd= 'tdred';
	}
	if($currenttimestemp > $effectiveDate){
		$temptd= 'tdred';
	}


	/**

	 * The cell content

	 */ ?>

	<td class="etetable-row_<?php echo $this->rowCount . '_' . $colCount.' '.$mydyanmiclass.' '.$temptd ; ?>" 

		id="etetable-row_<?php echo $this->rowCount . '_' . $colCount; ?>">

		<?php 

		//$effectiveDate = strtotime("-$hoursitem hours", strtotime($bookdats));


		if($colCount != 0 && strtolower(trim($this->rows[$this->rowCount][$colCount])) != 'reserved'){ 


				//echo date('Y-m-d H:i:s',$currenttimestemp);
			//	echo '<br>';
			// $this->heads[$colCount]->name date
			// $this->rows[$this->rowCount][0] time
			//echo $this->heads[$colCount]->name.' '.$this->rows[$this->rowCount][0].':00';
		//echo $bookdats1    = date('Y-m-d H:i:s',strtotime($bookdats));
			//echo '<br>';

			if($currenttimestemp > $effectiveDate){  // sprintf  $hoursitem ?>
					<span class="orangeclass"><?php echo JText::_('COM_EVENTEDITTABLE_BLOCK_APPINTMENT'); ?></span>
			<?php }else{ ?>
				<span class="buleclass"><?php $bulefree 	 = trim($this->rows[$this->rowCount][$colCount]);  
							echo JText::_(strtoupper($bulefree));
					?></span>
			<?php }

			?>

					
					
		<?php }else if($colCount != 0){ ?>

				 	<span class="redclass"><?php  $redreserved = trim($this->rows[$this->rowCount][$colCount]);
				 		echo JText::_(strtoupper($redreserved));
				 	?></span> 

		<?php }else{

				echo trim($this->rows[$this->rowCount][$colCount]); 

			} ?>

		<?php

		// Add the hidden field in the last row

		if ($colCount == count($this->rows[0]) - 2) :?>

			<input type="hidden" 

				   id="rowId_<?php echo $this->rowCount; ?>" 

				   name="rowId[]"

				   value="<?php echo $this->rows[$this->rowCount]['id']; ?>" />

		<?php endif; ?>

	</td>

<?php 

}

?>