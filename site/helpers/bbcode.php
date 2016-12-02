<?php
/**
 * @version		$Id: $
 * @package		eventtableedit
 * @copyright	Copyright (C) 2007 - 2010 Manuel Kaspar
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Component Helper
jimport('joomla.application.component.helper');

class eteBBCode {
	public $parsebbcode;
	
	public function addbbcode($bbimg) {
		require_once JPATH_ROOT.'/components/com_eventtableedit/helpers/bb_code/stringparser_bbcode.class.php';
		
		$this->parsebbcode = new StringParser_bbcode();
		
		$this->parsebbcode->addCode ('br', 'simple_replace', null, array('start_tag' => '<br>', 'end_tag' => ''),
						'inline', array ('block', 'inline'), array ());
		$this->parsebbcode->addCode ('b', 'simple_replace', null, array ('start_tag' => '<b>', 'end_tag' => '</b>'),
	                  'inline', array ('block', 'inline'), array ());
		$this->parsebbcode->addCode ('i', 'simple_replace', null, array ('start_tag' => '<i>', 'end_tag' => '</i>'),
	                  'inline', array ('listitem', 'block', 'inline', 'link'), array ());
		$this->parsebbcode->addCode ('u', 'simple_replace', null, array ('start_tag' => '<u>', 'end_tag' => '</u>'),
                	'inline', array ('listitem', 'block', 'inline', 'link'), array ());
		$this->parsebbcode->addCode ('center', 'simple_replace', null, array ('start_tag' => '<center>', 'end_tag' => '</center>'),
                	'inline', array ('listitem', 'block', 'inline', 'link'), array ());
		$this->parsebbcode->addCode ('url', 'usecontent?', 'do_bbcode_url', array ('usecontent_param' => 'default'),
					  'link', array ('listitem', 'block', 'inline'), array ('link'));
		$this->parsebbcode->addCode ('color', 'usecontent?', 'do_bbcode_color', array ('usecontent_param' => 'default'), 
			'link', array ('block', 'inline'), array ('link'));  
		$this->parsebbcode->addCode ('link', 'callback_replace_single', 'do_bbcode_url', array (),
					  'link', array ('listitem', 'block', 'inline'), array ('link'));	
		$this->parsebbcode->addCode ('list', 'simple_replace', null, array ('start_tag' => '<ul>', 'end_tag' => '</ul>'),
	                  'list', array ('block', 'listitem'), array ());
		$this->parsebbcode->addCode ('*', 'simple_replace', null, array ('start_tag' => '<li>', 'end_tag' => '</li>'),
	                  'listitem', array ('list'), array ());
		$this->parsebbcode->setCodeFlag ('*', 'closetag', 'bbcode_CLOSETAG_OPTIONAL');
		$this->parsebbcode->setCodeFlag ('*', 'paragraphs', false);
		$this->parsebbcode->setCodeFlag ('list', 'paragraph_type', 'bbcode_PARAGRAPH_BLOCK_ELEMENT');
		$this->parsebbcode->setCodeFlag ('list', 'opentag.before.newline', 'bbcode_NEWLINE_DROP');
		$this->parsebbcode->setCodeFlag ('list', 'closetag.before.newline', 'bbcode_NEWLINE_DROP');
			
		//Optional img
		if ($bbimg) {
			$this->parsebbcode->addCode ('img', 'usecontent', 'do_bbcode_img', array (), 'image', array ('listitem', 'block', 'inline', 'link'), array ());
			$this->parsebbcode->setOccurrenceType ('img', 'image');
		}
	}
}

function do_bbcode_url ($action, $attributes, $content, $params, $node_object) {
    global $link_target;

    if (!isset ($attributes['default'])) {
		$url = $content;
		$text = htmlspecialchars ($content);
	} else {
		$url = $attributes['default'];
		$text = $content;
	}
	if ($action == 'validate') {
		if (substr ($url, 0, 5) == 'data:' || substr ($url, 0, 5) == 'file:'
		|| substr ($url, 0, 11) == 'javascript:' || substr ($url, 0, 4) == 'jar:') {
			return false;
		}
		return true;
	}
	return '<a href="'.htmlspecialchars ($url).'" target="' . $link_target . '">'.$text.'</a>';
}

function do_bbcode_img ($action, $attributes, $content, $params, $node_object) {
	if ($action == 'validate') {
		if (substr ($content, 0, 5) == 'data:' || substr ($content, 0, 5) == 'file:'
		|| substr ($content, 0, 11) == 'javascript:' || substr ($content, 0, 4) == 'jar:') {
			return false;
		}
		return true;
	}
	return '<img src="'.htmlspecialchars($content).'" alt="bbcodeimg">';
}

function do_bbcode_color ($action, $attributes, $content, $params, $node_object) {
	if (!isset ($attributes['default'])) {
		return $content;
	}
	if ($action == 'validate') {
	    return true;
	}

	return '<span style="color:' . $attributes['default'] . ';">' . $content . '</span>';
}
