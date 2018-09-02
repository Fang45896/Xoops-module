<?php
include_once "onInstall.php";
function xoops_module_update_prodmanage(&$module, $old_version) {	
  #更新
  go_update();
  return true;
}

