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
	<td id="first_row" class="first_row_<?php echo $this->rowCount; ?> tablesaw-priority-50">
		<?php echo ((int) $this->state->get('list.start') + $this->rowCount + 1); ?>
	</td>
<?php endif; ?>

<?php 

for($colCount = 0; $colCount < count($this->rows[0]) - 1; $colCount++) { 
	$atemptime = '';
	if($this->heads[$colCount]->datatype == 'date'){
		$DT = explode('.',$this->rows[$this->rowCount][$colCount]);
		$ymd=$DT[2].'-'.$DT[1].'-'.$DT[0];
		$atemptime = '<input type="hidden" value="'.strtotime($ymd).'">';
	}else if($this->heads[$colCount]->datatype == 'boolean'){
		$pos = strpos($this->rows[$this->rowCount][$colCount],'cross.png');
		if ($pos !== false) {
			$atemptime = '<input type="hidden" value="0">';
		} else {
			$atemptime = '<input type="hidden" value="1">';
		}
	}else if($this->heads[$colCount]->datatype == 'float'){
			$float_val = str_replace(',','.',$this->rows[$this->rowCount][$colCount]);
			$atemptime = '<input type="hidden" value="'.$float_val.'">';
		
	}

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
		id="etetable-row_<?php echo $this->rowCount . '_' . $colCount; ?>"><?php if($atemptime != ''){  echo $atemptime; } ?><?php echo trim($this->rows[$this->rowCount][$colCount]); ?>
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