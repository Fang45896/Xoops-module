-- 1
CREATE TABLE `tncu_cart_files_center` (
  `files_sn` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '檔案流水號',
  `col_name` varchar(255) NOT NULL default '' COMMENT '欄位名稱',
  `col_sn` smallint(5) unsigned NOT NULL default 0 COMMENT '欄位編號',
  `sort` smallint(5) unsigned NOT NULL default 0 COMMENT '排序',
  `kind` enum('img','file') NOT NULL default 'img' COMMENT '檔案種類',
  `file_name` varchar(255) NOT NULL default '' COMMENT '檔案名稱',
  `file_type` varchar(255) NOT NULL default '' COMMENT '檔案類型',
  `file_size` int(10) unsigned NOT NULL default 0 COMMENT '檔案大小',
  `description` text  COMMENT '檔案說明',
  `counter` mediumint(8) unsigned NOT NULL default 0 COMMENT '下載人次',
  `original_filename` varchar(255) NOT NULL default '' COMMENT '檔案名稱',
  `hash_filename` varchar(255) NOT NULL default '' COMMENT '加密檔案名稱',
  `sub_dir` varchar(255) NOT NULL default '' COMMENT '檔案子路徑',
  PRIMARY KEY (`files_sn`)
) ENGINE=InnoDB;

-- 2
CREATE TABLE `tncu_cart_kind` (
  `sn` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
  `ofsn` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父類別',
  `kind` varchar(255) NOT NULL DEFAULT 'prod' COMMENT '分類',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '標題',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `enable` enum('1','0') NOT NULL DEFAULT '1' COMMENT '狀態',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '網址',
  `target` enum('1','0') NOT NULL DEFAULT '0' COMMENT '外連',
  `col_sn` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'col_sn',
  `content` text COMMENT '內容',
  `ps` varchar(255) DEFAULT NULL COMMENT '備註',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB;