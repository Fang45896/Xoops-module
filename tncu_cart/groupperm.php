<?php
/*
此檔只引入權限函數與x、y軸，權限則由使用程式處理
*/
defined('XOOPS_ROOT_PATH') || die("XOOPS root path not defined");
#引入權限函數
include_once XOOPS_ROOT_PATH . "/modules/ugm_tools2/function_gperm.php";

//權限項目陣列(x軸)（編號超級重要！設定後，以後切勿隨便亂改。）
# title 只有在後台設定時用到
$gperm_itemid_arr = array(
  '1' => array("title"=>_ADD,"anonymous"=>false),//新增
  '2' => array("title"=>_EDIT,"anonymous"=>false),//編輯
  '3' => array("title"=>_DELETE,"anonymous"=>false),//刪除
  '4' => array("title"=>_MA_GROUPPERM_VIEW,"anonymous"=>false),//瀏覽 true
  '5' => array("title"=>_MA_GROUPPERM_PRINT,"anonymous"=>false)//列印
);

//權限名稱陣列(y軸)
$gperm_name_arr = array(
  "tncu_cartAdmin" => _MD_TNCUCART_ADMIN
);
