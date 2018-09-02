<?php
/*-----------引入檔案區--------------*/
$xoopsOption['template_main'] = "模組目錄_adm_main.tpl";
include_once "header.php";
include_once "../function.php";

# 模組 目錄
$module_name = $xoopsModule->dirname();
#強制關除錯
//ugm_module_debug_mode(0);
#引入類別物件---------------------------------
include_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/ugmKind3.php";
#引入上傳物件
include_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/ugmUpFiles3.php";


/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op = system_CleanVars($_REQUEST, 'op', '', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');

switch ($op) {

  // case "xxx":
  // xxx();
  // redirect_header($_SESSION['return_url'], 3, _BP_SUCCESS);
  // exit;

  default:
    # ---- 目前網址 ----
    $_SESSION['return_url'] = getCurrentUrl();
    $op = "opList";
    opList();
    break;
}

/*-----------秀出結果區--------------*/
#CSS
$xoTheme->addStylesheet(XOOPS_URL . "/modules/模組目錄/css/xoops_adm.css");
$xoTheme->addStylesheet(XOOPS_URL . "/modules/模組目錄/css/forms.css");
$xoTheme->addStylesheet(XOOPS_URL . "/modules/模組目錄/css/module.css");
$xoopsTpl->assign("op", $op);

#相容舊版jquery
$ver = intval(str_replace('.', '', substr(XOOPS_VERSION, 6, 5)));
if ($ver >= 259){
  $xoTheme->addScript('modules/tadtools/jquery/jquery-migrate-3.0.0.min.js');
}else{
  $xoTheme->addScript('modules/tadtools/jquery/jquery-migrate-1.4.1.min.js');
}


$xoopsTpl->assign("labelTitle", "程式中文名稱");

include_once 'footer.php';


/*-----------function區--------------*/

//顯示預設頁面內容
function opList(){
  global $xoopsTpl;

  $main = "後台頁面開發中";
  $xoopsTpl->assign('content', $main);
}
