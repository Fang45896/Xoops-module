<?php
include_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/InstallFunction.php";
function xoops_module_install_模組目錄(&$module) {
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
  mk_dir(XOOPS_ROOT_PATH . "/uploads/模組目錄");
	return true;
}

//更新
function go_update() {
  global $xoopsDB;
}
 
