DROP TABLE IF EXISTS `#__eventtableedit_details`;
CREATE TABLE `#__eventtableedit_details` (
	`id` int(11) NOT NULL auto_increment,
	`name` varchar(255) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`user_id` int(11) NOT NULL DEFAULT 0,
	`access` tinyint(3) NOT NULL DEFAULT 1,
	`checked_out` int(10) NOT NULL DEFAULT 0,
	`checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`language` char(7) NOT NULL DEFAULT '*',
	`show_filter` tinyint(1) NOT NULL DEFAULT 1,
	`show_first_row` tinyint(1) NOT NULL DEFAULT 0,
	`show_print_view` tinyint(1) NOT NULL DEFAULT 1,
	`show_pagination` tinyint(1) NOT NULL DEFAULT 1,
	`bbcode` tinyint(1) NOT NULL DEFAULT 1,
	`bbcode_img` tinyint(1) NOT NULL DEFAULT 0,
	`pretext` mediumtext NOT NULL DEFAULT '',
	`aftertext` mediumtext NOT NULL DEFAULT '',
	`metakey` text NOT NULL DEFAULT '',
	`metadesc` text NOT NULL DEFAULT '',
	`metadata` text NOT NULL DEFAULT '',
	`edit_own_rows` tinyint(1) NOT NULL DEFAULT 0,
	`dateformat` varchar(25) NOT NULL DEFAULT '%d.%m.%Y',
	`timeformat` varchar(25) NOT NULL DEFAULT '%H:%M',
	`cellspacing` tinyint(3) NOT NULL DEFAULT 0,
	`cellpadding` tinyint(3) NOT NULL DEFAULT 2,
	`tablecolor1` varchar(15) NOT NULL DEFAULT 'CCCCCC',
	`tablecolor2` varchar(15) NOT NULL DEFAULT 'FFFFFF',
	`float_separator` char(1) NOT NULL DEFAULT ',',
	`link_target` varchar(15) NOT NULL DEFAULT '_blank',
	`cellbreak` int(11) NOT NULL DEFAULT 0,
	`pagebreak` int(11) NOT NULL DEFAULT 25,
	`asset_id` int(10) NOT NULL DEFAULT 0,
	`lft` int(11) NOT NULL DEFAULT 0,
	`rgt` int(11) NOT NULL DEFAULT 0,
	`published` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__eventtableedit_heads`;
CREATE TABLE `#__eventtableedit_heads` (
	`id` int(11) NOT NULL auto_increment,
	`table_id` int(11) NOT NULL,
	`name` varchar(255) NOT NULL,
	`datatype` varchar(25) NOT NULL,
	`ordering` int(11) NOT NULL,
	`defaultSorting` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__eventtableedit_dropdowns`;
CREATE TABLE `#__eventtableedit_dropdowns` (
	`id` int(11) NOT NULL auto_increment,
	`name` varchar(255) NOT NULL,
	`published` tinyint(1) NOT NULL DEFAULT 1,
	`checked_out` int(10) NOT NULL,
	`checked_out_time` datetime NOT NULL,
	`ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__eventtableedit_dropdown`;
CREATE TABLE `#__eventtableedit_dropdown` (
	`id` int(11) NOT NULL auto_increment,
	`dropdown_id` int(11) NOT NULL,
	`name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
