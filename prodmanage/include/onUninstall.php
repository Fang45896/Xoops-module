<?php
function xoops_module_uninstall_prodmanage(&$module) {
  GLOBAL $xoopsDB;
	$date=date("Ymd");
 	rename(XOOPS_ROOT_PATH."/uploads/prodmanage",XOOPS_ROOT_PATH."/uploads/prodmanage_bak_{$date}");
	return true;
}

