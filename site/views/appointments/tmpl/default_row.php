<?php

/**

 * @version		$Id: $

 * @package		eventtableedit

 * @copyright	Copyright (C) 2007 - 2010 Manuel Kaspar

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

for($colCount = 0; $colCount < count($this->rows[0]) - 1; $colCount++) { 

	if($colCount == 0){

		$mydyanmiclass = 'title';

	}else{

		$colCount1 = $colCount + 1;

		$mydyanmiclass = 'tablesaw-priority-'.$colCount;	

	}



	/**

	 * The cell content

	 */ ?>

	<td class="etetable-row_<?php echo $this->rowCount . '_' . $colCount.' '.$mydyanmiclass ; ?>" 

		id="etetable-row_<?php echo $this->rowCount . '_' . $colCount; ?>">

		<?php if($colCount != 0 && strtolower(trim($this->rows[$this->rowCount][$colCount])) != 'reserved'){ 

			$links = 'index.php?option=com_eventtableedit&view=appointmentform&id='.$id.'&row='.$this->rowCount.'&col='.$colCount.'&Itemid='.$Itemid;

			?>

				<a href="<?php echo JRoute::_($links,false); ?>">

					<span class="buleclass"><?php $bulefree = trim($this->rows[$this->rowCount][$colCount]);  
							echo JText::_(strtoupper($bulefree));
					?></span>

				</a>

		<?php }else if($colCount != 0){ ?>

				 	<span class="redclass"><?php $redreserved = trim($this->rows[$this->rowCount][$colCount]); 
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