<?php
include_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/InstallFunction.php";
function xoops_module_install_ugm_cart(&$module) {
  #安裝
  go_install();
  #更新
  go_update();
  return true;
}

//安裝
function go_install() {
	global $xoopsDB;
	#建立資料夾	
  mk_dir(XOOPS_ROOT_PATH . "/uploads/ugm_cart");
	return true;
}

 //更新
function go_update() {
  global $xoopsDB;
  
  //資料表   
  #---- 增加資料表 ugm_cart_kind
  $tbl = "ugm_cart_kind";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
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
    ";
    $xoopsDB->queryF($sql);
  } 
    
  #---- 增加資料表 ugm_cart_prod
  $tbl = "ugm_cart_prod";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
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
    ";
    $xoopsDB->queryF($sql);
  }  

  #---- 增加資料表 ugm_cart_kind2prod
  /*
  1. 當「ugm_cart_kind」或「ugm_cart_prod」表刪除時，會自動刪本關聯表記錄
  2. 在「xoops_version」中 $modversion['tables'] 必須排在前面，先移除本表，才能移除「ugm_cart_kind」與「ugm_cart_prod」
  */
  $tbl = "ugm_cart_kind2prod";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
        `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'kind2prod_sn',
        `kind_sn` smallint(5) unsigned NOT NULL COMMENT 'kind_sn',
        `prod_sn` int(10) unsigned NOT NULL COMMENT 'prod_sn',
        PRIMARY KEY (`sn`),
        KEY `kind_sn` (`kind_sn`),
        KEY `prod_sn` (`prod_sn`),        
        FOREIGN KEY (`kind_sn`) REFERENCES `" . $xoopsDB->prefix("ugm_cart_kind") . "` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`prod_sn`) REFERENCES `" . $xoopsDB->prefix("ugm_cart_prod") . "` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE
      ) ENGINE=InnoDB;
    ";
    $xoopsDB->queryF($sql);    
  } 

  #---- 增加資料表 ugm_cart_prod_standard
  /*
  1. 當「ugm_cart_prod」表刪除時，會自動刪本關聯表記錄
  2. 在「xoops_version」中 $modversion['tables'] 必須排在前面，先移除本表，才能移除「ugm_cart_prod」
  */
  $tbl = "ugm_cart_prod_standard";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
        `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
        `prod_sn` int(10) unsigned NOT NULL COMMENT 'prod_sn',
        `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
        `amount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '數量',
        `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '售價',
        `sprice` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '特價',
        `sprice_start_date` int(10) unsigned NOT NULL comment '特價開始日期',
        `sprice_end_date` int(10) unsigned NOT NULL comment '特價結束日期',
        `enable` enum('1','0') NOT NULL DEFAULT '0' COMMENT '上架',
        `unit` varchar(255) NOT NULL DEFAULT '' COMMENT '單位',
        PRIMARY KEY (`sn`),
        KEY `prod_sn` (`prod_sn`),
        FOREIGN KEY (`prod_sn`) REFERENCES `" . $xoopsDB->prefix("ugm_cart_prod") . "` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE
      ) ENGINE=InnoDB;
    ";
    $xoopsDB->queryF($sql);    
  } 
    
  #---- 增加資料表 ugm_cart_order
  $tbl = "ugm_cart_order";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
        `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
        `name` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
        `tel` varchar(255) NOT NULL DEFAULT '' COMMENT '電話',
        `email` varchar(255) NOT NULL DEFAULT '' COMMENT '電子信箱',
        `address` varchar(255) NOT NULL DEFAULT '' COMMENT '送貨地址',
        `ps` text NOT NULL DEFAULT '' COMMENT '備註',
        `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'uid',
        `create_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '訂單日期',
        `pass` varchar(255) NOT NULL DEFAULT '' COMMENT '密碼',
        `total` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '合計',
        `shipment` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '運費',
        `receipt` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收款',
        `receipt_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收款日期',
        PRIMARY KEY (`sn`)
      ) ENGINE=InnoDB;
    ";
    $xoopsDB->queryF($sql);
  } 

  #---- 增加資料表 ugm_cart_order_detail
  /*
  1. 當「ugm_cart_order」表刪除時，會自動刪本關聯表記錄
  2. 在「xoops_version」中 $modversion['tables'] 必須排在前面，先移除本表，才能移除「ugm_cart_order」
  3. 當本表有存在記錄時，會禁止父資料表的刪除或修改動作(ugm_cart_prod_standard)
     ugm_cart_prod_standard 與 ugm_cart_prod皆不能刪除
  */
  $tbl = "ugm_cart_order_detail";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
        `sn` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sn',
        `order_sn` int(10) unsigned NOT NULL COMMENT 'order_sn',
        `prod_standard_sn` int(10) unsigned NOT NULL COMMENT 'prod_standard_sn',
        `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名稱',
        `unit` varchar(255) NOT NULL DEFAULT '' COMMENT '單位',
        `amount` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '數量',
        `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '售價',
        `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
        PRIMARY KEY (`sn`),
        KEY `order_sn` (`order_sn`),
        KEY `prod_standard_sn` (`prod_standard_sn`),
        FOREIGN KEY (`order_sn`) REFERENCES `" . $xoopsDB->prefix("ugm_cart_order") . "` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (`prod_standard_sn`) REFERENCES `" . $xoopsDB->prefix("ugm_cart_prod_standard") . "` (`sn`) ON DELETE RESTRICT ON UPDATE RESTRICT
      ) ENGINE=InnoDB;
    ";
    $xoopsDB->queryF($sql);    
  } 

} 