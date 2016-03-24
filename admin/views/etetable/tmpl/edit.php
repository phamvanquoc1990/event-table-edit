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
	function checkics(val){
		if(val == 0){
			jQuery('.location').hide();
			// jQuery('#jform_location').removeClass('required');
			// jQuery('#jform_location').removeAttr( "required" );

			// jQuery('#jform_summary').removeClass('required');
			// jQuery('#jform_summary').removeAttr( "required" );




			jQuery('#jform_icsfilename').removeClass('required');
			jQuery('#jform_icsfilename').removeAttr( "required" );

			jQuery('#jform_displayname').removeClass('required');
			jQuery('#jform_displayname').removeAttr( "required" );

			jQuery('#jform_email').removeClass('required');
			jQuery('#jform_email').removeClass( "validate-email" );
			jQuery('#jform_email').removeAttr( "required" );
			


		

			jQuery('#jform_adminemailsubject').removeClass('required');
			jQuery('#jform_adminemailsubject').removeAttr( "required" );

			jQuery('#jform_useremailsubject').removeClass('required');
			jQuery('#jform_useremailsubject').removeAttr( "required" );

			jQuery('#jform_useremailtext').removeClass('required');
			jQuery('#jform_useremailtext').removeAttr( "required" );

			
		}else{
			jQuery('.location').show();
			// jQuery('#jform_location').addClass('required');
			// jQuery('#jform_location').attr( "required","required" );

			// jQuery('#jform_summary').addClass('required');
			// jQuery('#jform_summary').attr( "required","required" );




			jQuery('#jform_icsfilename').addClass('required');
			jQuery('#jform_icsfilename').attr( "required","required" );

			jQuery('#jform_displayname').addClass('required');
			jQuery('#jform_displayname').attr( "required","required" );

			jQuery('#jform_email').addClass('required');
			jQuery('#jform_email').addClass('validate-email');
			jQuery('#jform_email').attr( "required","required" );

		

			jQuery('#jform_adminemailsubject').addClass('required');
			jQuery('#jform_adminemailsubject').attr( "required","required" );

			jQuery('#jform_useremailsubject').addClass('required');
			jQuery('#jform_useremailsubject').attr( "required","required" );

			jQuery('#jform_useremailtext').addClass('required');
			jQuery('#jform_useremailtext').attr( "required","required" );

		}

		
	}
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
<style>
	#jform_useremailtext_ifr,#jform_aftertext_ifr,#jform_pretext_ifr{
		height: 250px !important;
	}
	.editor{
		width: 60%;
		height: auto;
	}
	.editor .pull-right{
		float: left;
		margin-left: 5px;
	}
</style>



<form action="<?php echo JRoute::_('index.php?option=com_eventtableedit&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">


<div class="span10 form-horizontal">
<ul class="nav nav-tabs">
<li class="active"><a href="#general" data-toggle="tab"><?php echo empty($this->item->id) ? JText::_('COM_EVENTTABLEEDIT_NEW_ETETABLE') : JText::sprintf('COM_EVENTTABLEEDIT_EDIT_ETETABLE', $this->item->id); ?></a></li>
<li><a href="#style" data-toggle="tab"><?php echo JText::_('COM_EVENTTABLEEDIT_STYLE');?></a></li>
<li><a href="#meta" data-toggle="tab"><?php echo JText::_('JGLOBAL_FIELDSET_METADATA_OPTIONS');?></a></li>

<li><a href="#rules" data-toggle="tab"><?php echo JText::_('COM_EVENTTABLEEDIT_FIELDSET_RULES');?></a></li>

</ul>
<div class="tab-content">
	<div  class="tab-pane active" id="general">
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
					

						<li><?php echo $this->form->getLabel('normalorappointment'); ?>
					<?php echo $this->form->getInput('normalorappointment'); ?></li>



<li class="location">
							<label title="" class="hasTooltip" for="jform_icsfilename" id="jform_icsfilename-lbl" data-original-title="&lt;strong&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_ICSFILENAME_LABEL'); ?>&lt;/strong&gt;&lt;br /&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_ICSFILENAME_DESC'); ?>">
	<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_ICSFILENAME_LABEL'); ?><span class="star">&nbsp;*</span></label>
							<?php echo JText::_('COM_EVENTTABLEEDIT_USED_VARIABLE_IN_ADMIN_EMAIL_SUBJECT'); ?>
							<br>
						<!--<?php echo $this->form->getLabel('icsfilename'); ?>-->
					<?php echo $this->form->getInput('icsfilename'); ?></li>

					<li class="location"><?php echo $this->form->getLabel('location'); ?>
					<?php echo $this->form->getInput('location'); ?></li>


						<li class="location"><?php echo $this->form->getLabel('summary'); ?>
					<?php echo $this->form->getInput('summary'); ?></li>


