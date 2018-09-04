<{if $xoops_showrblock}>
  <div class="col-sm-3 col-md-3 xoops-side-blocks rightBlock">
    <{foreach item=block from=$xoBlocks.canvas_right}>
      <div class="block bid-<{$block.id}>">
        <{if $block.title|regex_replace:"/.*\[hide\].*/":"hide" != "hide"}>
          <h4 class="blockTitle">
            <{includeq file="$xoops_rootpath/modules/ugm_tools2/themes_common/blockTitle.tpl"}>             
          </h4>
        <{/if}>
        <div class="blockContent">
          <{$block.content}>          
        </div>
        <{includeq file="$xoops_rootpath/modules/ugm_tools2/themes_common/blockAdmin.tpl"}>
      </div>
    <{/foreach}>
  </div>
<{/if}>
