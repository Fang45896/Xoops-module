<{if  $xoBlocks.page_bottomcenter}>
    <{if $xoBlocks.page_bottomleft && $xoBlocks.page_bottomright}>
        <div class="col-sm-6 col-md-6 bottomCenter">
    <{elseif $xoBlocks.page_bottomleft}>
        <div class="col-sm-9 col-md-9 bottomCenter">
    <{elseif $xoBlocks.page_bottomright}>
        <div class="col-sm-9 col-md-9 bottomCenter">
    <{else}>
        <div class="col-sm-12 col-md-12 bottomCenter">
    <{/if}>
        <{includeq file="$theme_name/tpl/bottomCenter.tpl"}>
    </div>
<{/if}>
