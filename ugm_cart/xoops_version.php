<?php
$modversion = array();

//---模組基本資訊---//
$modversion['name']        = _MI_UGMCART_NAME;
$modversion['version']     = '1.00';
$modversion['description'] = _MI_UGMCART_DESC;
$modversion['author']      = _MI_UGMCART_AUTHOR;
$modversion['credits']     = _MI_UGMCART_CREDITS;
$modversion['help']        = 'page=help';
$modversion['license']     = _MI_UGMCART_LICENSE;
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image']       = 'images/logo.png';
$modversion['dirname']     = basename(dirname(__FILE__));

//---模組狀態資訊---//
$modversion['release_date']        = '2018/09/04';
$modversion['module_website_url']  = 'http://www.cnu.edu.tw/';
$modversion['module_website_name'] = 'cnu';
$modversion['module_status']       = 'release';
$modversion['author_website_url']  = 'http://www.cnu.edu.tw/';
$modversion['author_website_name'] = 'cnu';
$modversion['min_php']             = 7.0;
$modversion['min_xoops']           = '2.5';
$modversion['min_tadtools']        = '1.20';

//---paypal資訊---//
$modversion['paypal']                  = array();
$modversion['paypal']['business']      = 'sa9212900@gmail.com';
$modversion['paypal']['item_name']     = 'Donation : ' . '贊助對象名稱';
$modversion['paypal']['amount']        = 0;
$modversion['paypal']['currency_code'] = 'USD';

//---後台使用系統選單---//
$modversion['system_menu'] = 1;


//---模組資料表架構(有設關聯的資料表要排前面)---//
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][1] = 'ugm_cart_files_center';
$modversion['tables'][2] = 'ugm_cart_order_detail';
$modversion['tables'][3] = 'ugm_cart_kind2prod';
$modversion['tables'][4] = 'ugm_cart_prod_standard';
$modversion['tables'][5] = 'ugm_cart_order';
$modversion['tables'][6] = 'ugm_cart_prod';
$modversion['tables'][7] = 'ugm_cart_kind';

//---後台管理介面設定---//
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu']  = 'admin/menu.php';

//---前台主選單設定---//
$modversion['hasMain'] = 1;
//$modversion['sub'][1]['name'] = '';
//$modversion['sub'][1]['url'] = '';

//---模組自動功能---//
$modversion['onInstall'] = "include/onInstall.php";
$modversion['onUpdate'] = "include/onUpdate.php";
$modversion['onUninstall'] = "include/onUninstall.php";

//---樣板設定---//
$modversion['templates']                    = array();
$i                                          = 1;
$modversion['templates'][$i]['file']        = 'ugm_cart_adm_main.tpl';
$modversion['templates'][$i]['description'] = '後台管理頁樣板';

$i++;
$modversion['templates'][$i]['file']        = 'ugm_cart_index.tpl';
$modversion['templates'][$i]['description'] = '模組首頁樣板';

//---偏好設定---//
$modversion['config'] = array();
//$i=0;
//$modversion['config'][$i]['name']    = '偏好設定名稱（英文）';
//$modversion['config'][$i]['title']    = '偏好設定標題（常數）';
//$modversion['config'][$i]['description']    = '偏好設定說明（常數）';
//$modversion['config'][$i]['formtype']    = '輸入表單類型';
//$modversion['config'][$i]['valuetype']    = '輸入值類型';
//$modversion['config'][$i]['default']    = 預設值;
//
//$i++;

//---搜尋---//
//$modversion['hasSearch'] = 1;
//$modversion['search']['file'] = "include/search.php";
//$modversion['search']['func'] = "搜尋函數名稱";

//---區塊設定---//
//$modversion['blocks'] = array();
//$i=1;
//$modversion['blocks'][$i]['file'] = "區塊檔.php";
//$modversion['blocks'][$i]['name'] = 區塊名稱（常數）;
//$modversion['blocks'][$i]['description'] = 區塊說明（常數）;
//$modversion['blocks'][$i]['show_func'] = "執行區塊函數名稱";
//$modversion['blocks'][$i]['template'] = "區塊樣板.tpl";
//$modversion['blocks'][$i]['edit_func'] = "編輯區塊函數名稱";
//$modversion['blocks'][$i]['options'] = "設定值1|設定值2";
//
//$i++;

//---評論---//
//$modversion['hasComments'] = 1;
//$modversion['comments']['pageName'] = '單一頁面.php';
//$modversion['comments']['itemName'] = '主編號';

//---通知---//
//$modversion['hasNotification'] = 1;
