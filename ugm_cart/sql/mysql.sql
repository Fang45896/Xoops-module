-- 1
CREATE TABLE `ugm_cart_files_center` (
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

-- 2 類別表
CREATE TABLE `ugm_cart_kind` (
  `sn` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
  `ofsn` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父類別',
  `kind` varchar(255) NOT NULL DEFAULT 'kind_prod' COMMENT '分類',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '標題',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `enable` enum('1','0') NOT NULL DEFAULT '1' COMMENT '狀態',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '網址',
  `target` enum('1','0') NOT NULL DEFAULT '0' COMMENT '外連',
  `col_sn` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'col_sn',
  `content` text COMMENT '內容',
  `ps` varchar(255) NOT NULL DEFAULT '' COMMENT '備註',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB;

-- 3 商品表
CREATE TABLE `ugm_cart_prod` (
  `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'prod_sn',
  `no` varchar(255) NOT NULL DEFAULT '' COMMENT '編號',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
  `summary` text COMMENT '摘要',
  `content` text COMMENT '內容',
  `enable` enum('1','0') NOT NULL DEFAULT '1' COMMENT '狀態',
  `create_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '建立日期',
  `update_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新日期',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `counter` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '人氣',
  `icon` varchar(255) NOT NULL DEFAULT '' COMMENT '圖示',
  `youtube` varchar(255) NOT NULL DEFAULT '' COMMENT 'youtube',
  `uid` mediumint(8) unsigned NOT NULL COMMENT 'uid',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB;

-- 4 類別商品表
CREATE TABLE `ugm_cart_kind2prod` (
  `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'kind2prod_sn',
  `kind_sn` smallint(5) unsigned NOT NULL COMMENT 'kind_sn',
  `prod_sn` int(10) unsigned NOT NULL COMMENT 'prod_sn',
  PRIMARY KEY (`sn`),
  KEY `kind_sn` (`kind_sn`),
  KEY `prod_sn` (`prod_sn`)
) ENGINE=InnoDB;

-- 5 商品規格表
CREATE TABLE `ugm_cart_prod_standard` (
  `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
  `prod_sn` int(10) unsigned NOT NULL COMMENT 'prod_sn',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
  `amount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '數量',
  `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '售價',
  `sprice` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '特價',
  `enable` enum('1','0') NOT NULL DEFAULT '0' COMMENT '上架',
  `unit` varchar(255) NOT NULL DEFAULT '' COMMENT '單位',
  `sprice_start_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '特價開始時間',
  `sprice_end_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '特價結束時間',
  PRIMARY KEY (`sn`),
  KEY `prod_sn` (`prod_sn`)
) ENGINE=InnoDB;

-- 6 訂單主表
CREATE TABLE `ugm_cart_order` (
  `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `tel` varchar(255) NOT NULL DEFAULT '' COMMENT '電話',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '電子信箱',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '送貨地址',
  `ps` text NOT NULL COMMENT '備註',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'uid',
  `create_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '訂單日期',
  `pass` varchar(255) NOT NULL DEFAULT '' COMMENT '密碼',
  `total` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '合計',
  `shipment` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '運費',
  `receipt` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收款',
  `receipt_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收款日期',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB;

-- 訂單明細表
CREATE TABLE `ugm_cart_order_detail` (
  `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
  `order_sn` int(10) unsigned NOT NULL COMMENT 'order_sn',
  `prod_standard_sn` int(10) unsigned NOT NULL COMMENT 'prod_standard_sn',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
  `unit` varchar(255) NOT NULL DEFAULT '' COMMENT '單位',
  `amount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '數量',
  `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '售價',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB;