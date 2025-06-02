<?php
class ModelExtensionModuleYtchannel extends Model {
	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "yt_channel` (
			`channel_id` VARCHAR(100) NOT NULL,
			`title` VARCHAR(255) NOT NULL,
			`description` TEXT NOT NULL,
			`thumb_default` VARCHAR(255) NOT NULL,
			`thumb_medium` VARCHAR(255) NOT NULL,
			`thumb_high` VARCHAR(255) NOT NULL,
			`views` INT(11) NOT NULL DEFAULT '0',
			`subscribers` INT(11) NOT NULL DEFAULT '0',
			`videos` INT(7) NOT NULL DEFAULT '0',
			PRIMARY KEY (`channel_id`)
		) COLLATE='UTF8_GENERAL_CI'	ENGINE=MyISAM;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "yt_playlist` (
			`playlist_id` VARCHAR(100) NOT NULL,
			`channel_id` INT(11) NOT NULL,
			`title` VARCHAR(255) NOT NULL,
			`description` TEXT NOT NULL,
			`thumb_default` VARCHAR(255) NOT NULL,
			`thumb_medium` VARCHAR(255) NOT NULL,
			`thumb_high` VARCHAR(255) NOT NULL,
			`videos` INT(7) NOT NULL DEFAULT '0',
			PRIMARY KEY (`playlist_id`)
		) COLLATE='UTF8_GENERAL_CI'	ENGINE=MyISAM;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "yt_video` (
			`video_id` VARCHAR(12) NOT NULL,
			`playlist_id` VARCHAR(100) NOT NULL,
			`channel_id` VARCHAR(100) NOT NULL,
			`title` VARCHAR(255) NOT NULL,
			`description` TEXT NOT NULL,
			`thumb_default` VARCHAR(255) NOT NULL,
			`thumb_medium` VARCHAR(255) NOT NULL,
			`thumb_high` VARCHAR(255) NOT NULL,
			`thumb_standard` VARCHAR(255) NOT NULL,
			`thumb_maxres` VARCHAR(255) NOT NULL,
			`views` INT(11) NOT NULL DEFAULT '0',
			`likes` INT(11) NOT NULL DEFAULT '0',
			`favorites` INT(11) NOT NULL DEFAULT '0',
			`comments` INT(11) NOT NULL DEFAULT '0',
			`duration` VARCHAR(20) NOT NULL,
			`date_added` DATETIME,
			PRIMARY KEY (`video_id`)
		) COLLATE='UTF8_GENERAL_CI'	ENGINE=MyISAM;");

	}
}
