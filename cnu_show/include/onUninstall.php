<?php
function xoops_module_uninstall_store_module(&$module) {
  GLOBAL $xoopsDB;
	$date=date("Ymd");

 	rename(XOOPS_ROOT_PATH."/uploads/store_module",XOOPS_ROOT_PATH."/uploads/cnu_show_bak_{$date}");

	return true;
}

