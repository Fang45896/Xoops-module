<?php
/*-----------引入檔案區--------------*/
include_once "header.php";
$xoopsOption['template_main'] = "模組目錄_index.tpl";
include_once XOOPS_ROOT_PATH . "/header.php";



/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op = system_CleanVars($_REQUEST, 'op', '', 'string');
// $sn = system_CleanVars($_REQUEST, 'sn', 0, 'int');

switch ($op) {

  // case "xxx":
  // xxx();
  // header("location:{$_SERVER['PHP_SELF']}");
  // exit;

  default:
    # ---- 目前網址 ----
    $_SESSION['return_url'] = getCurrentUrl();
    $op = "opList";
    opList();
    break;
}


#相容JQUERY
$ver = intval(str_replace('.', '', substr(XOOPS_VERSION, 6, 5)));
if ($ver >= 259) {
  $xoTheme->addScript('modules/tadtools/jquery/jquery-migrate-3.0.0.min.js');
} else {
  $xoTheme->addScript('modules/tadtools/jquery/jquery-migrate-1.4.1.min.js');
}

$xoTheme->addStylesheet(XOOPS_URL . "/modules/模組目錄/css/module.css");
$xoopsTpl->assign( "moduleMenu" , $moduleMenu) ;
$xoopsTpl->assign( "isAdmin" , $isAdmin) ;//interface_menu.php
$xoopsTpl->assign( "op" , $op) ;
#關閉左右區塊
//$xoopsTpl->assign( 'xoops_showlblock', 0 );
//$xoopsTpl->assign( 'xoops_showrblock', 0 );
/*-----------秀出結果區--------------*/
include_once XOOPS_ROOT_PATH . '/footer.php';

/*-----------function區--------------*/

//顯示預設頁面內容
function opList(){
  global $xoopsTpl;
  $main = "模組開發中";
  $xoopsTpl->assign('content', $main);
}
