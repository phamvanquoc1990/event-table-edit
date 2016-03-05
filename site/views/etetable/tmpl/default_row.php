<?php
/**
 * @version		$Id: $
 * @package		eventtableedit
 * @copyright	Copyright (C) 2007 - 2010 Manuel Kaspar
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

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
		id="etetable-row_<?php echo $this->rowCount . '_' . $colCount; ?>"><?php echo trim($this->rows[$this->rowCount][$colCount]); ?><?php
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