<{assign var=theme_name value=$xoTheme->folderName}>


<{* 顯示佈景變數 *}>
<{assign var=show_var value=1}>
<{if $xoops_isadmin and $show_var}>
  <{includeq file="$xoops_rootpath/modules/ugm_tools2/themes_common/show_var.tpl"}>
<{/if}>


<{* 左、上中、上左、上右、右、內容 *}>
<{if $xoops_showlblock || $xoops_showrblock || $xoops_showcblock || $xoops_contents}>
  <div class="row page-row">
    <{includeq file="$theme_name/tpl/leftBlock.tpl"}>
    <{includeq file="$theme_name/tpl/content-zone.tpl"}>
    <{includeq file="$theme_name/tpl/rightBlock.tpl"}>                        
  </div><!--//page-row-->
<{/if}>

<{* 下中、下左、下右 *}>
<{if $xoBlocks.page_bottomcenter || $xoBlocks.page_bottomright || $xoBlocks.page_bottomleft}>
    <div class="row page-row">
        <{includeq file="$theme_name/tpl/bottomLeft.tpl"}>
        <{includeq file="$theme_name/tpl/bottom-zone.tpl"}>
        <{includeq file="$theme_name/tpl/bottomRight.tpl"}>                    
    </div><!--//page-row-->
<{/if}>

<{if $xoBlocks.footer_center || $xoBlocks.footer_right || $xoBlocks.footer_left}>
    <div class="row page-row">
        <{includeq file="$theme_name/tpl/footerLeft.tpl"}>
        <{includeq file="$theme_name/tpl/footerCenter.tpl"}>
        <{includeq file="$theme_name/tpl/footerRight.tpl"}>                               
    </div>
<{/if}>     


<!-- Meta -->
<meta charset="<{$xoops_charset}>">
<meta name="keywords" content="<{$xoops_meta_keywords}>">
<meta name="description" content="<{$xoops_meta_description}>">
<meta name="robots" content="<{$xoops_meta_robots}>">
<meta name="rating" content="<{$xoops_meta_rating}>">
<meta name="author" content="<{$xoops_meta_author}>">
<meta name="generator" content="育將電腦工室">


<{* xoops 所需css,僅量放前面，請接在meta *}>     
<link rel="stylesheet" type="text/css" href="<{xoImgUrl}>css/xoops.css"> 

<{$xoops_langcode}>


<link rel="alternate" type="application/rss+xml" title="" href="<{xoAppUrl backend.php}>">

<title><{if $xoops_dirname == "system"}><{$xoops_sitename}><{if $xoops_pagetitle !=''}> - <{$xoops_pagetitle}><{/if}><{else}><{if $xoops_pagetitle !=''}><{$xoops_pagetitle}> - <{$xoops_sitename}><{/if}><{/if}></title>
<{$xoops_module_header}>