<?php
/**
 * $Id: edit.php 140 2011-01-11 08:11:30Z kapsl $
 * @copyright (C) 2007 - 2010 Manuel Kaspar
 * @license GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'etetable.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			Joomla.submitform(task, document.getElementById('adminForm'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_eventtableedit&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('COM_EVENTTABLEEDIT_NEW_ETETABLE') : JText::sprintf('COM_EVENTTABLEEDIT_EDIT_ETETABLE', $this->item->id); ?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('name'); ?>
				<?php echo $this->form->getInput('name'); ?></li>

				<li><?php echo $this->form->getLabel('alias'); ?>
				<?php echo $this->form->getInput('alias'); ?></li>

				<li><?php echo $this->form->getLabel('access'); ?>
				<?php echo $this->form->getInput('access'); ?></li>
				
				<li><?php echo $this->form->getLabel('published'); ?>
				<?php echo $this->form->getInput('published'); ?></li>

				<li><?php echo $this->form->getLabel('language'); ?>
				<?php echo $this->form->getInput('language'); ?></li>
				
				<li><?php echo $this->form->getLabel('show_filter'); ?>
				<?php echo $this->form->getInput('show_filter'); ?></li>
				
				<li><?php echo $this->form->getLabel('show_pagination'); ?>
				<?php echo $this->form->getInput('show_pagination'); ?></li>

				<li><?php echo $this->form->getLabel('show_first_row'); ?>
				<?php echo $this->form->getInput('show_first_row'); ?></li>

				<li><?php echo $this->form->getLabel('show_print_view'); ?>
				<?php echo $this->form->getInput('show_print_view'); ?></li>

				<li><?php echo $this->form->getLabel('bbcode'); ?>
				<?php echo $this->form->getInput('bbcode'); ?></li>

				<li><?php echo $this->form->getLabel('bbcode_img'); ?>
				<?php echo $this->form->getInput('bbcode_img'); ?></li>
				
				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				
			</ul>
			<div class="clr"></div>
			<?php echo $this->form->getLabel('pretext'); ?>
			<div class="clr"></div>
			<?php echo $this->form->getInput('pretext'); ?>
			
			<div class="clr"></div>
			<br />
			<?php echo $this->form->getLabel('aftertext'); ?>
			<div class="clr"></div>
			<?php echo $this->form->getInput('aftertext'); ?>
		</fieldset>
	</div>
<!--<div class="width-60 fltrt">-->
	<div class="">
		<?php echo  JHtml::_('sliders.start', 'eventtableedit-slider'); ?>
			<?php echo JHtml::_('sliders.panel',JText::_('COM_EVENTTABLEEDIT_STYLE'), 'style'); ?>

			<fieldset class="panelform">
				<ul class="adminformlist">
					<li><?php echo $this->form->getLabel('dateformat'); ?>
					<?php echo $this->form->getInput('dateformat'); ?></li>

					<li><?php echo $this->form->getLabel('timeformat'); ?>
					<?php echo $this->form->getInput('timeformat'); ?></li>

					<li><?php echo $this->form->getLabel('float_separator'); ?>
					<?php echo $this->form->getInput('float_separator'); ?></li>

					<li><?php echo $this->form->getLabel('cellspacing'); ?>
					<?php echo $this->form->getInput('cellspacing'); ?></li>

					<li><?php echo $this->form->getLabel('cellpadding'); ?>
					<?php echo $this->form->getInput('cellpadding'); ?></li>

					<li><?php echo $this->form->getLabel('tablecolor1'); ?>
					<?php echo $this->form->getInput('tablecolor1'); ?></li>

					<li><?php echo $this->form->getLabel('tablecolor2'); ?>
					<?php echo $this->form->getInput('tablecolor2'); ?></li>

					<li><?php echo $this->form->getLabel('pagebreak'); ?>
					<?php echo $this->form->getInput('pagebreak'); ?></li>

					<li><?php echo $this->form->getLabel('cellbreak'); ?>
					<?php echo $this->form->getInput('cellbreak'); ?></li>

					<li><?php echo $this->form->getLabel('link_target'); ?>
					<?php echo $this->form->getInput('link_target'); ?></li>
				</ul>
			</fieldset>

			<?php echo $this->loadTemplate('metadata'); ?>
		<?php echo JHtml::_('sliders.end'); ?>
	</div>
	
	<div class="clr"></div>
  <!--  width-100 fltlft-->
	<div  class="">

		<?php echo JHtml::_('sliders.start','permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
	
		<?php echo JHtml::_('sliders.panel',JText::_('COM_EVENTTABLEEDIT_FIELDSET_RULES'), 'access-rules'); ?>	
			<fieldset class="panelform">
				<?php echo $this->form->getLabel('edit_own_rows'); ?>
				<?php echo $this->form->getInput('edit_own_rows'); ?>
				<div class="clr"></div>
			
				<?php echo $this->form->getLabel('rules'); ?>
				<?php echo $this->form->getInput('rules'); ?>
			</fieldset>
			
		<?php echo JHtml::_('sliders.end'); ?>

		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<div class="clr"></div>
