<?php

	if( !defined('__IN_SYMPHONY__') ) die('<h2>Symphony Error</h2><p>You cannot directly access this file</p>');



	define_safe(IMAGE_UPLOAD_NAME, 'Responsive Image Upload');
	define_safe(IMAGE_UPLOAD_GROUP, 'responsive_image_upload');



	class extension_responsive_image_upload extends Extension
	{

		/*------------------------------------------------------------------------------------------------*/
		/*  Installation  */
		/*------------------------------------------------------------------------------------------------*/

		public function install(){
			return Symphony::Database()->query(
				"CREATE TABLE `tbl_fields_responsive_image_upload` (
				 `id` int(11) unsigned NOT NULL auto_increment,
				 `field_id` int(11) unsigned NOT NULL,
				 `destination` varchar(255) NOT NULL,
				 `validator` varchar(50),
				 `unique`  varchar(50),
				 `min_width` int(11) unsigned,
				 `min_height` int(11) unsigned,
				 `max_width` int(11) unsigned,
				 `max_height` int(11) unsigned,
				 `responsive_sizes` varchar(50),
				 `resize` enum('yes','no') NOT NULL DEFAULT 'yes',
				  PRIMARY KEY (`id`),
				  KEY `field_id` (`field_id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"
			);
		}

		public function uninstall(){
			return Symphony::Database()->query("DROP TABLE `tbl_fields_responsive_image_upload`");
		}

	}
