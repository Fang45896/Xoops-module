<?php
include_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/InstallFunction.php";
function xoops_module_install_prodmanage(&$module) {
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
  mk_dir(XOOPS_ROOT_PATH . "/uploads/prodmanage");
	return true;
}

//更新
function go_update() {
  global $xoopsDB;

  //資料表   
  #---- 增加資料表 prodmanage_prod
  $tbl = "prodmanage_prod";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
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
    ";
    $xoopsDB->queryF($sql);
  } 

  #---- 增加資料表 prodmanage_kind
  $tbl = "prodmanage_kind";
  if(!chk_isTable($tbl)){
    $sql="
      CREATE TABLE `" . $xoopsDB->prefix($tbl) . "` (
  `kind_sn` smallint(5) unsigned NOT NULL auto_increment COMMENT '類別代號',
  `store_sn` mediumint(9) unsigned NOT NULL default '0' COMMENT '店家代號',
  `kind_title` varchar(255) NOT NULL COMMENT '類別名稱',
  `kind_desc` varchar(255) NOT NULL COMMENT '類別說明',
  `kind_sort` smallint(5) unsigned NOT NULL COMMENT '類別排序',
  `kind_ofsn` smallint(5) unsigned NOT NULL COMMENT '父類別',
  `kind_enable` enum('1','0') NOT NULL default '1' COMMENT '類別狀態',
  PRIMARY KEY  (`kind_sn`)
) ENGINE=MyISAM;
    ";
    $xoopsDB->queryF($sql);
  } 

}
 
