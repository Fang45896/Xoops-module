<?php
function xoops_module_uninstall_tncu_cart(&$module) {
  GLOBAL $xoopsDB;
	$date=date("Ymd");
 	rename(XOOPS_ROOT_PATH."/uploads/tncu_cart",XOOPS_ROOT_PATH."/uploads/tncu_cart_bak_{$date}");
	return true;
}

