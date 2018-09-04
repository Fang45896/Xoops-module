<?php
include_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/InstallFunction.php";
function xoops_module_install_tncu_cart(&$module) {
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
  mk_dir(XOOPS_ROOT_PATH . "/uploads/tncu_cart");
	return true;
}

//更新
function go_update() {
  global $xoopsDB;
  
  //資料表      
  #---- 增加資料表 tncu_cart_kind
  $tbl = "tncu_cart_kind";
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
}
 
