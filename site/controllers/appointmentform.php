<?php

/**

 * @version

 * @copyright	Copyright (C) 2007 - 2010 Manuel Kaspar

 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 */



// no direct access

defined('_JEXEC') or die;



jimport('joomla.application.component.controller');



class EventtableeditControllerappointmentform extends JControllerLegacy

{



	function save(){
		$app   = JFactory::getApplication();
		$main  = JFactory::getApplication()->input;
		$post  = $main->getArray($_POST);
		
		
		 $roweditpost = $post['row'];
		$coleditpost = $post['col'];
		$tableeditpost = $post['id'];
		$Itemid = $post['Itemid'];
		$model = $this->getModel ( 'appointmentform' );
		$cols = $model->getHeads();
		$rows = $model->getRows();
		$tableeditpostalldata = $model->getItem($tableeditpost);

		$to_time = strtotime($rows['rows'][0][0]);
		$from_time = strtotime($rows['rows'][1][0]);
		$mintdiffrence =  round(abs($from_time - $to_time) / 60,2);
		
		$findupdatecell = $cols[$coleditpost]->head;
		if(strtolower($rows['rows'][$roweditpost][$coleditpost]) == 'free'){		
			$db = JFactory::GetDBO();
			$rowupdates = $roweditpost +1;
			$Update = "UPDATE  #__eventtableedit_rows_".$tableeditpost." SET ".$findupdatecell."='Reserved' WHERE id='".$rowupdates."'";
			$db->setQuery($Update);
			$db->query();
			$exp_startdate	= explode(' ',$post['dateappointment']);
			$exp_sdate		= explode('-',$exp_startdate[0]);
			$timesremovedsec = explode(':', $exp_startdate[1]);
			$exp_stime		= explode(':',$exp_startdate[1]);
			 $starttimeonly = $exp_stime[0].$exp_stime[1].$exp_stime[2];
		 	$startdate		= date('Ymd',strtotime($post['dateappointment']))."T".$starttimeonly;


			$exp_enddate	= explode(' ',$post['dateappointment']);
			$exp_edate		= explode('-',$exp_enddate[0]);
			$exp_etime		= explode(':',$exp_enddate[1]);
			$mintplus = $exp_stime[1] + $mintdiffrence;
			if($mintplus >= 60){
				$mintsend = $mintplus - 60;
				if($mintsend > 9){
					$mintsendadd = $mintsend;
				}else{
					$mintsendadd = '0'.$mintsend;
				}
				if($exp_stime[0] > 9){
					$hoursends = $exp_stime[0] + 1; 
				}else{
					$hoursends1 = $exp_stime[0] + 1;
					$hoursends = '0'.$hoursends1;
				}
				if($hoursends == 24){
					$endtimeonly = '00'.$mintsendadd.$exp_stime[2];
					 $enddate		= date('Ymd',strtotime($post['dateappointment']) + 3600*24)."T".$endtimeonly;
				
				}else{
					$endtimeonly = $hoursends.$mintsendadd.$exp_stime[2];
					 $enddate		= date('Ymd',strtotime($post['dateappointment']))."T".$endtimeonly;
				
				}
				   
				  
				 
			}else{
				$endtimeonly = $exp_stime[0].$mintplus.$exp_stime[2];
				$enddate		= date('Ymd',strtotime($post['dateappointment']))."T".$endtimeonly;
			}
			
			

			// START CAL // 

				$config = JFactory::getConfig();
				$summary     = $tableeditpostalldata->summary;
				$datestart   = $startdate;
				$dateend     = $enddate;
				
				$address     = $tableeditpostalldata->location;
				$uri         = JURI::root();
				$description = $post['comment'];
				$tableeditpostalldata->icsfilename = str_replace('{first_name}',$post['first_name'] , $tableeditpostalldata->icsfilename);
				$tableeditpostalldata->icsfilename = str_replace('{last_name}',$post['last_name'] , $tableeditpostalldata->icsfilename);

				$filename    = $tableeditpostalldata->icsfilename.'.ics';

$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTEND:'.$dateend.'
UID:'.uniqid().'
DTSTAMP:'.$datestart.'
LOCATION:'.$this->escapeString($address).'
DESCRIPTION:'.$this->escapeString($description).'
URL;VALUE=URI:'.$this->escapeString($uri).'
SUMMARY:'.$this->escapeString($summary).'
DTSTART:'.$datestart.'
END:VEVENT
END:VCALENDAR';

				file_put_contents(JPATH_BASE.'/components/com_eventtableedit/template/ics/'.$filename,$ical);

			// END CAL // 
 
			// START user email // 

				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();
				$sender = array( 
				    $tableeditpostalldata->email,
				    $tableeditpostalldata->displayname 
				);

				//$body = JText::sprintf('COM_EVENTEDITTABLE_APPOINTMENT_USER_BODY',$exp_startdate[0],$exp_startdate[1],	$tableeditpostalldata->email,$tableeditpostalldata->phone);
				//echo JText::_($tableeditpostalldata->useremailsubject);
				//echo '<br>';
				$subject = $tableeditpostalldata->useremailsubject;
				$subject = str_replace('{date}', str_replace('-', '.', $exp_startdate[0]), $subject);
				
				$subject = str_replace('{time}', $timesremovedsec[0].':'.$timesremovedsec[1], $subject);
				


				$body =  $tableeditpostalldata->useremailtext;
				$body = str_replace('{date}', str_replace('-', '.', $exp_startdate[0]), $body);
				$body = str_replace('{time}', $timesremovedsec[0].':'.$timesremovedsec[1], $body);
				
			
				$mailer->setSender($sender);		
				$mailer->addRecipient($post['email']);
				$mailer->setSubject($subject);
				$mailer->isHTML(true);
				$mailer->Encoding = 'base64';
				$mailer->setBody($body);
				// Optional file attached
				$mailer->addAttachment(JPATH_BASE.'/components/com_eventtableedit/template/ics/'.$filename);
				$mailer->Send();
			// End user email //

			// Start admin email //
				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();
				$sender = array( 
				    $config->get( 'mailfrom' ),
				    $tableeditpostalldata->displayname
				);
				//$adminsubject = JText::sprintf('COM_EVENTEDITTABLE_APPOINTMENT_ADMIN_BODY',$post['first_name'],	$post['last_name']);
				$adminsubject = $tableeditpostalldata->adminemailsubject;
				$adminsubject = str_replace('{first_name}', $post['first_name'], $adminsubject);
				$adminsubject = str_replace('{last_name}', $post['last_name'], $adminsubject);
				
				
				$adminbody   = '&nbsp;';
				$mailer->setSender($sender);		
				$mailer->addRecipient($tableeditpostalldata->email);
				$mailer->isHTML(true);
				$mailer->setSubject($adminsubject);
				
				$mailer->Encoding = 'base64';
				$mailer->setBody($adminbody);
				// Optional file attached
				$mailer->addAttachment(JPATH_BASE.'/components/com_eventtableedit/template/ics/'.$filename);
				$mailer->Send();
			

			// End admin email //

			$msg = JText::_('COM_EVENTEDITTABLE_APPOINTMENT_SUCCESSFULLY_BOOKED');

		 }else{

		 	$msg = JText::_('COM_EVENTEDITTABLE_APPOINTMENT_NOT_BOOK');

		 }

		$app->redirect(JRoute::_('index.php?option=com_eventtableedit&view=appointments&id='.$tableeditpost.'&Itemid='.$Itemid,false),$msg);



		

	}
	function escapeString($string) {
  return preg_replace('/([\,;])/','\\\$1', $string);
}

	
}

?>