<li class="location">
							<label title="" class="hasTooltip" for="jform_displayname" id="jform_displayname-lbl" data-original-title="&lt;strong&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_DISPLAYNAME_LABEL'); ?>&lt;/strong&gt;&lt;br /&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_DISPLAYNAME_DESC'); ?>">
	<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_DISPLAYNAME_LABEL'); ?><span class="star">&nbsp;*</span></label>
						<!--<?php echo $this->form->getLabel('displayname'); ?>-->
					<?php echo $this->form->getInput('displayname'); ?></li>

						<li class="location">
							<label title="" class="hasTooltip" for="jform_email" id="jform_email-lbl" data-original-title="&lt;strong&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_EMAIL_LABEL'); ?>&lt;/strong&gt;&lt;br /&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_EMAIL_DESC'); ?>">
	<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_EMAIL_LABEL'); ?><span class="star">&nbsp;*</span></label>
						<!--<?php echo $this->form->getLabel('email'); ?>-->
					<?php echo $this->form->getInput('email'); ?></li>


						
					<li class="location" >
<label title="" class="hasTooltip" for="jform_adminemailsubject" id="jform_adminemailsubject-lbl" data-original-title="&lt;strong&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_ADMINEMAIL_LABEL'); ?>&lt;/strong&gt;&lt;br /&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_ADMINEMAIL_DESC'); ?>">
	<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_ADMINEMAIL_LABEL'); ?><span class="star">&nbsp;*</span></label>
					<!--<?php echo $this->form->getLabel('adminemailsubject'); ?>-->
						<?php echo JText::_('COM_EVENTTABLEEDIT_USED_VARIABLE_IN_ADMIN_EMAIL_SUBJECT'); ?>
						<br>
					<?php echo $this->form->getInput('adminemailsubject'); ?>

					</li>

					<li class="location" >
						<label title="" class="hasTooltip" for="jform_useremailsubject" id="jform_useremailsubject-lbl" data-original-title="&lt;strong&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_USEREMAIL_SUBJECT_LABEL'); ?>&lt;/strong&gt;&lt;br /&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_USEREMAIL_SUBJECT_DESC'); ?>">
	<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_USEREMAIL_SUBJECT_LABEL'); ?><span class="star">&nbsp;*</span></label>
					<!--<?php echo $this->form->getLabel('useremailsubject'); ?>-->
					<?php echo JText::_('COM_EVENTTABLEEDIT_USED_VARIABLE_IN_USED_EMAIL_SUBJECT'); ?>
						<br>
					<?php echo $this->form->getInput('useremailsubject'); ?></li>

					<li class="location" >	
					<label title="" class="hasTooltip" for="jform_useremailtext" id="jform_useremailtext-lbl" data-original-title="&lt;strong&gt;<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_USEREMAIL_TEXT'); ?>&lt;/strong&gt;">
	<?php echo JText::_('COM_EVENTTABLEEDIT_FIELD_USEREMAIL_TEXT'); ?><span class="star">&nbsp;*</span></label>

					<!--<?php echo $this->form->getLabel('useremailtext'); ?>-->
					<?php echo JText::_('COM_EVENTTABLEEDIT_USED_VARIABLE_IN_USED_EMAIL_SUBJECT'); ?>
						<br>
					<?php echo $this->form->getInput('useremailtext'); ?></li>


						

					<li><?php echo $this->form->getLabel('show_filter'); ?>
					<?php echo $this->form->getInput('show_filter'); ?></li>

					<li><?php echo $this->form->getLabel('addtitle'); ?>
					<?php echo $this->form->getInput('addtitle'); ?></li>
					
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
					
			
				<li>
				<?php echo $this->form->getLabel('pretext'); ?>
					<?php echo $this->form->getInput('pretext'); ?>
				</li>
				<li>
				<?php echo $this->form->getLabel('aftertext'); ?>
				<?php echo $this->form->getInput('aftertext'); ?>
				</li>	</ul>
			</fieldset>
	</div> 
	<div  id="style" class="tab-pane">
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

				
	</div> 

	<div  id="meta" class="tab-pane">
		<?php echo $this->loadTemplate('metadata'); ?>
	</div>
	<div id="rules" class="tab-pane">
		<fieldset class="panelform">
					<?php echo $this->form->getLabel('edit_own_rows'); ?>
					<?php echo $this->form->getInput('edit_own_rows'); ?>
					<div class="clr"></div>
				
					<?php echo $this->form->getLabel('rules'); ?>
					<?php echo $this->form->getInput('rules'); ?>
				</fieldset>

	</div>
</div> 
</div> 

		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<div class="clr"></div>
<?php 
if($this->item->id > 0){
?>
<script type="text/javascript">
	checkics(<?php echo $this->item->normalorappointment ?>);
</script>
<?php 
}else{
?>
<script type="text/javascript">
	checkics(0);
</script>
<?php 

}

	?>