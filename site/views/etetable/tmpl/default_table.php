<?php
/**
 * @version		$Id: $
 * @package		eventtableedit
 * @copyright	Copyright (C) 2007 - 2010 Manuel Kaspar
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<?php

 ?>
 <style type="text/css">
 .active.btn-success {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    color: #000;
}

.tablesaw-sortable th.tablesaw-sortable-head button {
    font-weight: bold;
    padding-bottom: 0.7em !important;
    padding-left: 3px !important;
    padding-right: 3px !important;
    padding-top: 0.9em !important;
    text-align: center;
}

/* Customized Demo CSS for our Demo Tables */
.tablesaw-columntoggle td.title a,
.tablesaw-swipe td.title a {
	display: inline;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	width: 10em;
}
.tablesaw-swipe td a,.tablesaw-columntoggle td a {
		display: inline;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		max-width: 10em;
		max-width: 10em;
	}

.tablesaw-stack td a{
		display: inline;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		max-width: 10em;
		max-width: 10em;

}


.tablesaw-stack td{padding:0.3em 0.5em !important;}

td.tablesaw-priority-50 a {
    color: #888;
    text-decoration: none;
}
@media (min-width: 40em) {
	td.title {
		max-width: 12em;
	}
	.tablesaw-stack td a {
		display: inline;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		max-width: 10em;
		max-width: 10em;
	}
}
 </style>
<?php
$sorting_enable = 'data-tablesaw-minimap ';
$switcher_enable = 'columntoggle';
if($this->item->sorting == 1){
	$sorting_enable .= 'data-tablesaw-sortable data-tablesaw-sortable-switch ';
}
if($this->item->switcher == 1){
	//$switcher_enable = 'columntoggle';
	$sorting_enable .= 'data-tablesaw-mode-switch';
}
?>
<table class="tablesaw" id="etetable-table" data-tablesaw-mode="<?php echo $switcher_enable; ?>"  <?php echo $sorting_enable; ?>>
	<thead class="etetable-thead">
		<tr>
			<?php echo $this->loadTemplate('thead'); ?>
		</tr>
	</thead>

	<?php 

	if(!$this->print) : ?>
	<!--<tfoot>
		<tr>
			<td colspan="100%">
				<div id="container">
					<?php echo $this->pagination->getListFooter() ?>
				</div>
			</td>
		</tr>
	</tfoot>-->
	<?php endif; ?>	

	<tbody>
	<?php
	/**
	 * The table body
	 */
	if ($this->rows) {
		for($this->rowCount = 0; $this->rowCount < count($this->rows); $this->rowCount++) { ?>
			<tr>
				<?php echo $this->loadTemplate('row'); ?> 
			</tr>
			
			<?php
		}
	} ?>
	</tbody>
</table>


<script type="text/javascript">
	
jQuery( document ).ready(function() {
   
   jQuery( ".etetable-saveicon" ).live( "click", function() {
    	document.adminForm.task.value = 'etetable.saveOrder';
		document.adminForm.submit();
});
});


</script>