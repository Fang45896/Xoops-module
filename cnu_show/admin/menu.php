<?php
$adminmenu = array();

$i                      = 1;
$adminmenu[$i]['title'] = _MI_TAD_ADMIN_HOME;
$adminmenu[$i]['link']  = 'admin/index.php';
$adminmenu[$i]['desc']  = _MI_TAD_ADMIN_HOME_DESC;
$adminmenu[$i]['icon']  = 'images/admin/home.png';

$i++;
$adminmenu[$i]['title'] = _MI_CNU_SHOW_ADMENU1;
$adminmenu[$i]['link']  = "admin/main.php";
$adminmenu[$i]['desc']  = _MI_CNU_SHOW_ADMENU1_DESC;
$adminmenu[$i]['icon']  = 'images/admin/button.png';

$i++;
$adminmenu[$i]['title'] = _MI_CNUSHOW_ADMIN_KIND;
$adminmenu[$i]['link']  = "admin/kind.php";
$adminmenu[$i]['desc']  = _MI_CNUSHOW_ADMIN_KIND_DESC;
$adminmenu[$i]['icon']  = 'images/admin/button.png';

$i++;
$adminmenu[$i]['title'] = _MI_TAD_ADMIN_ABOUT;
$adminmenu[$i]['link']  = 'admin/about.php';
$adminmenu[$i]['desc']  = _MI_TAD_ADMIN_ABOUT_DESC;
$adminmenu[$i]['icon']  = 'images/admin/about.png';
