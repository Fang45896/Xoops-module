<?php
/*-----------引入檔案區--------------*/
require_once "header.php";
$xoopsOption['template_main'] = 'tncu_cart_menu.tpl';
include_once XOOPS_ROOT_PATH . "/header.php";

#權限設定
if(!$gperm['tncu_cartAdmin'][4])redirect_header(XOOPS_URL,3,_NOPERM);//瀏覽

#引入類別物件---------------------------------
require_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/ugmKind3.php";
#引入上傳物件
require_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/ugmUpFiles3.php";

/*-----------執行動作判斷區----------*/
#system_CleanVars (&$global, $key, $default= '', $type= 'int')
require_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op = system_CleanVars($_REQUEST, 'op', '', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
$kind = system_CleanVars($_REQUEST, 'kind', 'menuMain', 'string'); 

#foreign key
$foreign = array(
  "menuMain" => array("title" => "主選單", "stopLevel" => 3),
);

#防呆
$kind = in_array($kind, array_keys($foreign))?$kind:"menuMain";

#關閉左右區塊
$xoopsTpl->assign( 'xoops_showlblock', 0 );
$xoopsTpl->assign( 'xoops_showrblock', 0 );

#引入列表與表單陣列-----------------------
require_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/ugm_kind3_menuArray.php";

#引入類別物件---------------------------------
require_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/ugm_kind3_main.php";


###########################################################
#  異動後，要執行的動作
###########################################################
function transaction(){
  global $xoopsDB, $ugmKind,$op;
  #---- 過濾讀出的變數值 ----
  $myts = MyTextSanitizer::getInstance();
  $kind = $ugmKind->get_kind();
  $moduleName =$ugmKind->get_moduleName();
  $stopLevel =$ugmKind->get_stopLevel();
  $ofsn=0;
  $level=1;
  $enable=1;

  if($kind == "menuMain"){
  }
}

###########################################################
#  刪除資料 額外檢查
###########################################################
function opDeleteCheck($sn = "") {
  global $xoopsDB, $ugmKind;
}