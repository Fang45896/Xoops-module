<{if $xoBlocks.page_bottomcenter}>
  <{foreach item=block from=$xoBlocks.page_bottomcenter}>
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
<{/if}>
