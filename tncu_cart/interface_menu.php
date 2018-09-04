<?php
#引入權限檔(引入權限函數與x、y軸，權限則由使用程式處理)
include XOOPS_ROOT_PATH . "/modules/" .  "tncu_cart/groupperm.php" ;

//---- 權限設定 ---- */
// 得到指定模組 mid
$module_handler =& xoops_gethandler('module');
$xoopsModule =& $module_handler->getByDirname("tncu_cart");
$module_id = $xoopsModule->getVar('mid');

$isAdmin=false;
if ($xoopsUser){
  //判斷是否對該模組有管理權限
  $isAdmin=$xoopsUser->isAdmin($module_id);
}
$gperm = get_gperm($module_id,$isAdmin,$gperm_itemid_arr,$gperm_name_arr);
//---- 權限設定 ---- */

#工具列設定
$mod_name   = $xoopsModule->name();//模組中文名
$module_name = $xoopsModule->dirname();//模組

$moduleMenu = array();
if($gperm['tncu_cartAdmin'][4]){  
  $i = 0;
  $moduleMenu[$i]['url']="index.php";
  $moduleMenu[$i]['title']="回首頁";
  $moduleMenu[$i]['icon']="fa-home";
  
  $i++;
  $moduleMenu[$i]['url']="menu.php";
  $moduleMenu[$i]['title']="選單管理";
  $moduleMenu[$i]['icon']="fa-bars";
}

if($isAdmin) {
  $i++;
  $moduleMenu[$i]['url']="admin/index.php";
  $moduleMenu[$i]['title']=sprintf(_TAD_ADMIN,$mod_name);//管理後台
  $moduleMenu[$i]['icon']="fa-wrench";
  $i++;
  $moduleMenu[$i]['url']=XOOPS_URL."/modules/system/admin.php?fct=preferences&op=showmod&mod={$module_id}";
  $moduleMenu[$i]['title']=sprintf(_TAD_CONFIG,$mod_name);//」偏好設定
  $moduleMenu[$i]['icon']="fa-edit";
  $i++;
  $moduleMenu[$i]['url']=XOOPS_URL."/modules/system/admin.php?fct=modulesadmin&op=update&module={$module_name}";
  $moduleMenu[$i]['title']=sprintf(_TAD_UPDATE,$mod_name);//更新
  $moduleMenu[$i]['icon']="fa-refresh";
  $i++;
  $moduleMenu[$i]['url']=XOOPS_URL."/modules/system/admin.php?fct=blocksadmin&op=list&filter=1&selgen={$module_id}&selmod=-2&selgrp=-1&selvis=-1";
  $moduleMenu[$i]['title']=sprintf(_TAD_BLOCKS,$mod_name);//」區塊管理
  $moduleMenu[$i]['icon']="fa-th";

}