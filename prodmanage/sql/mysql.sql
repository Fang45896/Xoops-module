-- 1
CREATE TABLE `prodmanage_files_center` (
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
CREATE TABLE `prodmanage_prod` (
  `prod_sn` mediumint(9) unsigned NOT NULL auto_increment COMMENT '產品流水號',
  `store_sn` mediumint(9) unsigned NOT NULL default '0' COMMENT '店家代號',
  `prod_title` varchar(255) NOT NULL default '' COMMENT '商品名稱',
  `prod_price` int(11) unsigned NOT NULL default '0' COMMENT '商品價格',
  `prod_sale_amount` int(11) unsigned NOT NULL default '0' COMMENT '販售累計',
  `prod_sort` int(11) unsigned NOT NULL default '0' COMMENT '商品排序',
  `prod_enable` enum('1','0') NOT NULL default '1' COMMENT '商品狀態',
  `prod_summary` longtext NOT NULL default '' COMMENT '商品摘要',
  `prod_content` longtext NOT NULL default '' COMMENT '商品內容',
  `kind_sn` mediumint(9) unsigned NOT NULL default '0' COMMENT '類別代號',
  `prod_discount` int(11) unsigned NOT NULL default '0' COMMENT '折扣',
  `prod_rebate` int(11) unsigned NOT NULL default '0' COMMENT '折讓',
  `prod_offer_start_date` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '優惠開始日期',
  `prod_offer_end_date` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '優惠結束日期',
  `prod_date` date NOT NULL default '0000-00-00' COMMENT '新增日期',
  PRIMARY KEY  (`prod_sn`),
  KEY (`store_sn`),
  KEY (`kind_sn`)
) ENGINE=MyISAM;

CREATE TABLE `prodmanage_kind` (
  `kind_sn` smallint(5) unsigned NOT NULL auto_increment COMMENT '類別代號',
  `store_sn` mediumint(9) unsigned NOT NULL default '0' COMMENT '店家代號',
  `kind_title` varchar(255) NOT NULL COMMENT '類別名稱',
  `kind_desc` varchar(255) NOT NULL COMMENT '類別說明',
  `kind_sort` smallint(5) unsigned NOT NULL COMMENT '類別排序',
  `kind_ofsn` smallint(5) unsigned NOT NULL COMMENT '父類別',
  `kind_enable` enum('1','0') NOT NULL default '1' COMMENT '類別狀態',
  PRIMARY KEY  (`kind_sn`)
) ENGINE=MyISAM;