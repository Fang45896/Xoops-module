<?php
include_once "onInstall.php";
function xoops_module_update_store_module(&$module, $old_version) {	
  #��s
  go_update();
  return true;
}

