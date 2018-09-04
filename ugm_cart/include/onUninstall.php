<?php
function xoops_module_uninstall_ugm_cart(&$module) {
  GLOBAL $xoopsDB;
	$date=date("Ymd");
 	rename(XOOPS_ROOT_PATH."/uploads/ugm_cart",XOOPS_ROOT_PATH."/uploads/ugm_cart_bak_{$date}");
	return true;
}

