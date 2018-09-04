<?php
class Ugm_cartCorePreload extends XoopsPreloadItem
{
  function eventCoreIncludeCommonEnd($args)
  {
    if($GLOBALS['xoopsModule'] && $GLOBALS['xoopsModule']->dirname() == "ugm_cart")
    {
      xoops_setConfigOption('theme_set', 't_cart');
    }
  }
}
